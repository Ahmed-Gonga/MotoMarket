<?php
session_start();
$host='localhost'; $db='moto_shop'; $user='moto_user'; $pass='moto123';
try { $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass); $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); }
catch (PDOException $e) { die('Database connection failed: '.$e->getMessage()); }
function cart_count(){ return isset($_SESSION['cart']) ? array_sum($_SESSION['cart']) : 0; }
function is_logged_in(){ return isset($_SESSION['user_id']); }
function is_admin(){ return isset($_SESSION['role']) && $_SESSION['role']==='admin'; }
function require_login(){ if(!is_logged_in()){ header('Location: login.php'); exit; } }
function require_admin(){ if(!is_admin()){ header('Location: login.php'); exit; } }
?>
