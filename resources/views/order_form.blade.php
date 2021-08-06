<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
            <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Tabs Custom Content Examples
            </h3>
          </div>
          <div>
            @if (session('massage'))
                <div class="alert alert-success">
                    {{ session('massage') }}
                </div>
            @endif
          </div>
          <div class="card-body">
            <h4>Custom Content Below</h4>
            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">New Order</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Order List</a>
              </li>
            </ul>
            <div class="tab-content" id="custom-content-below-tabContent">
              <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                <form action="{{route('order.submit')}}" method="post">
                    @csrf
                    <div class="row">
                    @foreach($dishes as $dish)
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body">
                                <img src="images/{{$dish->image}}" alt="" width="100px" height="100px">
                                <label for="">{{$dish->name}}</label><br>
                                <input type="number" name="{{$dish->id}}" id="" class="mt-2">
                            </div>
                        </div>
                    </div>
                    @endforeach
                  </div>
                  <div class="form-group">
                      <select name="table" id="" class="form-control col-sm-2">
                          @foreach($tables as $table)
                            <option value="{{$table->id}}">{{$table->number}}</option>
                          @endforeach
                      </select>
                  </div>
                  <div>
                      <input type="submit" class="btn btn-primary" value="Submit">
                  </div>
                </form>
              </div>
              <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Dish Name</th>
                      <th>Table Number</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($orders as $order)
                    <tr>
                      <td>{{$order->dish->name}}</td>
                      <td>{{$order->table_id}}</td>
                      <td>{{$status[$order->status]}}</td>
                      <td>
                        <div class="form-row">
                          <a href="order/{{$order->id}}/serve" class="btn btn-success" style="height:40px;margin-right:10px;">Serve</a>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="tab-custom-content">
              <p class="lead mb-0">Custom Content goes here</p>
            </div>
          </div>
          <!-- /.card -->
        </div>
            </div>
        </div>
    </div>
</body>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</html>