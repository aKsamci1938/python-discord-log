<?php
session_start();


require_once("config/db_conf.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usernames = $_POST['usernames'];
    $passwords = $_POST['passwords'];

    $sql = "SELECT * FROM users WHERE username='$usernames' AND password='$passwords'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION['usernames'] = $usernames;
        header("Location: Anasayfa");
    } else {
        $error_message = "Hatalı kullanıcı adı veya şifre!";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aKsamci / Login</title>

    <!-- aKsamci CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- aKsamci CSS END -->

    <!-- Favicon  -->
    <link rel="icon" href="img/logo.png" type="img/favicon" /></head>
    <!-- Favicon  END-->
<body>
    <div class="loginbox">
        <div class="logo">
            <img src="img/logo.png" alt="">
        </div>
        <ul class="forminput">
            <form method="post">
                <div class="username">
                    <input type="text" name="usernames" id="usernames" placeholder="Kullanıcı Adı">
                </div>
                <div class="password">
                    <input type="password" name="passwords" id="passwords" placeholder="Parola">
                </div>
                <div class="submit">
                    <button type="submit">Giriş Yap</button>
                </div>
            </form>
        </ul>
        <?php if (isset($error_message)) { ?>
            <div class="error-message">
                <?php echo $error_message; ?>
            </div>
        <?php } ?>
    </div>

    <footer class="footer">
        <p>aKsamci &copy; 2023 Tüm hakları saklıdır.</p>
    </footer>
    
</body>
</html>
