<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('start')}}">Start</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('kontakt')}}">Kontakt</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('onas')}}">O nas</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Posty
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Lista postów</a></li>
              <li><a class="dropdown-item" href="#">Dodaj posta</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
