<!DOCTYPE html>
<html>
<head>
    <title>Customer_Product List</title>
    <h4 class="text-center">Customer Product List</h4>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
</head>
<body>

{{--Search--}}
<div class="container">
    <form method="get" action="{{url('view_byproduct')}}">
        <div class="row my-3">

            <div class="col-12">
                <label for="customerid" class="form-label">Customer id</label>
                <input type="text" id="customerid" class="form-control"
                       value="<?php echo isset($_GET['customerid']) ? $_GET['customerid'] : ''; ?>" placeholder="Customer id"
                       name="customerid">
            </div>

            <div class="col-12 text-right mt-3">
                <button type="submit" class="btn btn-primary">Search</button>
                <a href="{{'view_byproduct'}}" class="btn btn-danger" role="button"
                   aria-pressed="true">Clear</a>
            </div>
        </div>
    </form>
</div>

{{--close search--}}

<div class="container">
<table class="table">
    <thead class="thead-dark">

    <tr>

        <th>Sl</th>
        <th>Product Name</th>
        <th>Image</th>
        <th>Customer id</th>
    </tr>
    </thead>
    @php
        $i=1;
    @endphp

    <tbody>
    @foreach($customer_product as $customer)
        <tr>

            <td>{{$i++}}</td>
            <td>{{$customer->product->name}}</td>
            <td>
                <img src="{{ url('public/image/'.$customer->product->image) }}"
                     style="height: 100px; width: 150px;" alt="image">
            </td>
            <td>
                {{$customer->customer_id}}
            </td>


        </tr>
    @endforeach
    </tbody>
</table>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>
</body>
</html>

