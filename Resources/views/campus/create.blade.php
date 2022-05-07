@extends('institution::layouts.app')

@section('content')
<div class="container-fluid">
  
  <div class="content-header">
      
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4 class="m-0">Create Campus</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('institution') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('campus.index') }}">Campuses</a></li>
            <li class="breadcrumb-item active">Create</li>
          </ol>
        </div>
      </div>
    
  </div>

  <div class="content">
 
    <div class="row">
      <div class="col-12">
        <x-adminlte-validation />
        <div class="card">
          <div class="card-body">
            <form action="{{route('campus.store')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Code</label>
                  <input  type="text" name="code" placeholder="Enter code" class="form-control" value="{{old('code')}}">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Name</label>
                    <input  type="text" name="name" placeholder="Enter name" class="form-control" value="{{old('name')}}">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label">Branch</label>
                      <select class="form-control select2" name="branch">
                        @foreach(Luanardev\Modules\Institution\Entities\Branch::all() as $branch)
                        <option value="{{$branch->id}}">{{$branch->name}}</option>
                        @endforeach
                      </select>
                  </div>
                </div>
              </div>

              <hr>
              <button type="submit" class="btn btn-primary" title="Create"><span class="d-xs-inline d-sm-none d-md-none d-lg-none"><i class="fas fa-check-circle"></i></span><span class="d-none d-xs-none d-sm-inline d-md-inline d-lg-inline"> Create</span></button>
              <button type="button" onclick="window.location.href='{{route('campus.index')}}'" class="btn btn-default" title="Cancel"><span class="d-xs-inline d-sm-none d-md-none d-lg-none"><i class="fas fa-window-close"></i></span><span class="d-none d-xs-none d-sm-inline d-md-inline d-lg-inline"> Cancel</span></button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Main Content End -->
@endsection
