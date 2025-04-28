
<?php
    require_once("header.php");
?>


  <style>
   
    .register-form {
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
      width: 100%;
      /* max-width: 400px; */
    }
    .form-control:focus {
      box-shadow: none;
      border-color: #6c63ff;
    }
    .btn-primary {
      background-color: #6c63ff;
      border-color: #6c63ff;
    }
    .btn-primary:hover {
      background-color: #5a54d1;
      border-color: #5a54d1;
    }
  </style>
<div class="container-fluid">
<main class="tm-main">
<div class="register-form">
  <h2 class="text-center mb-4">Create Account</h2>
  <form action="/register" method="POST">
    <div class="row">
        
        <div class="mb-3 col-md-6">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3 col-md-6">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3 col-md-6">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3 col-md-6">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3 col-md-6">
            <label for="confirm-password" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="confirm-password" name="confirm_password" required>
        </div>
        <button type="submit" class=" w-100 tm-btn tm-btn-primary">Register</button>

    </div>
    
  </form>
  <p class="text-center mt-3">
    Already have an account? <a href="/login">Login</a>
  </p>
</div>
</main>
</div>
<?php require_once("footer.php");?>