@extends ('indexResource')

@section('inside')
	<div class="table-title">
		<div class="row">
			<div class="col-xs-6">
				<h2>Show <b>Resource</b></h2>
			</div>
		</div>
	</div>
	
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Price</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
            <tr>
                <td>{{ $resource['id'] }}</td>
                <td>{{ $resource['name'] }}</td>
                <td>{{ $resource['price'] }}</td>
                <td><a href="{{ url('resource') }}">Index</a></td>
            </tr>
		</tbody>
	</table>
@endsection
