<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: admin-login.php");
  exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $location = $_POST['location'];
  $site_name = $_POST['site_name'];

  $conn = new mysqli("localhost", "root", "", "methaq_security");

  $stmt = $conn->prepare("INSERT INTO sites (location, site_name) VALUES (?, ?)");
  $stmt->bind_param("ss", $location, $site_name);
  $stmt->execute();
  $stmt->close();

  header("Location: dashboard.php");
  exit;
}
