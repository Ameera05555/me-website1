<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $conn = new mysqli("localhost", "root", "", "methaq_security");
  $stmt = $conn->prepare("SELECT * FROM admins WHERE username=?");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($row = $result->fetch_assoc()) {
    if (password_verify($password, $row['password'])) {
      $_SESSION['admin'] = $username;
      header("Location: dashboard.php");
      exit;
    } else {
      $error = "كلمة المرور غير صحيحة.";
    }
  } else {
    $error = "اسم المستخدم غير موجود.";
  }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <title>دخول المسؤول</title>
</head>
<body>
  <h2>تسجيل دخول المسؤول</h2>
  <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
  <form method="post">
    <input type="text" name="username" placeholder="اسم المستخدم" required>
    <input type="password" name="password" placeholder="كلمة المرور" required>
    <button type="submit">دخول</button>
  </form>
</body>
</html>
