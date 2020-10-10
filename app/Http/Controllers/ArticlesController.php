<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use UxWeb\SweetAlert\SweetAlert;
use App\Http\Controllers\Controller;
use App\Article;
use App\Category;
use App\Tag;
use App\Image;


class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        //Consultamos al modelo DB Category.php
        $article = Article::Buscara($request->title)->orderby('id','DESC')->paginate(5);
        $article->each(function($article){
            $article->category;
            $article->user;
        });
        //Pasar datos a a la vista 
        return view('admin.articles.index')->with('articles',$article);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $Categorias = Category::orderBy('name', 'ASC')->get();
        $Etiquetas = Tag::orderBy('name', 'ASC')->get();

        return view('admin.articles.create')
        ->with('categorias',$Categorias)->with('etiquetas',$Etiquetas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        //Manipulacion de imagen
        if ($request->file('image')) {
            $file = $request->file('image');
            $nameImage = 'blogmanye'.time().'.'.$file->clientExtension();
            $path = public_path().'/images/article';
            $file->move($path,$nameImage);
        }

        $addArticle = new Article($request->all());
        $addArticle->user_id = \Auth::user()->id;
        $addArticle->save(); 

        $addArticle->tags()->sync($request->tag_id);

        $addImage = New Image();
        $addImage->name = $nameImage;
        $addImage->article()->associate($addArticle);
        $addImage->save();

        alert()->success('Se agrego '.$addArticle->title.' correcamente','REGISTRADO');
        return redirect('admin/articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showimage()
    {
        //
        $Pictures = Image::orderby('id','DESC')->paginate(6);
        $Pictures->each(function($Pictures){
            $Pictures->article;
        });

        return view('admin.articles.image')
        ->with('fotos',$Pictures);
    }

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
        $Articulo = Article::find($id);
        $Categorias = Category::orderBy('name', 'ASC')->get();
        $Etiquetas = Tag::orderBy('name', 'ASC')->get();

        $Tags = $Articulo->tags->pluck('id');
        //->pluck('id','name');

        //dd($Tags);

        return view('admin.articles.edit')
        ->with('categorias',$Categorias)
        ->with('etiquetas',$Etiquetas)
        ->with('tags',$Tags)
        ->with('articulo',$Articulo);
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
        $ArticleUpdate = Article::find($id);
        $ArticleUpdate->title = $request->title;
        $ArticleUpdate->content = $request->content;
        $ArticleUpdate->category_id = $request->category_id;
        $ArticleUpdate->user_id = \Auth::user()->id;
        $ArticleUpdate->save();
        $ArticleUpdate->tags()->sync($request->tag_id);
        alert()->success('Se actualizo '.$ArticleUpdate->title.' correcamente','ACTUALIZAR');
        return redirect('admin/articles');
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
        $deleteArticle =Article::find($id);
        $deleteArticle->delete();
        alert()->success('Se elimino '.$deleteArticle->name.' correcamente','REMOVIDO');
        return redirect('admin/articles');
    }
}
