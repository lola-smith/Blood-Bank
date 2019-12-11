<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records=Role::paginate(20);
        return view('roles.index',compact('records'));    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //  dd($request->all());
        $rules=[
            'name'=>'required|unique:roles,name',
            'display_name'=>'required',
            'permissions_list'=>'required|array'
            ];
     
            $messages=[
             'name.required'=>'Name is required',
             'display_name.required'=>'display name is required',
             'permissions_list.required'=>'permissions is required'
         ];
         $this->validate($request,$rules,$messages);
         
         $records=Role::create($request->all());
         $records->permissions()->attach($request->permissions_list);
         
         flash()->success("success");// لاظهار الرسائل
     
         return redirect(route('role.index'));
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
        $model=Role::findOrFail($id);
        return view('roles.edit',compact('model'));
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
        $rules=[
            'name'=>'required|unique:roles,name,'.$id,
            'display_name'=>'required',
            'permissions_list'=>'required|array'
            ];
     
            $messages=[
                'name.required'=>'Name is required',
                'display_name.required'=>'display name is required',
                'permissions_list.required'=>'permissions is required'
         ];
         $this->validate($request,$rules,$messages);
         
        $record=Role::findOrFail($id);
        $record->update($request->all());
        $record->permissions()->sync($request->permissions_list);

        flash()->success("success Edited");
      
        // return redirect(route('role.index'));
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record=Role::findOrFail($id);
        $record->delete();
        flash()->success("successfully deleted");
        return back(); 
    }
}
