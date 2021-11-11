@php
  use App\Http\Controllers\IndexController;
@endphp

@extends ('indexResource')

@section('inside')
    <!-- nuevo 1 -->
    <div class="modal" id="modalDelete" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Confirm delete</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Confirm delete?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <form id="modalDeleteResourceForm" action="" method="post">
                @method('delete')
                @csrf
                <input type="submit" class="btn btn-primary" value="Delete resource"/>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- fin nuevo 1 -->
	<div class="table-title">
		<div class="row">
			<div class="col-xs-6">
				<h2>Index <b>Resource</b></h2>
			</div>
			
			@isset($message)
        <br>
        <div class="alert alert-{{ $type }}" role="alert">
            {{ $message }}
        </div>
      @endisset
			<div class="col-xs-6">
				<a href="{{ url('resource/create') }}" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
				<a href="{{ url('resource/flush/all') }}" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete All</span></a>						
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
		    @foreach ($resources as $resource)
                <tr>
                    <td>
                        {{ $resource['id'] }}
                    </td>
                    <td>
                        {{ $resource['name'] }}
                    </td>
                    <td>
                        {{ $resource['price'] }}
                    </td>
    				<td>
    					<a href="{{ url('resource/'.$resource['id']) }}">Show</a>
    					<a href="{{ url('resource/'.$resource['id'].'/edit') }}">Edit</a>
    					<a href="javascript: void(0);" data-url="{{ url('resource/' . $resource['id']) }}" data-bs-toggle="modal" data-bs-target="#modalDelete">Delete</a>
    				</td>
                </tr>
            @endforeach
		</tbody>
	</table>
@endsection

@section('js')
    <!-- nuevo 4 -->
    <script src="{{ url('assets/js/delete.js') }}"></script>
    <!-- nuevo 4 -->
@endsection