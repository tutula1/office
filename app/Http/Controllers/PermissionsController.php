<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\PermissionRequest;
use App\Http\Controllers\Controller;
use App\Permission;

use Illuminate\Http\Request;

class PermissionsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$permissions = Permission::groupBy("group")->get();
        foreach ($permissions as $permission) {
            $permission->permission = Permission::where("group", $permission->group)->get();
        }
		
		return view('permissions.index', compact('permissions'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('permissions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(PermissionRequest $request)
	{
		Permission::create($request->all());
		
		return redirect('permissions')->with('flash_message', 'Permission has been created!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$permission = Permission::findOrFail($id);
		
		return view('permissions.show', compact('permission'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$permission = Permission::findOrFail($id);
		
		return view('permissions.edit', compact('permission'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, PermissionRequest $request)
	{
		$permission = Permission::findOrFail($id);
		
		$permission->update($request->all());
		
		return redirect('permissions')->with('flash_message', 'Permission has been updated!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$permission = Permission::findOrFail($id);
		
		$permission->delete();

		return redirect('permissions')->with('flash_message', 'Permission has been deleted!');
	}

}
