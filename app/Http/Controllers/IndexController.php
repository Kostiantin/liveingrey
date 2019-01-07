<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;

class IndexController extends Controller
{

    public function index()
    {

        $contentTmp = Content::all();

        $content = $contentTmp->mapWithKeys(function ($item) {
            return [$item['text_ref'] => $item['content']];
        })->toArray();
        return view('index.index', compact('content'));
    }

}
