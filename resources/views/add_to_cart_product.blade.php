<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
</head>
<body>
@if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{Session::get('success')}}
    </div>
@endif

<div class="container">
    <h4 class="text-center">Add to cart product</h4>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th>Sl</th>
            <th>product</th>
            <th>image</th>
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
                <td>{{$data->product->name}}</td>
                <td>
                    <img src="{{ url('public/image/'.$data->product->image) }}"
                         style="height: 100px; width: 150px;" alt="image">
                </td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm" value="{{$data->customer_id}}"
                            data-value1="{{$data->product_id}}" onclick="deletevalue(this)">Delete
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
                <input type="hidden" name="customer_id" id="customer_id"/>
                <input type="hidden" name="product_id" id="product_id"/>
                <h5>Are you sure to Delete?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="deleteproduct()">Delete</button>
                <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
{{--Close Delete Modal--}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>

<script>

    function deletevalue(_delete) {
        var customerid = _delete.value;
        var productid = _delete.dataset.value1;

        $('#customer_id').val(customerid);
        $('#product_id').val(productid);
        $('#deletemodal').modal('show')

    }

    function deleteproduct() {
        var customerid = $('#customer_id').val();
        var productid = $('#product_id').val();
        $.ajax({
            method: "GET",
            data: {
                customerid: customerid,
                productid: productid,
            },
            url: '/delete_cart_product/',
            success: function (response) {

                console.log(response);
                $('#deletemodal').modal('hide');
                window.location.reload();
            }
        });
    }

</script>


</body>
</html>
