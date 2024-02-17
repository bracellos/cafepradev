@extends('layouts.admin.template')
@section('title', "Cadastrar Artigo")
@section('content')
<div class="row">
    <div class="col-12">
        <h1>Cadastrar um novo artigo</h1>
    </div>
</div>
<form action="{{route("artigos.update", $article->id)}}" method="POST" enctype="multipart/form-data">
    @method("PUT")
    @csrf
    <div class="row">
        <div class="col col-sm-12 col-md-4 mb-3">
            <label for="title">Título</label>
            <input type="text" id="title" name="title" value="{{$article->title}}" class="form-control">
        </div>

        <div class="col col-sm-12 col-md-8 mb-3">
            <label for="preview">Preview</label>
            <input type="text" id="preview" name="preview" value="{{$article->preview}}" class="form-control">
        </div>

        <div class="col col-sm-12 col-md-4 mb-3">
            <label for="author">Autor</label>
            <input type="text" id="author" name="author" value="{{$article->author}}" class="form-control">
        </div>

        <div class="col col-sm-12 col-md-4 mb-3">
            <label for="image">Imagem</label>
            <div class="input-group">
                <label for="image" class="input-group-text">
                    <img src="/upload/{{$article->image}}" width="40px">
                </label>
                <input type="file" id="image" name="image" class="form-control">
            </div>
        </div>

        <div class="col col-sm-12 col-md-4 mb-3">
            <label for="from_categories">Categoria</label>
            <select name="from_categories" id="from_categories" class="form-select">
                <option value="">Selecione uma categoria</option>
                @foreach ($categorias as $cat)
                <option value="{{$cat->id}}" @if($cat->id == $article->from_categories) selected @endif>{{$cat->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="col col-sm-12 col-md-12 mb-3">
            <label for="text">Texto</label>
            <textarea name="text" id="" rows="10" class="form-control">{{$article->text}}</textarea>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-warning">SALVAR</button>
        </div>
    </div>
</form>
@endsection