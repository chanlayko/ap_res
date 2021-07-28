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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div>
                    <form action="/dish/{{ $dish->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                        <div class="form-group">
                            <label for="">Dishes Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $dish->name) }}" placeholder="Enter Your Dish Name">
                        </div>
                        <div class="form-group">
                            <label for="">Categories</label>
                            <select name="category" id="" class="form-control">
                                <option value="{{ old('category') }}">Selection</option>
                               @foreach($category as $cat)
                                <option value="{{$cat->id}}" {{ $cat->id == $dish->category_id ? 'selected':''}}>{{$cat->name}}</option>
                               @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Images</label><br>
                            <img src="/images/{{ $dish->image }}" alt="" with="150px" height="150px">
                            <br><br>
                            <input type="file" name="dish_image"> 
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
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

