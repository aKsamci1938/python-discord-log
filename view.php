<?php
session_start();

require_once("config/db_conf.php");

if (isset($_SESSION['usernames'])) {
    $username = $_SESSION['usernames'];
} else {
    header("Location: Giris");
    exit();
}

if (isset($_GET['id'])) {
    $messageId = $_GET['id'];

    $sql = "SELECT * FROM discord_logs WHERE id = '$messageId'";
    $result = $conn->query($sql);

    $modalContent = '';

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Modal içeriğini hazırla
        $modalContent = "
            <h1>Mesaj Detayı</h1>
            <p><strong>Kullanıcı Adı:</strong> " . $row['user_name'] . "</p>
            <p><strong>Mesaj İçeriği:</strong> " . $row['message_content'] . "</p>
            <p><strong>Gönderim Tarihi:</strong> " . $row['message_timestamp'] . "</p>
            <p><strong>Gönderilen Kanal:</strong> " . $row['message_channel_name'] . "</p>
        ";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mesaj Detayı</title>
</head>
<body>
    <h1>Mesaj Detayı</h1>
    <p><strong>Kullanıcı Adı:</strong> <?php echo $row['user_name']; ?></p>
    <p><strong>Mesaj İçeriği:</strong> <?php echo $row['message_content']; ?></p>
    <p><strong>Gönderim Tarihi:</strong> <?php echo $row['message_timestamp']; ?></p>
    <p><strong>Gönderilen Kanal:</strong> <?php echo $row['message_channel_name']; ?></p>
    <p><a href="index.php">Geri Dön</a></p>
</body>
</html>
