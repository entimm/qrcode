<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LinkController extends Controller
{
    public function index(Request $request)
    {
        $links = Link::all();
        $links = array_map(function ($link) {
            $link['url'] = Storage::url($link['file']);

            return $link;
        }, $links->all());

        return view('links.index', [
            'links' => $links,
        ]);
    }

    public function create(Request $request)
    {
        return view('links.create');
    }

    public function store(Request $request)
    {
        $file = $request->file('file');
        $path = $file->store('public/show');
        Link::create([
            'name' => $request->name,
            'file' => $path,
        ]);

        return redirect('/link/manage');
    }

    public function edit(Request $request)
    {
        $link = Link::where('id', $request->id)->first();
        $link['url'] = Storage::url($link['file']);

        return view('links.edit', ['link' => $link]);
    }

    public function update(Request $request)
    {
        $file = $request->file('file');
        $path = $file->store('public/show');
        Link::where('id', $request->id)->update(['file' => $path]);

        return redirect('/link/manage');
    }

    public function delete(Request $request)
    {
        Link::where('id', $request->id)->delete();

        return redirect('/link/manage');
    }
}
