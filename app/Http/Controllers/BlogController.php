<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\ChooseUs;

class BlogController extends Controller
{
    public function blogs(){
    	$blogs = Blog::where('status',Blog::ACTIVE)->get();
    	return view('blogs.index')->with([
    		'blogs' => $blogs
    	]);
    }

    public function addBlog(){
    	return view('blogs.add');
    }

    public function editBlog($id){
    	$blog = Blog::find($id);
    	return view('blogs.edit')->with([
    		'blog' => $blog
    	]);
    }

    public function saveBlog(Request $request){
    	try{

    		$blog = new Blog;
	    	$blog->title = $request->title;
	    	$blog->description = $request->content;

	    	if($request->file("image")) {
	            $image = $request->file("image");
	            $file_name = time() . "." . $image->getClientOriginalExtension();
	            $image->move("blogs/", $file_name);

	            $blog->image = $file_name;
	        }

	        $blog->save();

	        return redirect()->route('blogs')->with('success','Blog created successfully!');

    	}catch(\Exception $e){
    		return redirect()->back()->with('error',$e->getMessage().' on line no '.$e->getLine().' in file '.$e->getFile());
    	}
    }

    public function updateBlog(Request $request){
    	try{

    		$blog = Blog::find($request->id);
	    	$blog->title = $request->title;
	    	$blog->description = $request->content;

	    	if($request->file("image")) {

	    		if(file_exists("blogs/".$blog->image)){
                    unlink("blogs/".$blog->image);
                }

	            $image = $request->file("image");
	            $file_name = time() . "." . $image->getClientOriginalExtension();
	            $image->move("blogs/", $file_name);

	            $blog->image = $file_name;
	        }

	        $blog->save();

	        return redirect()->route('blogs')->with('success','Blog updated successfully!');

    	}catch(\Exception $e){
    		return redirect()->back()->with('error',$e->getMessage().' on line no '.$e->getLine().' in file '.$e->getFile());
    	}
    }

    public function deleteBlog(Request $request){
        try{
            $blog = Blog::find($request->id);
            $blog->delete();

            return response()->json([
                'status' => true,
                'message' => 'Blog deleted successfully!'
            ],200);

        }catch(\Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage().' on line no '.$e->getLine().' in file '.$e->getFile()
            ],200);
        }
    }

    // why choose us
    public function chooseUs(){
    	$choose_us = ChooseUs::all();
    	return view('choose_us.index')->with([
    		'choose_us' => $choose_us
    	]);
    }

    public function editChooseUs($id){
    	$choose_us = ChooseUs::find($id);
    	return view('choose_us.edit')->with([
    		'choose_us' => $choose_us
    	]);
    }

    public function updateChooseUs(Request $request){

    	$choose_us = ChooseUs::find($request->id);
    	$choose_us->title = $request->title;
    	$choose_us->description = $request->description;
    	$choose_us->save();

    	return redirect()->route('choose-us')->with('success','Why Choose Us added successfully!');
    }
}
