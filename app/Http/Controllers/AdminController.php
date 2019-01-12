<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use App\Section;
use App\User;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
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

        return view('admin.index', compact('content','sections', 'user'));
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

        $request->session()->flash('update_status', 'Successfully updated');

        return back();
    }
}
