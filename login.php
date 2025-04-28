


<div class="container-fluid">
<main class="tm-main">
<?php
    require_once("config.php");
    require_once("header.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Get form data safely
      $username = htmlspecialchars($_POST['username']);
      $full_name = htmlspecialchars($_POST['full_name']);
      $email = htmlspecialchars($_POST['email']);
      $profile = null;
      $password_plain = $_POST['password'];
  
      // First, check if the email already exists
      $checkQuery = "SELECT * FROM users WHERE email = $1";
      $checkResult = pg_query_params($conn, $checkQuery, array($email));
  
      if (pg_num_rows($checkResult) > 0) {
          $_SESSION['error'] = "Email already registered. Please use a different email.";
      } else {
          $password_hashed = password_hash($password_plain, PASSWORD_DEFAULT);
  
          $insertQuery = "INSERT INTO users (username, password, full_name, email, profile) 
                          VALUES ($1, $2, $3, $4, $5)";
          $insertResult = pg_query_params($conn, $insertQuery, array($username, $password_hashed, $full_name, $email, $profile));
  
          if ($insertResult) {
              $_SESSION['success'] = "Registration successful!";
              
          } else {
              $_SESSION['error'] = "Error: " . pg_last_error($conn);
          }
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
    Already have an account? <a href="/login">Login</a>
  </p>
</div>
</main>
</div>
<?php require_once("footer.php");?>