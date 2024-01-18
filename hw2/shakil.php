<!DOCTYPE html>
<html>
<head>
    <title>Form Validation</title>
</head>
<body>

<?php
$errors = []; // Array to store validation errors

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    $name = $_POST['name'];
    if (empty($name)) {
        $errors['name'] = "Name is required";
    }

    // Validate email
    $email = $_POST['email'];
    if (empty($email)) {
        $errors['email'] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format";
    }

    // Validate message
    $message = $_POST['message'];
    if (empty($message)) {
        $errors['message'] = "Message is required";
    }
}

?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="name">Name:</label>
    <input type="text" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>">
    <span style="color: red;"><?php echo isset($errors['name']) ? $errors['name'] : ''; ?></span><br><br>

    <label for="email">Email:</label>
    <input type="text" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
    <span style="color: red;"><?php echo isset($errors['email']) ? $errors['email'] : ''; ?></span><br><br>

    <label for="message">Message:</label>
    <textarea name="message"><?php echo isset($_POST['message']) ? $_POST['message'] : ''; ?></textarea>
    <span style="color: red;"><?php echo isset($errors['message']) ? $errors['message'] : ''; ?></span><br><br>

    <input type="submit" value="Submit">
</form>

</body>
</html>
