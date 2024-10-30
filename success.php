<?php
session_start();


if (!isset($_SESSION['name'], $_SESSION['email'], $_SESSION['phone'], $_SESSION['message'])) {
    header("Location: index.php");
    exit();
}
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$phone = $_SESSION['phone'];
$message = $_SESSION['message'];

session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-200 p-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4">Submission Successful!</h1>
        <p><strong>Name:</strong> <?php echo $name ?></p>
        <p><strong>Email:</strong> <?php echo $email ?></p>
        <p><strong>Phone:</strong> <?php echo $phone ?></p>
        <p><strong>Message:</strong> <?php echo $message; ?></p>
        <?php echo $message; ?></p>
    <a href="index.php" class="inline-flex items-center px-4 py-2 bg-blue-500 text-white font-bold rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-700">Go Back
    </a>    </div>
</body>
</html>
