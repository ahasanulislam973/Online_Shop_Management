<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign in</title>
    <link rel="stylesheet" href="{{asset('/css/bootstrap.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('/css/custom.css')}}" type="text/css">

</head>
<body class="text-center">

<main class="form-signin w-100 m-auto">
    <form action="{{url('login')}}" method="post">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
        @if(Session::has('fail'))
            <div class="alert alert-success bg-danger text-white" role="alert">
                {{Session::get('fail')}}
            </div>
            @endif
        </div>
        @csrf
        <div class="form-floating">
            <input type="text" class="form-control" name="username" id="username" placeholder="name@example.com">
            <label for="username">User Name</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            <label for="password">Password</label>
        </div>

        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        <a href="{{url('sign_up')}}">Do not registered? Sign Up</a>
        <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
    </form>
</main>
</body>
</html>
