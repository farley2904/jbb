
<h3>Пользователи</h3>
{!! Html::link(route('admin.users.create'),'Добавить пользователя',['class' => 'btn btn-success btn-lg pull-right btn-add']) !!}
<table class="table table-striped table-hover table-responsive-sm">
<thead>
	<th>ID</th>
	<th>Имя</th>
	<th>Почта</th>
	<th>Логин</th>
	<th>Роль</th>
	<th>Удалить</th>
</thead>
@if($users)	
	@foreach($users as $user)
		<tbody>
			<tr>
				<td>{{ $user->id }}</td>
				<td>{!! Html::link(route('admin.users.edit',['users' => $user->id]),$user->name,['class' => 'text-primary']) !!}</td>
				<td>{{ $user->email }}</td>
				<td>{{ $user->login }}</td>
				<td>{{ $user->roles->implode('name', ', ') }}</td>
				<td>
					{!! Form::open(['url' => route('admin.users.destroy',['users'=> $user->id]),'class'=>'form-horizontal','method'=>'POST']) !!}
						{{ method_field('DELETE') }}
						{!! Form::button('Удалить', ['class' => 'btn btn-danger btn-block center-block','type'=>'submit']) !!}
					{!! Form::close() !!}
				</td>
			</tr>
		</tbody>										
	@endforeach
	
@endif
</table>
	