<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Content;
use App\Section;
use App\Setting;
use App\User;



class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        // USER
        $user = User::find(auth()->id());

        // SECTIONS
        $sections = Section::all();

        // CONTENT
        $contentTmp = Content::all();

        $content = $contentTmp->mapToGroups(function ($item, $key) {
            return [$item['section_id'] => ['text_ref' => $item['text_ref'], 'content' => $item['content'], 'label' => $item['label'], 'id' => $item['id']]];
        })->toArray();

        // SOCIAL LINKS
        $social_links = Setting::where('content_type', 'link')->get()->toArray();

        // Choose active tab if it was set in the link
        $activeTab = 1;// first tab as default
        if (!empty($request['activeTab'])) {
            $activeTab = $request['activeTab'];
        }

        // GET LOGO
        $logoModel = Setting::where('name', 'logo')->first();
        $logoImg = $logoModel->value;

        return view('admin.index', compact('content', 'sections', 'user', 'social_links','activeTab','logoImg'));
    }

    public function store(Request $request)
    {

        // save user data
        if (!empty($request['user_id'])) {


            // validate name and mail
            $validatedNameAndMail = $this->validate($request, [
                'name' => 'required|min:3|max:50',
                'email' => 'required|email',
            ]);

            // validate password
            if (!empty($request['password'])) {
                $userTriedToChangePassword = true;
                $validatedPassword = $this->validate($request, ['password' => 'confirmed|min:6']);
            }

            // validate logo
            if ($request->hasFile('logo')) {
                $userTriedToAddLogo = true;
                $validatedLogo = $this->validate($request, [
                    'logo' => 'image',
                ]);
            }

            // redirect to custom link
            /*if (empty($validatedNameAndMail) || (!empty($userTriedToChangePassword) && empty($validatedPassword)) || (!empty($userTriedToAddLogo) && empty($validatedLogo))) {
                return redirect('/admin/?activeTab=' . (!empty($request['active_tab']) ? $request['active_tab'] : ''))->withInput();
            }*/

            // update user data
            $userModel = User::find($request['user_id']);

            $aData = [
                'name' => $request['name'],
                'email' => $request['email'],
            ];

            // if new password was set and valid
            if (!empty($request['password'])) {
                $aData['password'] = Hash::make($request['password']);
            }

            $userModel->update($aData);

            // logo file update
            if ($request->hasFile('logo')) {

                $logo = $request->file('logo');

                $fileNameWithExt = $logo->getClientOriginalName();

                $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

                $extension = $logo->getClientOriginalExtension();

                $fileNameToStore = $filename . '_' . time() . '.' . $extension;

                $destinationPath = public_path('/uploads');

                $logo->move($destinationPath, $fileNameToStore);


                $logoModel = Setting::where('name', 'logo')->first();
                $logoModel->value = $fileNameToStore;
                $logoModel->save();

            }
        }

        // save front-end texts content
        if (!empty($request['content'])) {
            foreach($request['content'] as $id => $record_content) {
                $contentModel = Content::find($id);
                $contentModel->update(['content' => $record_content]);
            }
        }

        // save social links
        if (!empty($request['social_link'])) {
            foreach($request['social_link'] as $id => $record_content) {
                $social_linkModel = Setting::find($id);
                $social_linkModel->update(['value' => $record_content]);
            }
        }

        $request->session()->flash('update_status', 'Successfully updated');

        return redirect('/admin/?activeTab=' . (!empty($request['active_tab']) ? $request['active_tab'] : ''));

    }
}
