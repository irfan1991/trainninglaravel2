@extends('layouts.test')
@section('content')
<style type="text/css">
	.uper{
		margin-top: 40px;
	}
</style>

<div class="uper">
	<H1>SHARES LIST</H1>
	@if(session()->get('succes'))
	<div class="alert alert-success">
		{{ session()->get('succes') }}
		
	</div><br/>
	@endif
	
	<a href="{{ route('shares.create')}}" class="btn btn-primary">Add</a><br><br>

	<table class="table table-striped">
		<thead>
			<tr>
				<td>No</td>
				<td>Stock Nama</td>
				<td>Stock Price</td>
				<td>Stock Quantity</td>
				<td colspan="2">Action</td>
			</tr>
		</thead>
		<tbody>
			@foreach($shares as $share)
			<tr>
				<td>{{$no++}}</td>
				<td>{{$share->share_name}}</td>
				<td>{{$share->share_price}}</td>
				<td>{{$share->share_qty}}</td>
				<td><a href="{{ route('shares.edit', $share->id) }}" class="btn btn-primary">Edit</a></td>
				<td>
					<form action="{{ route('shares.destroy', $share->id)}}" method="POST">
						@csrf
						@method('DELETE')
						<button class="btn btn-danger" type="submit">Delete</button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</div>
@endsection