{{-- -------------------composant header ------------------- --}}
{{--  
    il prend en paramètre un tableau contenant les liens de navigation
    il prend en paramètre le booleen isAdmin qui indique si l'on ce trouve sur l'interface admin --}}

<div class="navbar bg-base-content text-base-100">
    <div class="flex-1">
        <a class="btn btn-ghost normal-case text-xl" href="/" style="color : #66EB9A;">WE FASHION</a>
        <ul class="menu menu-horizontal px-1">
            @foreach (json_decode($links) as $link)
                <li class="nav-item">
                    <a class="nav-link link-light text-decoration-none"
                        href="{{ URL::to($link->uri) }}">{{ $link->name }}</a>
                </li>
            @endforeach

        </ul>
    </div>
    <div class="flex-none">
        <ul class="menu menu-horizontal px-1">
            <li class="navbar-text ">
                @if ($isAdmin)
                    <a class="link-light text-decoration-none" href="/">Interface client</a>
                @endif
            </li>
            
            @if (Auth::check())
            <li>
                <a class="link-light text-decoration-none px-3" href="{{ route('cart') }}"><i
                        class="bi bi-cart-fill"></i></a>
            </li>
            <li class="text-error">
                <a class="link-error text-decoration-none" href="{{route('logout')}}">Se déconnecter</a>
            </li>
            @else
            <li>
                <a class="link-light text-decoration-none" href="{{route('showLogin')}}">Se connecter</a>
            </li>
            @endif
            
        </ul>
    </div>
</div>
