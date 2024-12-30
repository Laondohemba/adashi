<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\UserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = Group::where('status', 'active')->get();
        return view('admins.groups', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $group = $request->validate([
            'name' => ['required', 'max:255', 'unique:groups'],
            'amount' => ['required', 'numeric'],
            'interval' => ['required', 'numeric'],
            'max_members' => ['required', 'numeric']
        ]);

        Group::create($group);
        return redirect()->route('showgroups');
    }

    //show groups for user

    public function showGroupsForUser()
    {
        $groups = Group::get();
        return view('users.groups', ['groups' => $groups]);
    }

    //join group
    public function joinGroup(Group $group)
    {
        $exits = UserGroup::where('user_id', Auth::id())->where('group_id', $group->id)->exists();
        $groupId = $group->id;

        if ($exits) {
            return back()->with("alreadyjoined{$groupId}", 'You are already a member of this group!');
        }

        if (Auth::user()->userGroups()->create([
            'group_id' => $groupId
        ])) {

            return redirect()->route('userdashboard');
        } 
        else 
        {

            return back()->withErrors('error', 'Error while processing request');
        }
    }

    //show group members
    public function groupMembers(Group $group)
    {
        $groupMembers = UserGroup::with('userGroups')->where('group_id', $group->id)->get();

        return view('admins.group_members', ['groupMembers' => $groupMembers]);
    }

    //approve group membership
    public function approveMembership($id)
    {
        $group = UserGroup::find($id);
        $group->update(['status' => 'Approved']);

        return redirect()->route('group.members', [$group->id]);
    }
    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        //
    }
}
