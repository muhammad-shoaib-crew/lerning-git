<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    // Get All Jobs
    public function index(){
        // $jobs = Job::with('employer')->paginate(5); this will not order latest 
        $jobs = Job::with('employer')->latest()->paginate(5);
        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }

    // Create a Job 
    public function create(){
        return view('jobs.create');
    }

    // View a Job //Without Route Model Binding
    // public function viewJob($id){
    //     $job = Job::find($id);
    //     if(!$job){
    //         abort('404');
    //     }
    //     return view('jobs.single', ['job' => $job]);
    // }


    // View a Job //with Route Model Binding
    public function show(Job $job){
        // $job = Job::find($id);
        if(!$job){
            abort('404');
        }
        return view('jobs.single', ['job' => $job]);
    }

    // Edit a Job
    public function edit(Job $job){
        // $job = Job::find($id);
        if(!$job){
            abort('404');
        }
        return view('jobs.edit', ['job'=>$job]);
    }

    // Publish a job
    public function store(Request $request){
        // request()->all(); To fetch all request data
        $job = Job::create([
            'title' => $request['title'],
            'salary' => $request['salary'],
            'employer_id' => '1'
        ]);
        return redirect("/jobs/$job->id");
    }

    // Update a job
    public function update(Request $request, Job $job){

        // Authorization (on hold..)


        // $job = Job::find($id); //This will find a job with Id but will return NULL incase job with id not found in db, so it breaks when we try to update job with ID Null
        
        // $job = Job::findOrFail($id);  //This findOrFail method will handle exception incase job with id not found in db and throw exception with approprite message
        // dd($job);

        // Two ways to update:

        // 1: update each propery one by one and then save like this
        // $job->title = $request['title'];
        // $job->salary = $request['salary'];
        // $job->save();

        // 2: Update the job using update method
        $job->update([
            'title' => $request['title'],
            'salary' => $request['salary']
        ]);

        return redirect("/jobs/$job->id");
    }

    // Delete Job
    public function destroy(Request $request, $id){
        // Authorization (skipped, on hold for now)

        $job = Job::findOrFail($id);
        $job->delete();

        // Job::findOrFail($id)->delete();   //Shorthand of above two line 

        return redirect('/jobs');
    }
}
