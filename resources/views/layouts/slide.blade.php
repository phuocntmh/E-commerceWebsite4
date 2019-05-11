<div class="container">
  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
      @for ($i=1; $i <count($slide); $i++)
        <li data-target="#carousel-example-generic" data-slide-to="{{$i}}"></li>
      @endfor
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img class="slide-image" src="image/slide/{{$slide[0]->image}}" alt="">
      </div>
      @for ($i=1; $i <count($slide); $i++)
      <div class="item">
        <img class="slide-image" src="image/slide/{{$slide[$i]->image}}" alt="">
      </div>
      @endfor
    </div>
    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<div class="space50"></div>
