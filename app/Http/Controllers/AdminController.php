<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        return view('admin.index', compact('content', 'sections', 'user', 'social_links','activeTab'));
    }

    public function store(Request $request)
    {
       /* $users = User::where('age', '<', 18)->get();
        foreach ($users as $user) {
            $user->field = value;
            $user->save();
        }*/
        if (!empty($request['content'])) {
            foreach($request['content'] as $id => $record_content) {
                $contentModel = Content::find($id);
                $contentModel->update(['content' => $record_content]);
            }
        }

        if (!empty($request['social_link'])) {
            foreach($request['social_link'] as $id => $record_content) {
                $social_linkModel = Setting::find($id);
                $social_linkModel->update(['value' => $record_content]);
            }
        }

        $request->session()->flash('update_status', 'Successfully updated');

        //return back();
        return redirect('/admin/?activeTab=' . (!empty($request['active_tab']) ? $request['active_tab'] : ''));
    }
}
