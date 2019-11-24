<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DonationOrder;
class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $records=DonationOrder::paginate(20);
        $records = DonationOrder::where(function($query) use($request){
            if($request->has('patient_name')){
            $query->where('patient_name','LIKE','%'.$request->patient_name.'%');
            }
            //مش عارفه اجيبها غير بال id
            if($request->blood_type_id){
                $query->where('blood_type_id',$request->blood_type_id);
                }
                if ($request->has('patient_phone')) {
                    $query->where('patient_phone','LIKE','%'.$request->patient_phone.'%');                        
                }
            })->paginate(20);
        return view('donations.index',compact('records'));
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
        $model=DonationOrder::findOrFail($id);
       
        return view('donations.show',compact('model'));
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
        $record=DonationOrder::findOrFail($id);
        $record->delete();
        flash()->success("successfully deleted");
        return back(); 
    }
}
