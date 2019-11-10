<h2>Портфолио</h2>
<div class="row"> 
  <div class="col">
    
 <a href="{{route('admin.portfolio.create')}}" role="button" class="btn btn-success waves-effect waves-light pull-right mb-4"><i class="fa fa-plus"></i></a>
  </div> 
</div>
<ol>
  @if($portfolios)
  @foreach($portfolios as $portfolio)
    <li>
      <div class="list-group-item d-flex justify-content-between list-group-item-action">
        <div >
          <img src="{{ asset(env('THEME')) }}/images/portfolios/{{ $portfolio->img->sm }}" width="120" height="120" alt="{{$portfolio->title}}" title="{{$portfolio->alias}}">
        </div>
        <!-- <div><select class="browser-default custom-select mb-4" name="filter"> -->
    {{-- @foreach($filter as $item) --}}
        {{-- <option value="{{$item->alias}}">{{$item->title}}</option> --}}
    {{-- @endforeach --}}
<!-- </select>    </div> -->
        <div >
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