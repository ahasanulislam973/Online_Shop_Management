<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
</head>
    <body>

<div class="container">
    <form method="post" action="{{ url('store_image') }}"
          enctype="multipart/form-data">
        @csrf
        <div class="image">
            <label><h4>Add image</h4></label>
            <input type="file" class="form-control" required name="image">
        </div>

        <div class="post_button">
            <button type="submit" class="btn btn-success">Add</button>
        </div>
    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>
</body>
</html>
