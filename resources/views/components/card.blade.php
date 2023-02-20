<a class="card custom-card" href="{{URL::to('/show/'.$link)}}" style="width: 18rem;">
    <img src="{{URL::to($image)}}" class="card-img-top" >
    <div class="card-body">
      <h5 class="card-title black">{{$name}}</h5>
      <p class="card-text black-fade">{{number_format($price, 2, ',', ' ')}} €</p>
    </div>
</a>