


<div class="container-fluid">
<main class="tm-main">
<?php
   
    require_once("header.php");
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = trim($_POST['email']);
        $password_input = $_POST['password'];

        // Query the user with parameterized query
        $result = pg_query_params($conn, "SELECT * FROM users WHERE email = $1", [$email]);

        if ($result && pg_num_rows($result) === 1) {
            $user = pg_fetch_assoc($result);
            $hashed_password = $user['password'];

            // Verify the password
            if (password_verify($password_input, $hashed_password)) {
                $_SESSION['user'] = $user;
                $_SESSION['user_id'] = $user['id'];
               
                $_SESSION['success'] = "Login successful. Welcome, " . htmlspecialchars($user['full_name']) . "!";
                header("Location: index.php"); // Redirect to the main page after successful login
            } else {
                $_SESSION['error'] ="Invalid email or password.";
            }
        } else {
            $_SESSION['error'] ="Invalid email or password.";
        }
    }


?>
<div class="register-form">
  <h2 class="text-center mb-4">Login Acount</h2>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <div class="row">
        
        
        <div class="mb-3 col-md-6 offset-md-3 col-12">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
       
        <div class="mb-3 col-md-6  offset-md-3 col-12">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3 col-md-6  offset-md-3 col-12">
            <button type="submit" class=" w-100 tm-btn tm-btn-primary">Login</button>
        </div>
       

    </div>
    
  </form>
  <p class="text-center mt-3">
    Already have an account? <a href="register.php">Register</a>
  </p>
</div>
</main>
</div>
<?php require_once("footer.php");?>