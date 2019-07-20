<h2>Портфолио</h2>
<div class="col">  
  <a href="{{route('admin.portfolio.create')}}" role="button" class="btn btn-success"><i class="fa fa-plus"></i></a>
</div>
<ol>
  <li>
    <div class="list-group-item border-0 d-flex justify-content-between">
      <div>
        <img src="https://jbb.com.ua/jbb/images/thumb.png" width=50px height=55px alt="portfolio">
      </div>
      <div>
        <a href="{{route('admin.portfolio.destroy','id')}}" class="btn btn-danger float-right" role="button">Удалить</a>
        <a href="{{route('admin.portfolio.edit','id')}}" class="btn btn-warning float-right" role="button">Изменить</a>
      </div>
    </div>
  </li>
  <li>
    <div class="list-group-item border-0 d-flex justify-content-between">
      <div>
        <img src="https://jbb.com.ua/jbb/images/thumb.png" width=50px height=55px alt="portfolio">
      </div>
      <div>
        <a class="btn btn-danger float-right" role="button">Удалить</a>
        <a class="btn btn-warning float-right" role="button">Изменить</a>
      </div>
    </div>
  </li>
</ol>