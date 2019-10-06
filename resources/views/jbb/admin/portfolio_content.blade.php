<h2>Портфолио</h2>
<div class="col" style="display: table;">  
  <a href="{{route('admin.portfolio.create')}}" role="button" class="btn btn-success waves-effect waves-light pull-right mb-4"><i class="fa fa-plus"></i></a>
</div>
<ol>
  @foreach($portfolios as $portfolio)
    <li>
      <div class="list-group-item d-flex justify-content-between list-group-item-action">
        <div>
          <img src="{{ asset(env('THEME')) }}/images/portfolios/{{ $portfolio->img->sm }}" alt="portfolio">
        </div>
        <div></div>
        <div>
          <a href="{{route('admin.portfolio.destroy','id')}}" class="btn btn-danger float-right" role="button"><i class="fa fa-remove"></i></a>
          <a href="{{route('admin.portfolio.edit','id')}}" class="btn btn-warning float-right" role="button"><i class="fa fa-edit"></i></a>
        </div>
      </div>
    </li>
  @endforeach
</ol>