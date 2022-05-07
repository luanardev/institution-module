@extends('institution::layouts.app')

@section('content')

<div class="container-fluid">
	<!-- Breadcrumbs Start -->
	<div class="content-header">

		<div class="row mb-2">
			<div class="col-sm-6">
				<h4 class="m-0">Campuses</h4>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ url('institution') }}">Home</a></li>
					<li class="breadcrumb-item active">Campuses</li>
				</ol>
			</div>
		</div>
	</div>

    <x-adminlte-flash />

	<div class="content">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

						<div class="float-right">
							@can('create_campus')
								<a class="btn btn-sm btn-primary" href="{{route('campus.create')}}">
									<i class="fas fa-plus-circle"></i>
									<span class="d-none d-xs-none d-sm-inline d-md-inline d-lg-inline"> Add Campus</span>
								</a>
							@endcan
						</div>

					</div>
                    <div class="card-body">
                        <div class="table-responsive">
						    <livewire:institution::campus-table />
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection
