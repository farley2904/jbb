
<form action="{{ route('admin.permissions.store') }}" method="POST">
		{{ csrf_field() }}
		
		<div class="short-table white">
		
			<table style="width:100%">
				
				<thead>
					
					<th>Привилегии</th>
					@if(!$roles->isEmpty())
					
						@foreach($roles as $item)
							<th>{{ $item->name}}</th>
						@endforeach
					
					@endif
					
				</thead>
				<tbody>
					
					@if(!$permissions->isEmpty())
					
						@foreach($permissions as $val)
							<tr>
								
								<td>{{ $val->name }}</td>
									@foreach($roles as $role)
										<td>
											@if($role->hasPermission($val->name))
											*
											@endif
										</td>
									@endforeach
							</tr>
						@endforeach
					
					@endif

				</tbody>
				
				
			</table>
			
			
		</div>
		
		<input class="btn btn-success btn-add" type="submit" value="Обновить" />

		
	</form>