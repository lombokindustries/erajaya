@extends('admin.layout')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active">Edit User</li>
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
        <form id="quickForm" action="{{ url('admin/sa/update/'.$u->id) }}" method="POST">
              @csrf
        <div class="row">
          <div class="col-6">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Edit User</small></h3>
                <a href="{{ url('admin/user/home') }}" class="btn btn-danger btn-xs" style="position:absolute;right:10px;top:8px;color:#fff;">Discard</a>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class="card-body">
                  <div class="form-group">
                  <label for="fullName">First Name</label>
                  <input type="text" name="firstname" value="{{ $u->firstname }}" class="form-control @error('email') is-invalid @enderror" placeholder="Your First Name" autofocus>

                  @error('firstname')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="userName">Last Name</label>
                  <input type="text" name="lastname" value="{{ $u->lastname }}" class="form-control @error('email') is-invalid @enderror" placeholder="Your Last Name">

                  @error('lastname')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="alamatTitle">HP/WA</label>
                  <input type="text" name="hp" maxlength="14" value="{{ $u->hp }}" class="form-control @error('email') is-invalid @enderror" placeholder="08123456789">

                  @error('hp')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="alamatTitle">Email</label>
                  <input type="email" name="email" value="{{ $u->email }}" class="form-control @error('email') is-invalid @enderror" placeholder="youremail@mail.com">

                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="alamatTitle">Password</label>
                  <input type="password" name="password" class="form-control @error('email') is-invalid @enderror" placeholder="*******">

                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="alamatTitle">Role</label>
                  <select class="form-control select2 @error('role') is-invalid @enderror" name="role">
                    <option value="sa" {{ $u->role == "sa" ? "selected" : "" }}>Super Admin</option>
                  </select>

                  @error('role')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="alamatTitle">Status</label>
                  <select class="form-control" name="status">
                    <option value="vr" {{ $u->status == "vr" ? "selected" : "" }}>Verified</option>
                  </select>
                </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary w-100">Simpan</button>
                </div>
              </div>
              <!-- /.card -->

          </div>
          <!-- ./col -->
          
        </div>
        <!-- /.row -->
        </form>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

  @endsection