
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
											
										</td>
									@endforeach
							</tr>
						@endforeach
					
					@endif

				</tbody>
				
				
			</table>
			
			
		</div>
		
		<input class="btn btn-the-salmon-dance-3" type="submit" value="Обновить" />

		
	</form>