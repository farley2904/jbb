<form action="{{ route('admin.portfolio.store') }}" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}          
<div class="form-group">
    <label for="title">Введите название</label>
    <input class="form-control" id="title" placeholder="Название" name="title">
</div>          
<div class="form-group">
    <label for="img">Выберите файл</label>
    <input id="img" type="file" name="file" class="form-control-file">
</div>
<button type="submit" class="btn btn-default">Добавить</button>
</form>