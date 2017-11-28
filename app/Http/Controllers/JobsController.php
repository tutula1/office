<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\User;
use App\Job;

use Illuminate\Http\Request;

class JobsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $jobs = Job::all();
        
        return view('jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $job= Job::lists('name', 'id');
        
        return view('users.create', compact('job'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(UserRequest $request)
    {
        $job = new Job;
        $job->user_id = $request->user()->id;
        $job->project_id =  $request->get('project_id', 0);
        $job->name = $request->get('name');
        $job->description = $request->get('description');
        $job->status = Job::STATUS_ENABLE;
        $job->date_done = $request->get('date_done');
        $job->no_date_done = $request->get('no_date_done') ? 1 : 0;
        $job->urgent = $request->get('urgent') ? 1 : 0;
    
        $job->save();
        
        return redirect('jobs')->with('flash_message', 'Job has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $job = Job::findOrFail($id);
        
        return view('jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = Job::findOrFail($id);
        
        $role = Groups::lists('name', 'id');
        
        return view('jobs.edit', compact('user', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, UserRequest $request)
    {
        $job = Job::findOrFail($id);

        $job->project_id =  $request->get('project_id', 0);
        $job->name = $request->get('name');
        $job->description = $request->get('description');
        $job->status = Job::STATUS_ENABLE;
        $job->date_done = $request->get('date_done');
        $job->no_date_done = $request->get('no_date_done') ? 1 : 0;
        $job->urgent = $request->get('urgent') ? 1 : 0;
        
        $user->save();
        
        return redirect('users')->with('flash_message', 'Job has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        $user->delete();

        return redirect('users')->with('flash_message', 'User has been deleted!');
    }

}
