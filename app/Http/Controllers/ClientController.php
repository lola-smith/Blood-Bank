<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       // $records=Client::paginate(20);

       
            $records = Client::where(function($query) use($request){
                if($request->has('name')){
                $query->where('name','LIKE','%'.$request->name.'%');
                }
                if($request->has('email')){
                    $query->where('email','LIKE','%'.$request->email.'%');
                    }
                    if ($request->has('phone')) {
                        $query->where('phone','LIKE','%'.$request->phone.'%');                        
                    }
                })->paginate(20);
            //  dd($records->where('name', $request->name));
        
        // if ($request->has('email')) {
        //     $records= $records->where('email', $request->email);
        //    //dd($records->where('email', $request->email));
        // }
        // if ($request->has('phone')) {
        //     $records=$records->where('phone', $request->phone);
            
        // }
       
        // return $records->get();

        return view('clients.index',compact('records'));
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
        // $model=Client::findOrFail($id);
        // return view('clients.index',compact('model'));
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
        $record=Client::findOrFail($id);
        
        if($record->is_activate==true){
           //$record->is_activate=0;
          $record->update(['is_activate' => "0"]); 
          
            // dd($record); 
        }
        else{
        $record->update(['is_activate' => "1"]);
        

        } 
        $record->save();

        flash()->success("success Edited");
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
        $record=Client::findOrFail($id);
        $record->delete();
        flash()->success("successfully deleted");
        return back(); 
    }
}
