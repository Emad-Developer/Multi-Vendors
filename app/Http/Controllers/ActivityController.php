<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::paginate(3);
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
        // Validation
        $request->validate([
            'activity_name'=>'required|string|max::100',
            'img'=>'required|image',
        ]);
        // Move Images
            $img = $request->file('img');
            $ext = $img->getClientOriginalExtension();
            $new_name = uniqid().".$ext";
            $img->move(public_path('uploads/activities/'),$new_name);
        // Create
        Activity :: create([
            'activity_name' => $request->activity_name,
            'activity_img' => $new_name,
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
        // Validate
        $request->validate([
            'activity_name'=>'required|string|max::100',
            'activity_img'=>'nullable|image',
        ]);
        $activity = Activity::findOrFail($id);
        $name = $activity->activity_img;
        
        if ($request->hasFile('activity_img'))
        {
            if ($name !== null)
            {
                unlink( public_path('uploads/activities/').$name);       
            }

            // Move Images
            $img = $request->file('activity_img');
            $ext = $img->getClientOriginalExtension();
            $name = uniqid().".$ext";
            $img->move(public_path('uploads/activities/'),$name);
        }
        // Update
        $activity -> update([
            'activity_name' => $request->activity_name,
            'activity_img' => $name,            
        ]);
        return redirect(route('show_activity',$id));
    }

    public function delete($id)
    {
        $activity = Activity::findOrFail($id);
        if($activity->activity_img !==null) 
        {
            unlink(public_path('uploads/activities/'.$activity->activity_img));
        }
        $activity -> delete();
        return redirect(route('show_activities',$id));
    }
}
