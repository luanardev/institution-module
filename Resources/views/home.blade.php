@extends('institution::layouts.app')

@section('content')

<div class="container-fluid">
	<!-- Breadcrumbs Start -->
	<div class="content-header">

		<div class="row mb-2">
			<div class="col-sm-6">
				<h4 class="m-0">{{config('institution.name')}}</h4>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
					<li class="breadcrumb-item active">Home</li>
				</ol>
			</div>
		</div>
	</div>
	<!-- Breadcrumbs End -->

	<div class="content">

        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">
				<a href="{{route('branch.index')}}">
					<div class="small-box bg-info">
						<div class="inner text-center">
							<h4>Branches</h4>
							<p>{{Luanardev\Modules\Institution\Entities\Branch::count()}} records</p>        
						</div>                 
					</div>
				</a>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
				<a href="{{route('campus.index')}}" >
					<div class="small-box bg-info">
						<div class="inner text-center">
							<h4>Campuses</h4>
							<p>{{Luanardev\Modules\Institution\Entities\Campus::count()}} records</p>        
						</div>
					</div>
				</a>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
				<a href="{{route('faculty.index')}}">
					<div class="small-box bg-info">
						<div class="inner text-center">
							<h4>Faculties</h4>   
							<p>{{Luanardev\Modules\Institution\Entities\Faculty::count()}} records</p>     
						</div>
					</div>
				</a>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
				<a href="{{route('department.index')}}" >
					<div class="small-box bg-info">
						<div class="inner text-center">
							<h4>Department</h4>
							<p>{{Luanardev\Modules\Institution\Entities\Department::count()}} records</p>        
						</div>
					</div>
				</a>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
				<a href="{{route('section.index')}}">
					<div class="small-box bg-info">
						<div class="inner text-center">
							<h4>Sections</h4> 
							<p>{{Luanardev\Modules\Institution\Entities\Section::count()}} records</p>       
						</div>                  
					</div>
				</a>
            </div>
            
        </div>
	</div>
</div>


@endsection

