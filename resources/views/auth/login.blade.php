<!DOCTYPE html>  
<html lang="en">  

<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Login / Registration</title>  
    <link rel="preconnect" href="https://fonts.googleapis.com">  
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>  
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">  
    <link rel="stylesheet" href="{{ asset('adminassets/css/dataTables.dataTables.min.css') }}">  
    <link rel="stylesheet" href="{{ asset('adminassets/css/main.min.css') }}">  
    <link rel="stylesheet" href="{{ asset('adminassets/css/styles.css') }}">  
</head>  

<body class="registeration-wrapper" style="background-image: linear-gradient(rgba(255, 255, 255, 0.735), rgba(0, 0, 0, 0.5))">  

    <div class="container my-5 bg-white rounded-3">  
        <div class="row">  
            <div class="col-md-5 d-none d-md-block img-wrapper">  
                <img src="{{ asset('adminassets/images/rear-view-young-college-student.jpg') }}" alt="">  
            </div>  
            <div class="col-md-7">  
                <form action="{{ route('login') }}" method="POST" class="text-center h-100 px-3 d-flex flex-column justify-content-center">  
                    @csrf 
                    <h3 class="fw-semibold mb-5">LOGIN FORM</h3>  

                    <!-- Display validation errors -->  
                    @if ($errors->any())  
                        <div class="alert alert-danger">  
                            <ul>  
                                @foreach ($errors->all() as $error)  
                                    <li>{{ $error }}</li>  
                                @endforeach  
                            </ul>  
                        </div>  
                    @endif  

                    <div class="input-group mb-3">  
                        <input type="text" name="username" placeholder="Username" class="form-control" value="{{ old('username') }}" required autofocus>  
                        <img src="{{ asset('adminassets/images/user-svgrepo-com.svg') }}" alt="" class="input-group-text">  
                    </div>  

                    <div class="input-group mb-3">  
                        <input type="password" name="password" placeholder="Password" class="form-control" required autocomplete="current-password">
                        <img src="{{ asset('adminassets/images/password-svgrepo-com.svg') }}" alt="" class="input-group-text">  
                    </div>  

                    <button type="submit" class="btn btn-dark px-5 mb-2">  
                        LOGIN  
                        <img src="{{ asset('adminassets/images/arrow-sm-right-svgrepo-com.svg') }}" alt="">  
                    </button>  
                    <a href="{{ route('register') }}" class="fw-semibold fs-6 text-decoration-none text-dark">New User?</a>  
                </form>  
            </div>  
        </div>  
    </div>  

</body>  

</html>