@extends('admin.layout')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">

        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Master Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active">Master Users</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Master Users</h3> 
                <a href="{{ url('admin/user/create') }}" class="btn btn-primary btn-xs" style="position:absolute;right:10px;top:8px;">Add New</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="datatablex" class="table display datatables responsive table-bordered table-striped nowrap">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>First Nama</th>
                    <th>Last Name</th>
                    <th>HP/WA</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($u as $ku => $vu)
                  <tr>
                    <th>{{ $ku+1 }}</th>
                    <td>{{ $vu->firstname }}</td>
                    <td>{{ $vu->lastname }}</td>
                    <td>{{ $vu->hp }}</td>
                    <td>{{ $vu->email }}</td>
                    <td>{{ $vu->role == "sa" ? "Super Admin" : "User" }}</td>
                    <td>{{ $vu->status == "vr" ? "Verified" : "Unverified" }}</td>
                    <td><a href="{{ url('admin/user/edit/'.$vu->id) }}" class="btn btn-block btn-warning btn-sm d-inline"><i class="fas fa-edit right"></i></a> | 
                      <a href="{{ url('admin/user/delete/'.$vu->id) }}" class="btn btn-block btn-danger btn-sm d-inline"  onclick="return confirm('Yakin mau hapus user ini?')"><i class="fas fa-trash right"></i></a>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- ./col -->
          
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

  @endsection