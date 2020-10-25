<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $links = Link::all();

        $links = array_map(function ($link) {
            $link['url'] = Storage::url($link['file']);

            return $link;
        }, $links->all());

        return view('home', [
            'links' => $links,
        ]);
    }
}
