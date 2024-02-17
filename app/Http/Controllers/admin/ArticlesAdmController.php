<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ArticlesAdmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        return view("admin/artigos/articles", [
            "articles" => Articles::OrderBy("id", "desc")->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        /* if (! Gate::allows('deleta-artigo', 1)) {
            abort(401);
        } */

        $this->authorize("create", 1);

        return view("admin/artigos/create", [
            "categorias" => Categories::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $article = new Articles;
        $article->title = $request->title;
        $article->preview = $request->preview;
        $article->author = $request->author;
        $article->text = $request->text;
        $article->from_categories = $request->from_categories;
        $article->date = date("Y-m-d h:i:s");

        //upload da imagem
        if($request->hasFile("image") && $request->file("image")->isValid()){
            $name = strtotime("now").".".$request->image->extension();
            $request->image->move(public_path("upload"), $name);
            $article->image = $name;
        }

        $article->save();
        return redirect("/admin/artigos")
            ->with("success", "Registro inserido com sucesso.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
        return view("admin/artigos/edit", [
            "categorias" => Categories::all(),
            "article" => Articles::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){
        $article = Articles::find($id);
        $article->title = $request->title;
        $article->preview = $request->preview;
        $article->author = $request->author;
        $article->text = $request->text;
        $article->from_categories = $request->from_categories;

        $imgAtual = $article->image;
        //upload
        if($request->hasFile("image") && $request->file("image")->isValid()){

            //deletar imagem antiga se tiver
            if(file_exists(public_path("upload/").$imgAtual)){
                unlink(public_path("upload/").$imgAtual);
            }

            $name = strtotime("now").".".$request->image->extension();
            $request->image->move(public_path("upload"), $name);
            $article->image = $name;
        }
        $article->update();
        return redirect("/admin/artigos")
            ->with("success", "Registro atualizado com sucesso");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Articles::find($id);

        //verificar se existe uma imagem para deletar
        if(file_exists(public_path("upload/").$article->image)){
            //deleta o arquivo
            unlink(public_path("upload/").$article->image);
        }
        
        $article->delete();
        return redirect("/admin/artigos")
            ->with("success", "Registro deletado com sucesso.");
    }
}
