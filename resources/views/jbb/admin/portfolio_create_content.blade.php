<form action="{{ route('admin.portfolio.store') }}" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}          
<!-- <div class="form-group">
    <label for="title">Введите название</label>
    <input class="form-control" id="title" placeholder="Название" name="title">
</div>  -->
<label>Категория</label>
<select class="browser-default custom-select mb-4" name="filter">
		@foreach($filter as $item)
    		<option value="{{$item->alias}}">{{$item->title}}</option>
		@endforeach
</select>         
<div class="form-group">
    <label for="img">Выберите файл</label>
    <input id="img" type="file" name="image" class="form-control-file">
</div>
<button type="submit" class="btn btn-default">Добавить</button>
</form>