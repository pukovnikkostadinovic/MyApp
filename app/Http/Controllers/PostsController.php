<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

public static  function bla(){
	if (isset(auth()->user()->id)){
	$ham = auth()->user()->id;

}else{
	$ham = 9999;
};
return $ham;
}


    public function index()
    {	
	
	
	$isSet = $this->bla();
	$posts =  Post::orderBy('created_at','desc')->paginate(10);
        return view('posts/index')->with('posts',$posts)->with('isSet',$isSet);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
		'title'=>'required',
		'body'=>'required',
		'cover_image'=>'image|nullable|max:1999'	
	]);

	//handle dile upload
	if($request->hasFile('cover_image')){
	$filenameWithExt = $request->file('cover_image')->getClientOriginalImage();
	$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

	$extension = $request->file('cover_image')->getOriginalClientExtension();

	$fileNameToStore= $filename.'_'.time().'.'.$extension;

	$path = $request->file('cover_image')->storeAs('public/cover_images',$fileNametoStore);

	}else {
	$fileNameToSTore = 'noimage.jpg';

	}

	$post= new Post;
    $post->title = $request->input('title');
    $post->body = $request->input('body');
    $post->user_id = auth()->user()->id;
    $post->cover_image = $fileNameToStore;
$post->save();

return redirect('/posts')->with('success','Post Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {	
	
	$isSet = $this->bla();

	$post = Post::find($id);
       
	 return view('posts/show')->with('post',$post)->with('isSet',$isSet);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	$post = Post::find($id);

         if(auth()->user()->id !==$post->user_id)
	{
	return redirect('/posts')->with('error','Unauthorized page');
	}	
	
       
	 return view('posts/edit')->with('post',$post);

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
                $this->validate($request,[
		'title'=>'required',
		'body'=>'required']);
	$post=new Post;
    	$post->title = $request->input('title');
    	$post->body = $request->input('body');
	$post->user_id = auth()->user()->id;
	$post->save(); 
return redirect('/posts')->with('success','Post Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
         if(auth()->user()->id !==$post->user_id)
	{
	return redirect('/posts')->with('error','Unauthorized page');
	}	

	$post->delete();
	return redirect('/posts')->with('success','Post Removed');
    }
}
