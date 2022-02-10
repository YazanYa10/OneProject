<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        //return view('welcome')->with('books',$books);
        return view('welcome',compact('articles'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        //
        $this->validate($request,[
            'title' => 'required|max:25|min:5',
            'body' => 'required',
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        $file = $request->file('thumbnail');
        $time = Carbon::now();
        //
        $directory = date_format($time,'Y').'/'.date_format($time,'m');
        $filename = date_format($time,'h').date_format($time,'s').rand(1,9).'.'.$file->extension();
        //3: Save Image On Server
        
        Storage::disk('public')->putFileAs($directory,$file,$filename);
        $book = Article::create([
            'title' => $request->title,
            'body'  => $request->body,
            'thumbnail' => $directory.'/'.$filename,
            'user_id' => $id
        ]);
        $request->Session()->flash('message','Article added successfully');
        return redirect('/controlarticles'); 
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
        $article = Article::where('id',$id)->first();
        return view('content.article',compact('article'));
    }
    public function controlarticle()
    {
        $articles = Article::paginate(1);
        return view('admin.controlarticles',compact('articles'));
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
        $article = Article::where('id',$id)->first();
        return view('admin.edit',compact('article'));
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
        $article = Article::where('id',$id)->first();
        $article->update([
            'title' => $request->title,
            'body'  => $request->body,
        ]);
         //1: Get Image From Form 
         if($request->file('thumbnail')){
            $file = $request->file('thumbnail');
            //2: Name For Image
            $time = Carbon::now();
            $directory = date_format($time,'Y').'/'.date_format($time,'m');
            $filename = date_format($time,'h').date_format($time,'s').rand(1,9).'.'.$file->extension();
            //3: Save Image On Server
            Storage::disk('local')->putFileAs($directory,$file,$filename);
            $article->thumbnail = $directory.'/'.$filename;
            $article->save();
         }
        $request->Session()->flash('message','Article Edited successfully');
        return redirect('/controlarticles'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $article = Article::where('id',$id)->first();
        $article->delete();
        Session()->flash('message','Article Deleted successfully');
        return redirect('/controlarticles'); 
    }
}
