


<div class="container-fluid">
<main class="tm-main">
<?php
    
    require_once("header.php");
    // Redirect if not logged in
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }

    // Get current user details
    $user_id = $_SESSION['user_id'];
    $query = "SELECT * FROM users WHERE id = $1";
    $result = pg_query_params($conn, $query, array($user_id));
    $user = pg_fetch_assoc($result);

    // Handle profile update
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = htmlspecialchars($_POST['username']);
        $full_name = htmlspecialchars($_POST['full_name']);
        $email = htmlspecialchars($_POST['email']);

        $updateQuery = "UPDATE users SET username = $1, full_name = $2, email = $3 WHERE id = $4";
        $updateResult = pg_query_params($conn, $updateQuery, array($username, $full_name, $email, $user_id));

        if ($updateResult) {
            $_SESSION['success'] = "Profile updated successfully.";
            header("Location: profile.php");
            exit();
        } else {
            $_SESSION['error'] = "Error updating profile: " . pg_last_error($conn);
        }
    }
?>
<div class="register-form">
  <h2 class="text-center mb-4">Your Profile</h2>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <div class="row">
    <div class="mb-3 col-12 text-center">
    
    
    <!-- Show existing image -->
    <img src="<?= $user['profile'] ?: 'img/comment-1.jpg' ?>" 
         alt="Profile" 
         class="rounded-circle mb-2" 
         style="width: 120px; height: 120px; object-fit: cover;" 
         id="preview-img">

    <label for="profile" class="form-label d-block">Profile Image</label>
    <input type="file" class="form-control mt-2" name="profile" id="profile" accept="image/*" onchange="previewImage(event)">
</div>
        <div class="mb-3 col-md-6">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="name" name="full_name" required>
        </div>
        <div class="mb-3 col-md-6">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3 col-md-6">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>

        <button type="submit" class=" w-100 tm-btn tm-btn-primary">Update</button>

        <div class="mb-3 col-12 Mt-5">
            <h2 class="text-center mb-4">Change Password</h2>
        </div>
        <div class="mb-3 col-md-6">
            <label for="password" class="form-label">Old Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3 col-md-6">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3 col-md-6">
            <label for="confirm-password" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="confirm-password" name="confirm_password" required>
        </div>
        <button type="submit" class=" w-100 tm-btn tm-btn-primary">Update</button>

    </div>
    
  </form>
  <p class="text-center mt-3">
    Already have an account? <a href="login.php">Login</a>
  </p>
</div>
</main>
</div>
<?php require_once("footer.php");?>