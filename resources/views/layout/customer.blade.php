{{-- -------------------layout de l'interface client ------------------- --}}

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{URL::to('css/boostrap.min.css')}}" >
    <link rel="stylesheet" href="{{URL::to('css/style.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  </head>
  <body>
    @php
      $links = [["name" => "SOLDE","uri" => "/en_solde"]];
      foreach ($categorie as $c) {
        array_push($links,["name" => strtoupper($c->name),"uri" => '/categorie/'.$c->id]);
      };
      $links = json_encode($links);
    @endphp
    <x-header :links="$links" :isAdmin="false"/>
    
    @yield('content')

    <x-footer/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>