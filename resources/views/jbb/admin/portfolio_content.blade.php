<h2>Портфолио</h2>
<div class="col" style="display: table;">  
  <a href="{{route('admin.portfolio.create')}}" role="button" class="btn btn-success waves-effect waves-light pull-right mb-4"><i class="fa fa-plus"></i></a>
</div>
<ol>
  @if($portfolios)
  @foreach($portfolios as $portfolio)
    <li>
      <div class="list-group-item d-flex justify-content-between list-group-item-action">
        <div class="col">
          <img src="{{ asset(env('THEME')) }}/images/portfolios/{{ $portfolio->img->sm }}" width="200" height="200" alt="{{$portfolio->title}}" title="{{$portfolio->alias}}">
        </div>
        <div></div>
        <div class="col">
          <a href="{{route('admin.portfolio.edit','id')}}" class="btn btn-warning float-right" role="button"><i class="fa fa-edit"></i></a>

            {!! Form::open(['url' => route('admin.portfolio.destroy',['portfolio'=>$portfolio->id]),'method'=>'POST']) !!}

              {{ method_field('DELETE') }}

              {!! Form::button('<i class="fa fa-remove"></i>', ['class' => 'btn btn-danger float-right','type'=>'submit']) !!}

              {!! Form::close() !!}
        </div>
      </div>
    </li>
  @endforeach
  @endif
</ol>