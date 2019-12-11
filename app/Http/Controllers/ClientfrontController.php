<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class ClientfrontController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:client');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('clientfront.client');
    }

    // public function toggleFavourite(Request $request){
    //     $posts = $request->user()->posts()->toggle($request->post_id);
    //     return responseJson(1,'success',[

    //         'posts'=>$posts,
            



    //     ]);
    //      }
}
