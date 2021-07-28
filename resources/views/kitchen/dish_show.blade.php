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
                <div style="float:right">
                  <a href="/dish" class="btn btn-success">Black To Dish</a>
                </div>
                <br>
                <div>
                    <form action="/dish" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label for="">Dishes Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $dish->name }}">
                        </div>
                        <div class="form-group">
                            <label for="">Categories</label>
                            <input type="text" value="{{ $dish->category->name}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Images</label><br>
                            <img src="/images/{{ $dish->image}}" alt="" with="150px" height="150px">
                        </div>
                        <div class="form-group">
                            <a href="/dish/{{ $dish->id }}/edit" class="btn btn-warning">Edit Dish</a>
                        </div>
                    </form>  
                    <form action="/dish/{{ $dish->id }}" method="post">
                    @csrf
                    @method('DELETE')
                      <button type="submit" class="btn btn-danger">Delete Dish</button>
                    </form> 
                </div>
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

