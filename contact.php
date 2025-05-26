<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "methaq_security";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) die("فشل الاتصال: " . $conn->connect_error);

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$stmt = $conn->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $message);
$stmt->execute();
$stmt->close();
$conn->close();

echo "تم إرسال رسالتك بنجاح. شكراً لتواصلك معنا.";
?>
