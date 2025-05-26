CREATE DATABASE methaq_security;
USE methaq_security;

-- جدول لتخزين رسائل التواصل
CREATE TABLE messages (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100),
  message TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- جدول المستخدمين (مدراء النظام)
CREATE TABLE admins (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(255) NOT NULL
);

-- جدول لمواقع العملاء
CREATE TABLE sites (
  id INT AUTO_INCREMENT PRIMARY KEY,
  location VARCHAR(100),
  site_name VARCHAR(255)
);
