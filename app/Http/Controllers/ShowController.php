<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShowController extends Controller
{
    public function index(Request $request)
    {
        $link = Link::where('id', $request->id)->first();
        $link['url'] = Storage::url($link['file']);

        return view('show.index', ['link' => $link]);
    }
}
