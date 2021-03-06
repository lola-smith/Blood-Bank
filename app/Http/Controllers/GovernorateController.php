<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Governorate;

class GovernorateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records=Governorate::paginate(20);
        return view('governorates.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('governorates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());
       $rules=[
       'name'=>'required'
       ];

       $messages=[
        'name.required'=>'Name is required'
    ];
    $this->validate($request,$rules,$messages);
    //dd("here");
    // $records=new Governorate;
    // $records->name=$request->input('name');
    // $records->save();
    //للاختصار ممكن اعمل التلات سطور في سطر واحد 
    $records=Governorate::create($request->all());
    //return back();
    flash()->success("success");// لاظهار الرسائل

    return redirect(route('governorate.index'));

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
        
        $model=Governorate::findOrFail($id);
        return view('governorates.edit',compact('model'));
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
        $record=Governorate::findOrFail($id);
        $record->update($request->all());
        flash()->success("success Edited");
        //return back();//this function like redirect() but in the same page
        return redirect(route('governorate.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record=Governorate::findOrFail($id);
        $record->delete();
        flash()->success("successfully deleted");
        return back(); 
        //return redirect(route('governorate.index'));
    }
}
