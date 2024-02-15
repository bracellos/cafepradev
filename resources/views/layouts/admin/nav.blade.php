<nav class="navbar navbar-expand-lg bg-warning">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">painel Administração</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/admin">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/banners">Banners</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="/admin/artigos">Artigos</a>
          </li>
        </ul> 
        @if (Auth::user())
            <ul class="navbar-nav mb-2 align-self-end">
              <li class="nav-item dropdown">
                <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Olá Diego, seja bem vindo</a>
                <ul class="dropdown-menu">
                  <li><a href="" class="dropdown-item">Perfil</a></li>
                  <li><a href="" class="dropdown-item">Mudar senha</a></li>
                  <li><a href="/admin/logout" class="dropdown-item">Sair</a></li>
                </ul>
              </li>
            </ul>
        @endif  
      </div>
    </div>
</nav>