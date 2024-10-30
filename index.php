<?php
session_start();
define('COOKIE_EXPIRY', 30 * 24 * 60 * 60); 

function clean_input($data) {
    $data = trim($data);
    $data = strip_tags($data);
    $data = htmlspecialchars($data);
    return $data;
}

function validate_input(&$errors) {
    global $remember_me;
    $name = clean_input($_POST['name']);
    $email = clean_input($_POST['email']);
    $phone = clean_input($_POST['phone']);
    $message = clean_input($_POST['message']);

    
    if (empty($name)) {
        $errors['name'] = "Name is required.";
    }
    
    if (empty($email)) {
        $errors['email'] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    }
    
    if (empty($phone)) {
        $errors['phone'] = "Phone number is required.";
    } elseif (!preg_match('/^[0-9]{10}$/', $phone)) {
        $errors['phone'] = "Phone number must be 10 digits.";
    }
    
    if (empty($message)) {
        $errors['message'] = "Message is required.";
    }elseif (strlen($message) < 10) {
        $errors['message'] = "Message must be at least 10 characters.";
    }
    
    if (empty($errors)) {
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['phone'] = $phone;
        $_SESSION['message'] = $message;

        if ($remember_me) {
            setcookie("email", $email, time() + COOKIE_EXPIRY, "/"); // Set email cookie
        } else {
            setcookie("email", "", time() - 3600, "/"); // Clear cookie if "Remember Me" is not checked
        }
        header("Location: success.php");
        exit();
    }
}

$errors = [];
$remember_me = isset($_POST['remember_me']);

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    validate_input($errors);
}
$email_value = isset($_COOKIE['email']) ? $_COOKIE['email'] : ($_POST['email'] ?? '');

// if (!empty($errors)) {
//     echo '<ul>';
//     foreach ($errors as $field => $error) {
//         echo "<li>Error in $field: $error</li>";
//     }
//     echo '</ul>';
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200 p-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4">Contact Information:</h1>
        <form action="index.php" method="post">
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>" class="mt-1 block w-full border-solid border-2 border-gray-500 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <p class="text-red-500 text-sm mt-1"><?php echo $errors['name'] ?? ''; ?></p>
            </div>
            
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" class="mt-1 block w-full border-solid border-2 border-gray-500 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <p class="text-red-500 text-sm mt-1"><?php echo $errors['email'] ?? ''; ?></p>
            </div>
            
            <div class="mb-4">
                <label for="phone" class="block text-gray-700">Phone:</label>
                <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($_POST['phone'] ?? ''); ?>" class="mt-1 block w-full border-solid border-2 border-gray-500 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <p class="text-red-500 text-sm mt-1"><?php echo $errors['phone'] ?? ''; ?></p>
            </div>
            
            <div class="mb-4">
                <label for="message" class="block text-gray-700">Message:</label>
                <textarea id="message" name="message" class="mt-1 block w-full border-solid border-2 border-gray-500 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 "><?php echo htmlspecialchars($_POST['message'] ?? ''); ?></textarea>
                <p class="text-red-500 text-sm mt-1"><?php echo $errors['message'] ?? ''; ?></p>
            </div>
            
            <button type="submit" class="w-full py-2 text-white border-2 rounded-lg transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-blue-700 duration-300">Send</button>
            <div class="mb-4">
    <input type="checkbox" id="remember_me" name="remember_me">
    <label for="remember_me" class="text-gray-700">Remember Me</label>
</div>

        </form>  
    </div>
</body>
</html>
