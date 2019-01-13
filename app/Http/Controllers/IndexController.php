<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use App\Setting;

class IndexController extends Controller
{

    public function index()
    {

        // get content texts
        $contentTmp = Content::all();
        $content = $contentTmp->mapWithKeys(function ($item) {
            return [$item['text_ref'] => $item['content']];
        })->toArray();

        // get social links

        $social_links = Setting::where('content_type', 'link')->get()->toArray();

        return view('index.index', compact('content', 'social_links'));
    }

}
