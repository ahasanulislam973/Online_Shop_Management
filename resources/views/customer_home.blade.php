<!DOCTYPE html>
<html>
<head>
    <title>Customer Info</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
</head>
<body>
<h2 class="text-center">Customer Own Info</h2>

@if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{Session::get('success')}}
    </div>
@endif
@if(Session::has('fail'))
    <div class="alert alert-success" role="alert">
        {{Session::get('fail')}}
    </div>
@endif

<div class="container">
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th>Sl</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Action</th>
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
                <td>
                    <button type="button" value="{{$ct->id}}" class="btn btn-primary updatebtn btn-sm">Update</button>
                    |
                    <button type="button" value="{{$ct->id}}" class="btn btn-primary addtocartbtn btn-sm">Add to cart
                    </button>
                    |
                    <a href="{{url('View_Add_to_cart_product',['customerid'=>$ct->id])}}">
                        <button type="button" class="btn btn-primary btn-sm">
                            View Add to cart product
                        </button>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
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
            <form action="{{url('update_customer')}}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="updateid" name="id">
                    <div class="form-group ">
                        <label for="updatename">Name</label>
                        <input type="text" class="form-control" id="updatename" name="name">
                    </div>
                    <div class="form-group ">
                        <label for="updateemail">Email</label>
                        <input type="text" class="form-control" value="" id="updateemail" name="email">
                    </div>
                    <div class="form-group">
                        <label for="updatephone">Phone</label>
                        <input type="text" class="form-control" value="" id="updatephone" name="phone">
                    </div>
                    <div class="form-group ">
                        <label for="updateaddress">Address</label>
                        <textarea class="form-control" id="updateaddress" name="address" rows="3"></textarea>
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

{{--Add to cart Modal--}}
<div class="modal fade " id="addtocartmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">Add to cart</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('add_to_cart')}}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="customerid" name="customerid">


                    <div class="form-group">

                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th>SL</th>
                                <th>name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Image</th>
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
                                             style="height: 100px; width: 150px;">
                                        <button type="submit" value="{{$data->id}}" name="productid"
                                                class="btn btn-success mt-3">Add to Cart
                                        </button>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
{{--Close to cart Modal--}}

{{--view product Modal--}}
<div class="modal fade " id="viewaddtocartproductmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog " role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">Add to cart List</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @csrf
            <div class="modal-body">
                <div class="form-group ">

                    <table class="table">
                        <thead class="thead-dark">

                        <tr>
                            <th>product_id</th>
                            <th>product</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="info">

                        </tbody>

                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="closeviewaddtocardmodel()">Close</button>

            </div>

        </div>
    </div>
</div>
{{--Close view course Modal--}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function () {
        $(document).on('click', '.updatebtn', function () {
            var ct_id = $(this).val();
            $('#updatemodal').modal('show')

            $.ajax({
                method: "GET",
                url: '/edit_customer/' + ct_id,
                success: function (response) {
                    $('#updateid').val(response.customer.id);
                    $('#updatename').val(response.customer.name);
                    $('#updatephone').val(response.customer.phone);
                    $('#updateemail').val(response.customer.email);
                    $('#updateaddress').val(response.customer.address);
                }
            });
        });

        //    Add course
        $(document).on('click', '.addtocartbtn', function () {
            var s_id = $(this).val();
            $('#customerid').val(s_id);
            $('#addtocartmodal').modal('show')

        });

        //    view add to cart product
        $(document).on('click', '.viewaddtocartbtn', function () {
            var id = $(this).val();
            $('#viewaddtocartproductmodal').modal('show')

            $.ajax({
                method: "GET",
                url: '/view_addtocart_product/' + id,
                success: function (response) {
                    $('#coursename_view').val(response.customerproduct);
                    var details = response.customerproduct;
                    $.each(details, function (data) {
                        $("#info").append("<tr>" + "<td>" + response.customerproduct[data].product_id + "</td><td>" + response.customerproduct[data].product.name + "</td>" + "</tr");
                    });
                }
            });
        });

    });

    function closeviewaddtocardmodel() {
        $('#viewaddtocartproductmodal').modal('hide')
        window.location.reload();
    }

</script>
</body>
</html>

