<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign up</title>
    <link rel="stylesheet" href="{{asset('/css/bootstrap.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('/css/custom.css')}}" type="text/css">

</head>
<body class="text-center">

<main class="form-signin w-100 m-auto">
    <form action="{{url('save_customer')}}" method="post">
        <h1 class="h3 mb-3 fw-normal">Please sign up</h1>
        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
            </div>
            @endif
            </div>
            @csrf
            <div class="form-floating">
                <input type="text" class="form-control" name="name" id="name" placeholder="name">
                <label for="username"> Name</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" name="email" id="email" placeholder="email">
                <label for="email">email</label>
            </div>

            <div class="form-floating">
                <input type="text" class="form-control" name="phone" id="phone" placeholder="phone">
                <label for="phone">phone</label>
            </div>

            <div class="form-floating">
                <input type="text" class="form-control" name="address" id="address" placeholder="address">
                <label for="address">address</label>
            </div>

            <div class="form-floating">
                <input type="text" class="form-control" name="username" id="username" placeholder="username">
                <label for="usrname">username</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" name="password" id="password" placeholder="password">
                <label for="password">password</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
            <a href="{{url('customer')}}">Login</a>
            <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
    </form>
</main>
</body>
</html>

