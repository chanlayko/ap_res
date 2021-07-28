@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Kitchen Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
              @if (session('massage'))
                  <div class="alert alert-success">
                      {{ session('massage') }}
                  </div>
              @endif
                <div style="float:right">
                  <a href="/dish/create" class="btn btn-success">Create New Dish</a>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Dish Name</th>
                      <th>Category Name</th>
                      <th>Create</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($dishes as $dish)
                    <tr>
                      <td>{{$dish->name}}</td>
                      <td>{{$dish->category->name}}</td>
                      <td>{{$dish->created_at}}</td>
                      <td>
                        <div class="form-row">
                          <a href="/dish/{{ $dish->id }}" class="btn btn-warning" style="height:40px;margin-right:10px;">View</a>
                          <form action="/dish/{{ $dish->id }}" method='POST'>
                          @csrf
                          @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');" >Delete</button>
                          </form>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection