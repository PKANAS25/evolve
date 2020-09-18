@extends('layouts.master') 
 
 @section('plugins')
  
  
 @endsection

 @section('footer-plugins')
   
 @endsection

 @section('body')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('layouts.content-header')

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
           
          <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Add new role</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @foreach ($errors->all() as $error)
                                    <p class="alert alert-danger">{{ $error }}</p>
                                @endforeach
                <form class="form-horizontal" action="{{ route('users/role/store') }}" method="post">
                  @csrf
                   <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input type="name" class="form-control" id="name" name="name" placeholder="Role title" value="{{ old('name') }}" required="required">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Permissions</label>
                    <div class="col-sm-10">
                      @foreach($permissions as $permission)
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->id }}">
                          <label class="form-check-label">{{ $permission->name }}</label>
                        </div>
                       @endforeach
                    </div>
                  </div> 

                  <div class="row mb-2">
                  <div class="col-sm-10"><button type="submit" class="btn btn-primary">Save</button></div>
                  <div class="col-sm-2"><a href="{{ route('users/roles') }}"><i class="fas fa-arrow-circle-left"></i> Back to Roles</a></div>
                </div>

                  
                  </form>
              </div>
              <!-- /.card-body -->
             
            </div>
            <!-- /.card -->
            
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection
