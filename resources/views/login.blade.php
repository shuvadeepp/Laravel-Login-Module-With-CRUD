<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .error{
            color:red;
        }
    </style>

    <title>Login Page</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1>User - Login</h1>


            <!-- status -->
            @if ($errors->any())
            <div class="alert alert-danger">
               <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
               </ul>
            </div>
            @endif
            <!-- status -->

            
            <form method="POST" action="/login" name="loginFrm" id="loginFrm">
                @csrf
                <div class="mb-3">
                    <label for="user_id" class="form-label">User Name</label>
                    <input type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" id="user_name" require>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" class="form-control @error('password') is-invalid @enderror" name="password" id="password" require>
                </div>
    
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
    
jQuery('#loginFrm').validate({

    rules: {

        user_name: "required",

        password: {

            required: true,
            maxlength: 10,
            minlength: 6

        },

    }, messages: {

        username: "please enter your user name",

        password: {

            required: "please enter your password",
            maxlength: "Password much be 10 charecters",
            minlength: "Password much be 6 charecters",

        }

    }

});


</script>
</html>