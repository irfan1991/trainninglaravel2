@extends('layouts.test')
@section('content')
<style type="text/css">
	.uper{
		margin-top: 40px;
	}
</style>

<div class="card uper">
	<div class="card-header">
		Add Share
		
	</div>
	<div class="card-body">
		@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error}}</li>
				@endforeach
			</ul>
		</div> <br/>
		@endif

		<form method="post" action="{{ route('shares.update', $shares->id)}}">
			<div class="form-group">
				<!-- @csrf
				@method('PATCH') -->
<input type="hidden" name="_token" value="{!! csrf_token() !!}">
 <input type="hidden" name="_method" value="PATCH" />


				<label for="share_namer">Share Name :</label>
				<input type="text" name="share_namer"  class="form-control" value="{{$shares->share_name}}" />
			</div>

			<div class="form-group">
				<label for="share_pricer">Share Price :</label>
				<input type="number" name="share_pricer" class="form-control"  value="{{$shares->share_price}}" />
			</div>

			<div class="form-group">
				<label for="share_qtyr">Share Qty :</label>
				<input type="number" name="share_qtyr"  class="form-control"  value="{{$shares->share_qty}}" />
			</div>

			<button type="submit" class="btn btn-primary">Update</button>
			
		</form>

	</div>
	
</div>
@endsection