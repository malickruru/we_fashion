<a class="card custom-card w-80 bg-base-100 shadow-xl my-4	" href="{{URL::to('/show/'.$link)}}">
  <img class="card-img-top" src="{{URL::to($image)}}" alt="Shoes" />
  <div class="card-body">
    <h2 class="card-title">
      {{$name}}
    </h2>
    <p>{{number_format($price, 2, ',', ' ')}} €</p>
    
  </div>
</a>