@extends('layouts.blog.template')
@section("title", "Blog Café pra DEV | Artigos")
@section('content')
<div class="row">
    <div class="col-12">
        <h1>Artigos</h1>
    </div>
</div>

<div class="row">
    @foreach ($articles as $a)
        <div class="col col-sm-12 col-md-6">
            <div class="card mb-3">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="https://alkasoft.com.br/wp-content/uploads/2017/09/imagem125_2-700x321.jpg" class="img-fluid rounded-start">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">{{$a->title}}</h5>
                      <p class="card-text">{{$a->preview}}</p>
                    </div>
                    <div class="card-action">
                        <small class="text-body-secondary">{{date("d/m/Y", strtotime($a->date))}}</small>
                        <a href="/artigo/{{$a->id}}/{{Illuminate\Support\Str::slug($a->title)}}" class="btn btn-primary">LER AGORA</a>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="row">
    <div class="col-12">
        {{$articles->links()}}
    </div>
</div>
@endsection