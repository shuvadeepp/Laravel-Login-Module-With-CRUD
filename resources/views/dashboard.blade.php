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

      <title>Admin Page</title>
   </head>
   <body>
      <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-6">
            <h1>Admin - Dashboard</h1>
            <h4>Welcome Admin - {{session()->get('user_name')}}</h4>
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
            <form method="post" id="frmRegister">
               @csrf
               <input type="hidden" class="form-control" name="_hidden" id="_hidden">

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
                  <select class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" name="user_role_id" id="user_role_id">
                     <option hidden>--SELECT--</option>
                     @foreach ($dropQuery as $viewAll)
                     <option value="{{$viewAll->user_role_id}}">{{$viewAll->user_role}}</option>
                     @endforeach
                  </select>
                  <button type="submit" class="btn btn-success">Submit</button>
                  <a href="/logout" class="btn btn-danger">Logout</a>
            </form>
            </div>
         </div>
         <!-- Table -->
         <table class="table">
            <thead>
               <tr>
                  <th scope="col">#</th>
                  <th scope="col">UserID</th>
                  <th scope="col">Password</th>
                  <th scope="col">User Name</th>
                  <th scope="col">User Role</th>
                  <th scope="col">Action</th>
               </tr>
            </thead>
            <tbody>
               @php
               $i=0;  
               @endphp
               @foreach ($viewQeury as $viewAll)
               <tr>
                  <th scope="row">{{ ++$i }}</th>
                  <td>{{ $viewAll->user_id }}</td>
                  <td>{{ $viewAll->password }}</td>
                  <td>{{ $viewAll->user_name }}</td>
                  <td>{{ $viewAll->user_role_id }}</td>
                  <td>
                     
                     <button type="button" class="btn btn-success" onclick="viewOn('<?php echo $viewAll->id;?>','<?php echo $viewAll->user_id;?>','<?php echo $viewAll->password;?>','<?php echo $viewAll->user_name;?>','<?php echo $viewAll->user_role_id;?>')">EDIT</button>
                     
                     <a href = "delete/{{ $viewAll->id }}"><button type="button" class="btn btn-danger">DELETE</button></a>

                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>
         <!-- Table -->
      </div>
   </body>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script type="text/javascript">
    
    function viewOn(id ,user_id, password, user_name, user_role_id)
    {
    // alert(user_id);return false;
    $('#_hidden').val(id);
    $('#user_id').val(user_id);
    $('#password').val(password);
    $('#user_name').val(user_name);
    $('#user_role_id').val(user_role_id);
    }
    </script>

<script>
    
    jQuery('#frmRegister').validate({
    
        rules: {
    
            user_id: "required",
            user_name: "required",

            password: {
    
                required: true,
                maxlength: 10,
                minlength: 6

            },

            user_role_id: "required",
    
    
        }, messages: {
    
            user_id: "please enter your user user id",
            username: "please enter your user name",

            
            password: {
    
                required: "please enter your password",
                maxlength: "Password much be 10 charecters",
                minlength: "Password much be 6 charecters",

            },

            user_role_id: "please enter your user user role id",
    
        }
    
    });
    
    
    </script>
</html>