<?php

namespace App\Http\Controllers;

use App\Group;
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
        $groups = Group::all();

        return view('links.create', [
            'groups' => $groups,
        ]);
    }

    public function store(Request $request)
    {
        $file = $request->file('file');
        $path = $file->store('public/show');
        Link::create([
            'name' => $request->name,
            'file' => $path,
            'group_id' => $request->group,
        ]);

        return redirect('/manage/links');
    }

    public function edit($linkId, Request $request)
    {
        $groups = Group::all();

        $link = Link::where('id', $linkId)->first();
        $link['url'] = Storage::url($link['file']);

        return view('links.edit', [
            'link' => $link,
            'groups' => $groups,
        ]);
    }

    public function update(Request $request)
    {
        $data = [
            'name' => $request->name,
            'group_id' => $request->group,
        ];
        $file = $request->file('file');
        if ($file) {
            $path = $file->store('public/show');
            $data['file'] = $path;
        }

        Link::where('id', $request->id)->update($data);

        return redirect('/manage/links');
    }

    public function destroy($linkId, Request $request)
    {
        Link::where('id', $linkId)->delete();

        return redirect('/manage/links');
    }

    public function show($linkId, Request $request)
    {
        $link = Link::where('id', $linkId)->first();
        $link['url'] = Storage::url($link['file']);

        return view('links.show', ['link' => $link]);
    }
}
