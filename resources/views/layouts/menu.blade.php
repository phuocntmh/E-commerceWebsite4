<div class="col-md-3">
  <ul class="list-group">
    <div class="panel panel-title" style="background-color:#337AB7; color:white;text-align: center;">
      <h4><b>Danh mục</b></h4>
    </div>
        @foreach ($type_products as $key)
          <a href="san-pham/{{$key->id}}" class="list-group-item">
            {{$key->name}}
          </a>
        @endforeach
  </ul>
</div>
