<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if(!auth()->user()->can('users-lists')){
        //     abort(403);
        // }
        $records=User::paginate(20);
        return view('users.index',compact('records'));    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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
            // 'name'=>'required|unique:users,name',
            'name'=>'required',
            'password' => 'required|same:password',
            'password_confirmation' => 'required|same:password',   
            'email'=>'email',
            'roles_list'=>'required'
            ];
     
            $messages=[
             'name.required'=>'Name is required',
             'password.required'=>'password is required',
             'email.required'=>'email is required',
             'roles_list.required'=>'roles_list is required'
         ];
         $this->validate($request,$rules,$messages);
         $request->merge(['password'=>bcrypt($request->password)]);
         $records=User::create($request->except('roles_list'));
         $records->roles()->attach($request->input('roles_list'));
         
         flash()->success("success");// لاظهار الرسائل
     
         return redirect(route('user.index'));
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
        $model=User::findOrFail($id);
        return view('users.edit',compact('model'));
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
            // 'name'=>'required|unique:users,name,'.$id,
            'name'=>'required',
            'password' => 'required|same:password',
            'password_confirmation' => 'required|same:password',   
            'email'=>'email',
            'roles_list'=>'required'
            ];
     
            $messages=[
             'name.required'=>'Name is required',
             'password.required'=>'password is required',
             'email.required'=>'email is required',
             'roles_list.required'=>'roles_list is required'
         ];
         $this->validate($request,$rules,$messages);
         
        $record=User::findOrFail($id);
        // $record->roles()->sync($request->roles_list);
        $record->roles()->sync((array) $request->input('roles_list'));
        $request->merge(['password'=>bcrypt($request->password)]);

        $record->update($request->all());

        flash()->success("success Edited");
      
        //  return redirect(route('user.edit'));
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
        $record=User::findOrFail($id);
        $record->delete();
        flash()->success("successfully deleted");
        return back(); 
    }
}
