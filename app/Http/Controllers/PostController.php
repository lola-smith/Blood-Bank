<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Image;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records=Post::paginate(20);
        return view('posts.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'title'=>'required',
            'body'=>'required',
            // 'image'=>'image|mimes:jpeg,png,jpg|max:2048',
          'image'=>'required',


            'category_id'=>'required'
            ];
     
            $messages=[
             'title.required'=>'title is required',
             'body.required'=>'body is required',
             'image.required'=>'image is required',
             'category_id.required'=>'category is required',
             
         ];
         $this->validate($request,$rules,$messages);


        // $records=Post::create($request->all(),['except'=>['image']]);
        //  if($request->hasFile('image')){
        //     $image=$request->image;
        //     $filename=time().'-'.$image->getClientOriginalName();
        //     dd($filename);
        //     $location=public_path('images/posts/'.$filename);
        //     Image::make($image)->resize(800,400)->save($location);
        //     $filepath='images/posts/'.$filename;
        
        //     $request->image=$filepath;
        // }
        // $records=Post::create($request->all());
         
        $post=new Post();
       $post->title=$request->input('title');
       $post->body=$request->input('body');
       $post->category_id=$request->input('category_id');
       if($request->hasFile('image')){
        $image=$request->image;
        $filename=time().'-'.$image->getClientOriginalName();
        $location=public_path('images/posts/'.$filename);
        Image::make($image)->resize(800,400)->save($location);
    $path='images/posts/'.$filename;
        $post->image=$path;
    }


       $post->save();
        
         
         
         flash()->success("success");
     
         return redirect(route('post.index'));
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
        $model=Post::findOrFail($id);
        return view('posts.edit',compact('model'));
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
        //$post=new Post();
        $post=Post::findOrFail($id);
        
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        $post->category_id=$request->input('category_id');
        if($request->hasFile('image')){
         $image=$request->image;
         
         $filename=time().'-'.$image->getClientOriginalName();
         $location=public_path('images/posts/'.$filename);
         Image::make($image)->resize(800,400)->save($location);
         $path='images/posts/'.$filename;
         
         $post->image=$path;
        //  dd( $path);
     }
 
 
        $post->save();
         

        
        flash()->success("success Edited");
        //return back();//this function like redirect() but in the same page
        return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record=Post::findOrFail($id);
        $record->delete();
        flash()->success("successfully deleted");
        return back(); 
    }
}
