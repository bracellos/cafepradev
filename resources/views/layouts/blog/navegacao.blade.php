<nav class="navbar navbar-expand-lg bg-warning">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Blog Café pra DEV</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/quem-somos">Quem somos</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="/artigos">Artigos</a>
          </li>
        </ul>
        @php
        $search = (isset($search)) ? $search : "";  
        @endphp
        <form class="d-flex" role="search" method="GET" action="/artigos">
          <input class="form-control me-2" type="search" name="search" value="{{$search}}" placeholder="Buscar artigos" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
      </div>
    </div>
</nav>