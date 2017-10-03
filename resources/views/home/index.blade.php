@extends('welcome')

@section('content')

			<!-- View Data -->
			<table border="0">
				<th colspan="5">Members</th>
				<tr>
					<td>Id</td>
					<td>Name</td>
					<td>Age</td>
					<td>Email</td>
					<td>Address</td>
				</tr>

				@foreach($member as $value)
				<tr>
					<td>{{$value->id}}</td>
					<td>{{$value->name}}</td>
					<td>{{$value->age}}</td>
					<td>{{$value->email}}</td>
					<td>{{$value->address}}</td>
				</tr>
				@endforeach
			</table>

			<!-- Insert Data -->

			<table border="0">
				<th colspan="2"> Insert </th>
				<tr>
					<td>Name :</td>
					<td><input type="text" name="name" /></td>
				</tr>
				<tr>
					<td>Age :</td>
					<td><input type="text" name="age" /></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" name="email" /></td>
				</tr>
				<tr>
					<td>Address</td>
					<td><input type="text" name="address" /></td>
				</tr>
				<tr>
					<td colspan="2"><button type="submit" id="insert"> Insert </button> </td>
				</tr>
			</table>
			{{ csrf_field() }} <!-- this is important for generate token -->

			<!-- Update Data -->

			<table border="0">
				<th colspan="2">Update</th>
				<tr>
					<td>Select Id:</td>
					<td>
						<select name="upid" id="upid">
							@foreach($member as $value)
								<option value="{{ $value->id}}"> {{ $value->id }} </option>
							@endforeach
						</select>
					</td>
				</tr>
				<tr>
					<td>Name :</td>
					<td><input type="text" name="upname" /></td>
				</tr>
				<tr>
					<td>Age :</td>
					<td><input type="text" name="upage" /></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" name="upemail" /></td>
				</tr>
				<tr>
					<td>Address</td>
					<td><input type="text" name="upaddress" /></td>
				</tr>
				<tr>
					<td colspan="2"><button type="submit" id="update"> Update </button> </td>
				</tr>
			</table>

			<!-- Delete Data -->

			<table border="0">
				<th colspan="2"> Delete </th>
				<tr>
					<td>Select Id:</td>
					<td>
						<select name="upid" id="delid">
							@foreach($member as $value)
								<option value="{{ $value->id}}"> {{ $value->id }} </option>
							@endforeach
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="2"><button type="submit" id="delete"> Delete </button> </td>
				</tr>
			</table>

			<!-- AJAX SECTION -->

			<script type="text/javascript">
				// for Insert Ajax
				$('#insert').click(function(){
					$.ajax({
						type:'post',
						url: 'insertdata',
						data:{
							'_token':$('input[name=_token').val(),
							'name':$('input[name=name').val(),
							'age':$('input[name=age').val(),
							'email':$('input[name=email').val(),
							'address':$('input[name=address').val()
						},
						success:function(data){
							window.location.reload();
						},
					});
				});

				// for Update Ajax
				$('#update').click(function(){
					$.ajax({
						type:'post',
						url: 'updatedata',
						data:{
							'_token':$('input[name=_token').val(),
							'id':$('#upid').val(),
							'name':$('input[name=upname').val(),
							'age':$('input[name=upage').val(),
							'email':$('input[name=upemail').val(),
							'address':$('input[name=upaddress').val()
						},
						success:function(data){
							window.location.reload();
						},
					});
				});

				// for Delete Ajax
				$('#delete').click(function(){
					$.ajax({
						type:'post',
						url: 'deletedata',
						data:{
							'_token':$('input[name=_token').val(),
							'id':$('#delid').val(),
						},
						success:function(data){
							window.location.reload();
						},
					});
				});
			</script>

			
@endsection