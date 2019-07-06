<?php

namespace App\Http\Controllers\Group;

use App\Group;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    private static $folder = 'group.';
    private static $link = 'groups';
    private static $mainTitle = "Groups";
    private static $flash_message = 'Group created successfully';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $group = Group::where('user_id', auth()->id())->get();
        // return $group;
        return view('group.index');
    }

    public function allGroups()
    {
        $group = Group::where('user_id', auth()->id())->get();
        return $group;

    }

    public function groupPage($id)
    {
        $group = Group::where('slug', $id)->get();
       

         return view('group.group-page', compact('group'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'group_logo' => 'required',
            'group_name' => ['required', 'unique:groups'],
            'group_description' => 'required',
            'group_rules' => 'required',
            'group_privacy' => 'required',
        ]);

        if ($request->hasFile('group_logo')) {
            $file = $request->file('group_logo');
        }

        $group_name = $request->group_name;
        $group = new Group();
        $group->user_id = auth()->id();
        $group->addLogo($file);
        $group->group_logo = $file;
        $group->group_name = $group_name;
        $group->group_description = $request->group_description;
        $group->group_rules = $request->group_rules;
        $group->group_privacy = $request->group_privacy;
        $group->slug = str_slug($group_name);
        $group->save();

        $group->group_members()->create([
            'user_id' => auth()->id(),
            'status' => 'GroupAdmin',
        ]);
        return redirect()->back()->with([
            'flash_message' => self::$flash_message,
        ]);
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
