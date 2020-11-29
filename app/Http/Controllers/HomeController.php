<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index($group = 0)
    {
        $links = Link::where('group_id', $group)->get();

        $links = $links ? $links->all() : [];

        $links = array_map(function ($link) {
            $link['url'] = Storage::url($link['file']);

            return $link;
        }, $links);

        return view('home', [
            'links' => $links,
        ]);
    }
}
