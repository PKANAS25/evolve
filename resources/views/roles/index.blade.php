@extends('layouts.master') 
 
 @section('plugins')
  <!-- DataTables -->
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<!-- Toastr -->
 <link rel="stylesheet" href="/plugins/toastr/toastr.min.css">
  
 @endsection

 @section('footer-plugins')
   <!-- DataTables -->
<script src="/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- Toastr -->
<script src="/plugins/toastr/toastr.min.js"></script>
<!-- Popup confirmation -->
<script src="/plugins/popper/popper.js"></script>
<script src="/plugins/popper/bootstrap-confirmation.min.js"></script> 


<script>
  $(function () {
     $('#table').DataTable({
      "paging": false, 
      "searching": false, 
    });
  });
// Toastr//
  @if($message = Session::get('success'))
   toastr.options.positionClass = 'toast-top-center';
   toastr.success("{{ $message }}");
  @endif

 //Popper//
 @foreach($roles as $role) 
 $('[data-toggle=confirmation{{ $role->id }}]').confirmation({
  rootSelector: '[data-toggle=confirmation{{ $role->id }}]', 
  onConfirm: function( ) {
    event.preventDefault(); document.getElementById('delete-form{{ $role->id }}').submit();
  }
  }); 
 @endforeach

</script>
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
          <div class="col-12">
            <div class="card">
                <!-- /.card-header -->
              <div class="card-body"> 
               
                <div class="row mb-2">
                  <div class="col-sm-10">&nbsp;</div>
                  <div class="btn-group col-sm-2"><a href="{{ route('users/roles/create') }}" type="button" class="btn btn-block btn-outline-primary">+Add New Role</a></div>
                </div>
 

                <table id="table" class="display compact" style="width: 100%">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Permissions</th> 
                    <th style="width: 15%">Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($roles as $role)
                  <tr>
                    <td>{{ $role->name }}</td> 
                    <td>
                      <ul>
                        @foreach($role->permissions as $permission)
                        <li>
                          {{ $permission->name }}
                        </li>
                        @endforeach
                      </ul>
                    </td>
                    <td>
                      <a title="Edit" href="{{ route('users/roles/edit',['role' => Crypt::encrypt($role->id)]) }}"><i class="fas fa-edit"></i></a>
                       
                      <a style="padding-left:5em" class="text-danger" data-toggle="confirmation{{ $role->id }}" data-title="Are you sure?">
                        <i class="fas fa-trash-alt"></i>
                      </a>

                      <form id="delete-form{{ $role->id }}" action="{{ route('users/roles/delete') }}" method="POST" class="d-none">
                      @csrf
                      <input type="hidden" name="id" value="{{ $role->id }}">
                      <input type="hidden" name="name" value="{{ $role->name }}">
                      </form>
                    </td>
                  </tr>
                  @endforeach 
                  
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection
