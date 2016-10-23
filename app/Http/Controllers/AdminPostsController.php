<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostsRequest;
use App\Photo;
use App\Post;
use App\Product;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $posts=Product::all();
        
        return view('admin.posts.index',compact('posts'));
       // return view('admin.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $category=Category::pluck('name','id');
        return view('admin.posts.create',compact('category'));
    }

    public function store(Request $request)
    {




        $input=$request->all();


        if($file=$request->file('imgpath')){

            $name=time().$file->getClientOriginalName();
            $file->move('images',$name);
            $photo=Photo::create(['file'=>$name]);
            $input['imgpath']=$name;
            //$input['imgpath']=$photo->id;


        }

      



        Product::create($input);

        return redirect('admin/post');
    }




    
}
