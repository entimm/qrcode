<?php

namespace App\Http\Controllers;

use App\Group;
use App\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GroupController extends Controller
{
    public function index(Request $request)
    {
        $groups = Group::all()->toArray();

        return view('groups.index', [
            'groups' => $groups,
        ]);
    }

    public function create(Request $request)
    {
        $groups = Group::all();

        return view('groups.create', [
            'groups' => $groups,
        ]);
    }

    public function store(Request $request)
    {
        Group::create([
            'name' => $request->name,
        ]);

        return redirect()->route('manage.groups');
    }

    public function edit($groupId, Request $request)
    {
        $group = Group::where('id', $groupId)->first();

        return view('groups.edit', [
            'group' => $group,
        ]);
    }

    public function update($groupId, Request $request)
    {
        $data = [
            'name' => $request->name,
        ];

        Group::where('id', $groupId)->update($data);

        return redirect()->route('manage.groups');
    }

    public function destroy($groupId, Request $request)
    {
        Group::where('id', $groupId)->delete();

        return redirect()->route('manage.groups');
    }

    public function show($groupId, Request $request)
    {
        $links = Link::where('group_id', $groupId)->get()->toArray();
        $links = array_map(function ($link) {
            $link['url'] = Storage::url($link['file']);

            return $link;
        }, $links);

        session(['group_id' => $groupId]);

        return view('links.index', [
            'links' => $links,
        ]);
    }
}
