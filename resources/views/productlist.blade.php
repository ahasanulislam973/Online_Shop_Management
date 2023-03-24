<!DOCTYPE html>
<html>
<head>
    <title>Customer Info</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
</head>
<body>

<div class="row">
    <div class="col-12">
        <center>
            <div class="container">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-30" src="/public/image/mango.jpg" alt="First image">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-30" src="/public/image/banana.jpg" alt="Second image">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-30" src="/public/image/poteto.webp" alt="Third image">
                        </div>
                    </div>
                    <a class="carousel-control-prev " href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </center>
    </div>
</div>
<h2 class="text-center">Product List</h2>
@if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{Session::get('success')}}
    </div>
@endif

{{--Search--}}
<form method="get" action="{{url('view_product_list')}}">

    <div class="container">
        <div class="row my-3">
            <div class="col-4">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" class="form-control"
                       value="<?php echo isset($_GET['name']) ? $_GET['name'] : ''; ?>" placeholder="Name"
                       name="name">
            </div>
            <div class="col-4">
                <label for="price" class="form-label">Price</label>
                <input type="text" id="price" class="form-control"
                       value="<?php echo isset($_GET['price']) ? $_GET['price'] : ''; ?>" placeholder="Price"
                       name="price">
            </div>
            <div class="col-4">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="text" id="quantity" class="form-control" placeholder="quantity"
                       value="<?php echo isset($_GET['quantity']) ? $_GET['quantity'] : ''; ?>" name="quantity">
            </div>
            <div class="text">
            </div>
            <div class="col-12 text-right mt-3">
                <button type="submit" class="btn btn-primary">Search</button>
                <a href="{{'view_product_list'}}" class="btn btn-danger" role="button"
                   aria-pressed="true">Clear</a>
            </div>
        </div>
    </div>
</form>

<div class="container">
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th>SL</th>
            <th>name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        </thead>
        @php
            $i=1;
        @endphp
        <tbody>
        @foreach($products as $data)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->price}}</td>
                <td>{{$data->quantity}}</td>
                <td>
                    <img src="{{ url('public/image/'.$data->image) }}"
                         style="height: 100px; width: 150px;" alt="image">
                </td>

                <td>
                    <button type="button" value="{{$data->id}}" class="btn btn-primary updatebtn btn-sm">Update</button>
                    |
                    <button type="button" value="{{$data->id}}" class="btn btn-danger deletebtn btn-sm">Delete
                    </button>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
</div>

{{--Delete product Modal--}}
<div class="modal fade " id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="stu_id" id="stu_id"/>
                <h5>Are you sure to Delete?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="deleteproduct()">Delete</button>
                <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                <input type="hidden" id="deleteid">
            </div>
        </div>
    </div>
</div>
{{--Close Delete Modal--}}

{{--Update Modal--}}
<div class="modal fade " id="updatemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog " role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">Update</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('update_product')}}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="updateid" name="id">
                    <div class="form-group ">
                        <label for="updatename">Name</label>
                        <input type="text" class="form-control" id="updatename" name="name">
                    </div>
                    <div class="form-group ">
                        <label for="updateprice">Price</label>
                        <input type="text" class="form-control" value="" id="updateprice" name="price">
                    </div>
                    <div class="form-group">
                        <label for="updatquantity">Quantity</label>
                        <input type="text" class="form-control" value="" id="updatquantity" name="quantity">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                </div>
            </form>
        </div>
    </div>
</div>
{{--Close Update Modal--}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function () {
//Delete
        $(document).on('click', '.deletebtn', function () {
            var p_id = $(this).val();
            $('#deleteid').val(p_id);
            $('#deletemodal').modal('show')

        });

        //    UPDATE

        $(document).on('click', '.updatebtn', function () {
            var product_id = $(this).val();
            $('#updatemodal').modal('show')

            $.ajax({
                method: "GET",
                url: '/edit_product/' + product_id,
                success: function (response) {
                    $('#updateid').val(response.product.id);
                    $('#updatename').val(response.product.name);
                    $('#updateprice').val(response.product.price);
                    $('#updatquantity').val(response.product.quantity);

                }
            });
        });

    });


    function deleteproduct() {
        var hiddendata = $('#deleteid').val();
        $.ajax({
            method: "GET",
            url: '/delete_product/' + hiddendata,
            success: function (response) {

                $('#deletemodal').modal('hide');
                window.location.reload();
            }
        });
    }
</script>


</body>
</html>
