@extends ('indexResource')

@section('inside')
	<div class="table-title">
		<div class="row">
			<div class="col-xs-6">
				<h2>Create <b>Resource</b></h2>
			</div>
		</div>
	</div>
	@if (old('id') != '')
        <div class="alert alert-danger" role="alert">
            Error. Mira el ID.
        </div>
    @endif
	<table class="table table-striped table-hover">
		<tbody>
			<form action="{{ url('resource') }}" method="post">
                @csrf
                <br>
                <?php
                	echo $id
                ?><br>
                <input type="hidden" name="id" value="{{ $id }}">
                <input value="{{ old('name') }}" type="text" name="name" placeholder="name of the resource" min-length="5" max-length="30" required/><br>
                <input value="{{ old('price') }}" type="number" name="price" placeholder="price" min="1" step"0.01" required/><br>
                <input type="submit" value="Create"/>
            </form>
		</tbody>
	</table>
@endsection
