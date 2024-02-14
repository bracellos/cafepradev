@extends('layouts.blog.template')
@section("title", $article->title)
@section('content')
<div class="row mt-4">
    <div class="col-12">
        <h1>
            <span class="badge bg-info">{{date("d/m/Y", strtotime($article->date))}}</span> 
            {{$article->title}}
        </h1>
    </div>
</div>
@php
    $totalCaracters = strlen($article->text);

@endphp

<div class="row mt-5">
    <div class="col col-sm-12 col-md-4">
        <img src="https://alkasoft.com.br/wp-content/uploads/2017/09/imagem125_2-700x321.jpg" class="img-fluid">
    </div>
    <div class="col col-sm-12 col-md-8">
        {{substr($article->text,0, $totalCaracters/2)}}
    </div>
    <div class="col col-sm-12 col-md-12">
        {{substr($article->text,$totalCaracters/2, $totalCaracters)}}
    </div>
</div>

<div class="row">
    <div class="col-12">
        <h2>Outros Artigos</h2>
    </div>
</div>

<div class="row">
    @foreach ($others as $a)
    <div class="col col-sm-12 col-md-3">
        <div class="card">
            <img src="https://alkasoft.com.br/wp-content/uploads/2017/09/imagem125_2-700x321.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{$a->title}}</h5>
              <p class="card-text">{{substr($a->preview, 0, 100)}}(...)</p>
            </div>
            <div class="card-action">
              <small>{{date("d/m/Y", strtotime($a->date))}}</small>
              <a href="/artigo/{{$a->id}}/{{Illuminate\Support\Str::slug($a->title)}}" class="btn btn-primary">LER AGORA</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection