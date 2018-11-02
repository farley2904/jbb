{!! Form::open(['url' => (isset($user->id)) ? route('admin.users.update',['users'=>$user->id]) :route('admin.users.store'),'class'=>'contact-form','method'=>'POST','enctype'=>'multipart/form-data']) !!} 
	
	
			{!! Form::text('name',isset($user->name) ? $user->name  : old('name'), ['placeholder'=>'Введите имя','class'=>'form-control']) !!}<br>
		
			{!! Form::text('login',isset($user->login) ? $user->login  : old('login'), ['placeholder'=>'Введите логин','class'=>'form-control']) !!}<br>
		
			{!! Form::text('email',isset($user->email) ? $user->email  : old('email'), ['placeholder'=>'Введите название почты','class'=>'form-control']) !!}<br>
	
			{!! Form::password('password', ['placeholder'=>'Введите пароль','class' => 'form-control']) !!}<br>
	
			{!! Form::password('password_confirmation', ['placeholder'=>'Введите подтверждение пароля ','class' => 'form-control']) !!}<br>
			
			{!! Form::select('role_id', $roles, (isset($user)) ? $user->roles()->first()->id : null, ['class' => 'form-control']) !!}<br>
				
			@if(isset($user->id))
				<input type="hidden" name="_method" value="PUT">		
			@endif

			{!! Form::button('Сохранить', ['class' => 'btn btn-success btn-lg pull-right btn-add','type'=>'submit']) !!}			

{!! Form::close() !!}

