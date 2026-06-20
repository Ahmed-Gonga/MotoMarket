<?php
require_once 'config.php';
require_once 'google-config.php';

if (isset($_GET['code'])) {
    $token = $google_client->fetchAccessTokenWithAuthCode($_GET['code']);

    if (!isset($token['error'])) {
        $google_client->setAccessToken($token['access_token']);

        $service = new Google_Service_Oauth2($google_client);
        $google_user = $service->userinfo->get();

        $name = $google_user->name;
        $email = $google_user->email;

        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if (!$user) {
            $password = password_hash(bin2hex(random_bytes(16)), PASSWORD_DEFAULT);
            $insert = $pdo->prepare("INSERT INTO users (name,email,password,role) VALUES (?,?,?,'user')");
            $insert->execute([$name, $email, $password]);

            $stmt->execute([$email]);
            $user = $stmt->fetch();
        }

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];

        header("Location: index.php");
        exit;
    }
}

header("Location: login.php");
exit;
?>
