{{-- -------------------composant header ------------------- --}}
{{--  
    il prend en paramètre un tableau contenant les liens de navigation
    il prend en paramètre le booleen isAdmin qui indique si l'on ce trouve sur l'interface admin --}}


<nav class="navbar navbar-expand-lg bg-dark">
    <div class="container">
      <a class="navbar-brand" href="/" style="color : #66EB9A;">WE FASHION</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            @foreach (json_decode($links) as $link)
            <li class="nav-item">
                <a class="nav-link link-light text-decoration-none" href="{{route($link->uri)}}">{{$link->name}}</a>
            </li>
            @endforeach
          {{-- <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li> --}}
        </ul>
        <span class="navbar-text ">
          @if ($isAdmin)
            <a class="link-light text-decoration-none" href="/">Interface client</a>
          @endif
        </span>
      </div>
    </div>
  </nav>