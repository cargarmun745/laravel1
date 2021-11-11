@extends ('indexResource')

@section('inside')
	<div class="table-title">
		<div class="row">
			<div class="col-xs-6">
				<h2>Edit <b>Resource</b></h2>
			</div>
		</div>
	</div>
	@if (old('id') != '')
        <div class="alert alert-danger" role="alert">
            Error. ID ya existente.
        </div>
    @endif
	<table class="table table-striped table-hover">
		<tbody>
			<form action="{{ url('resource/'. $resource['id']) }}" method="post">
                @csrf
                @method('put')
                <br>
                <input value="{{ $resource['id'] }}" type="number" name="id" placeholder="#id" min="1" step="1" required/><br>
                <input value="{{ old('name', $resource['name']) }}" type="text" name="name" placeholder="name of the resource" min-length="5" max-length="30" required/><br>
                <input value="{{ old('price', $resource['price']) }}" type="number" name="price" placeholder="price" min="1" step"0.01" required/><br>
                <input type="submit" value="Edit"/>
            </form>
		</tbody>
	</table>
@endsection
