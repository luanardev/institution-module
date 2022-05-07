@extends('institution::layouts.app')

@section('content')

<div class="container-fluid">
	<!-- Breadcrumbs Start -->
	<div class="content-header">

		<div class="row mb-2">
			<div class="col-sm-6">
				<h4 class="m-0">Departments</h4>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ url('institution') }}">Home</a></li>
					<li class="breadcrumb-item active">Departments</li>
				</ol>
			</div>
		</div>
	</div>
	<!-- Breadcrumbs End -->
    <x-adminlte-flash />
	<div class="content">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

						<div class="float-right">
							@can('create_department')
								<a class="btn btn-sm btn-primary" href="{{route('department.create')}}">
									<i class="fas fa-plus-circle"></i>
									<span class="d-none d-xs-none d-sm-inline d-md-inline d-lg-inline"> Add Department</span>
								</a>
							@endcan
							
						</div>

					</div>
                    <div class="card-body">
                        <div class="table-responsive">
						    <livewire:institution::department-table />
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection
