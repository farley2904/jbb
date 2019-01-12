{{-- <h4 class="card-title">{{$title}}</h4> --}}
<div class="row">
	<div class="col-md-6 ">
		<form action="{{ route('admin.information.store') }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group">
				<input type="file" name="image">
				<button class="btn btn-default" tupe="submit">Загрузка</button>
			</div>
		</form>
		@isset($path)
			<img class="img-fluid" src="{{ asset('/storage/' . $path) }}">
		@endisset
	</div>
</div>



<div class="row">
	<div class="col-md-6 ">
		<input type="text" id="feature_image" name="feature_image" value="">

		<a href="" class="popup_selector btn btn-default" data-inputid="feature_image">Загрузка +</a>

	</div>
</div>