<?php
$hash = password_hash("123456", PASSWORD_DEFAULT);

$conn = new mysqli("localhost", "root", "", "methaq_security");
$stmt = $conn->prepare("INSERT INTO admins (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $hash);
$username = "admin";
$stmt->execute();

echo "تم إنشاء حساب مسؤول.";
?>
