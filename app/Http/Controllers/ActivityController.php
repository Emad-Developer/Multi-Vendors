<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::paginate(3)->Order;
        return view('activities.index',compact('activities'));
    }

    public function show($id)
    {
        $activity = Activity::findOrFail($id);
        return view('activities.show',compact('activity'));
    }

    public function create()
    {
        return view('activities.create');
    }
    
    public function store(Request $request)
    {
        Activity :: create([
            'activity_name' => $request->activity_name,
        ]);
        return redirect(route('create_activity'));
    }

    public function edit($id)
    {
        $activity = Activity::findOrFail($id);
        return view('activities.edit',compact('activity'));
    }

    public function update(Request $request , $id)
    {
        Activity::findOrFail($id) -> update([
            'activity_name' => $request->activity_name,
        ]);
        return redirect(route('show_activity',$id));
    }

    public function delete($id)
    {
        Activity::findOrFail($id) -> delete();
        return redirect(route('show_activities',$id));
    }
}
