<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


    <title>Admin Page</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1>Admin - Login</h1>

            <form>
                <div class="mb-3">
                    <label for="user_id" class="form-label">User ID</label>
                    <input type="text" class="form-control" name="user_id" id="user_id">
                </div>

                <div class="mb-3">
                    <label for="user_name" class="form-label">User Name</label>
                    <input type="text" class="form-control" name="user_name" id="user_name">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" class="form-control" name="password" id="password">
                </div>

                <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown button
                </button>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                    <li><a class="dropdown-item active" href="#">Action</a></li>
                </ul>
                </div><br><br>
    
            
            <button type="submit" class="btn btn-primary">Register</button>
            </form>


        </div>
    </div>
</div>
</body>
</html>