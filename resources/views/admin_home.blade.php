<!DOCTYPE html>
<html>
<head>
    <title>Online Shop Management</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
</head>
<body>
<h2 class="text-center">Online Shop Management</h2>
@if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{Session::get('success')}}
    </div>
@endif
<div class="container">
    <div class="col-12 text-left mt-3">
        <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#addproductmodal">
            Add Product
        </button>

        <a href="{{url('view_byproduct')}}">
            <button type="button" class="btn btn-primary  text-right">
                View buy products
            </button>
        </a>

        <a href="{{url('view_product_list')}}">
            <button type="button" class="btn btn-primary  text-right">
                View product list
            </button>
        </a>
    </div>
</div>
{{--Search--}}
<div class="container">
    <form method="get" action="{{url('admin')}}">
        <div class="row my-3">
            <div class="col-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" class="form-control"
                       value="<?php echo isset($_GET['name']) ? $_GET['name'] : ''; ?>" placeholder="Name"
                       name="name">
            </div>
            <div class="col-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" id="email" class="form-control"
                       value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?>" placeholder="Email"
                       name="email">
            </div>
            <div class="col-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" id="phone" class="form-control" placeholder="Phone"
                       value="<?php echo isset($_GET['phone']) ? $_GET['phone'] : ''; ?>" name="phone">
            </div>
            <div class="col-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" id="address" class="form-control" placeholder="Address"
                       value="<?php echo isset($_GET['address']) ? $_GET['address'] : ''; ?>" name="address">
            </div>
            <div class="col-12 text-right mt-3">
                <button type="submit" class="btn btn-primary">Search</button>
                <a href="{{'admin'}}" class="btn btn-danger" role="button"
                   aria-pressed="true">Clear</a>
            </div>
        </div>
    </form>
</div>

<h4 class="text-center">Customer List</h4>
<div class="container">
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th>Sl</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>

        </tr>
        </thead>
        @php
            $i=1;
        @endphp
        <tbody>
        @foreach($customer as $ct)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$ct->name}}</td>
                <td>{{$ct->email}}</td>
                <td>{{$ct->phone}}</td>
                <td>{{$ct->address}}</td>

            </tr>
        @endforeach
        </tbody>


    </table>
</div>
{{-- Add Product Modal--}}
<div class="modal fade " id="addproductmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('add_product')}}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" id="addstuid" name="id">
                    @csrf
                    <div class="form-group">
                        <label for="productname">Name</label>
                        <input type="text" id="productname" class="form-control" name="productname"/>

                    </div>
                    <div class="form-group">
                        <label for="productprice">Price</label>
                        <input type="text" id="productprice" class="form-control" name="productprice"/>

                    </div>
                    <div class="form-group">
                        <label for="productquantity">Quantity</label>
                        <input type="text" id="productquantity" class="form-control" name="productquantity"/>

                    </div>

                    <div class="image">
                        <label for="image">Add image</label>
                        <input type="file" class="form-control" required name="image" id="image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>

                </div>
            </form>
        </div>
    </div>
</div>

{{--Close Add Product Modal--}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>
</body>
</html>
