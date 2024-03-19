<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<?php
session_start(); // Start PHP session

// Check if the user is already logged in, redirect to dashboard if true
if(isset($_SESSION['username'])) {
    header("location: dashboard.php");
    exit;
}

// Check if the form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check username and password
    $username = "your_username"; // Replace with your actual username
    $password = "your_password"; // Replace with your actual password

    // Check if username and password match
    if($_POST['username'] == $username && $_POST['password'] == $password) {
        // Store username in session variable
        $_SESSION['username'] = $username;
        
        // Redirect to dashboard
        header("location: dashboard.php");
    } else {
        // Display error message
        echo "Invalid username or password.";
    }
}
?>

<h2>Login</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <div>
        <button type="submit">Login</button>
    </div>
</form>

</body>
</html>
