<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ArticleController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        // $data = Article::all();
        $data = Article::latest()->paginate(5);
        return view('articles.index',["articles"=>$data]);
    }
    public function add(){
        $data = Category::all();
        return view('articles.add',["categories"=>$data]);
    }
    public function create(){
        $validator = validator(request()->all(),[
            "title"=>"required",
            "body"=>"required",
            "category_id"=>"required"
        ]);
        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $article = new Article();
        $article->title = request('title');
        $article->body = request('body');
        $article->category_id = request('category_id');
        $article->user_id = Auth()->user()->id;
        $article->save();

        return redirect("/articles");
    }

    public function details($id){
        $data = Article::find($id);
        return view('articles.detail',['article'=>$data]);
    }
    public function delete($id){
        $data = Article::find($id);
        if(Gate::allows('article-delete',$data)){
            $data->delete();
            return redirect('/articles')->with('info','Article Deleted');
        }else{
            return redirect('/articles')->with('error','Unauthorized');

        }
    }
}
