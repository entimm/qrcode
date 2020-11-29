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
        $links = Link::all()->toArray();
        $links = array_map(function ($link) {
            $link['url'] = Storage::url($link['file']);

            return $link;
        }, $links);

        session(['group_id' => null]);

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
        $groupId = session('group_id', 0);
        $data = [
            'name' => $request->name ?: '',
            'group_id' => $groupId,
            'desc_text' => $request->desc_text ?: '',
            'file' => '',
            'desc_img' => '',
        ];
        if ($file = $request->file('file')) {
            $path = $file->store('public/show');
            $data['file'] = $path;
        }

        if ($file = $request->file('desc_img')) {
            $path = $file->store('public/show');
            $data['desc_img'] = $path;
        }

        Link::create(array_filter($data));

        if (session('group_id') === null) {
            return redirect()->route('links.index');
        }

        return redirect()->route('groups.show', session('group_id'));
    }

    public function edit($linkId, Request $request)
    {
        $groups = Group::all();

        $link = Link::where('id', $linkId)->first();
        if (!$link) {
            return null;
        }

        $link = $link->toArray();
        $link['url'] = $link['file'] ? Storage::url($link['file']) : '';
        $link['desc_img_url'] = $link['desc_img'] ? Storage::url($link['desc_img']) : '';

        return view('links.edit', [
            'link' => $link,
            'groups' => $groups,
        ]);
    }

    public function update($linkId, Request $request)
    {
        $data = [
            'name' => $request->name ?: '',
            'group_id' => $request->group ?: 0,
            'desc_text' => $request->desc_text ?: '',
            'file' => '',
            'desc_img' => '',
        ];
        if ($file = $request->file('file')) {
            $path = $file->store('public/show');
            $data['file'] = $path;
        }

        if ($file = $request->file('desc_img')) {
            $path = $file->store('public/show');
            $data['desc_img'] = $path;
        }

        Link::where('id', $linkId)->update(array_filter($data));

        if (session('group_id') === null) {
            return redirect()->route('links.index');
        }

        return redirect()->route('groups.show', session('group_id'));
    }

    public function destroy($linkId, Request $request)
    {
        Link::where('id', $linkId)->delete();

        if (session('group_id') === null) {
            return redirect()->route('links.index');
        }

        return redirect()->route('groups.show', session('group_id'));
    }

    public function show($linkId, Request $request)
    {
        if (!$link = Link::where('id', $linkId)->first()) {
            return null;
        }

        $link = $link->toArray();
        $link['url'] = $link['file'] ? Storage::url($link['file']) : '';
        $link['desc_img_url'] = $link['desc_img'] ? Storage::url($link['desc_img']) : '';

        return view('links.show', ['link' => $link]);
    }
}
