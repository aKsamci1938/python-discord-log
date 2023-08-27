<?php

session_start();



if (isset($_SESSION['usernames'])) {
    $username = $_SESSION['usernames'];
} else {
    header("Location: Giris");
    exit();
}

require_once("config/db_conf.php");

$conn = new mysqli($servername, $usernames, $passwords, $databases);

if ($conn->connect_error) {
    die("Veritabanına bağlanırken hata oluştu: " . $conn->connect_error);
}

$sql = "SELECT * FROM discord_logs"; 
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aKsamci - Web panel</title>

    <!-- aKsamci CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- aKsamci CSS END -->


    <!-- Favicon  -->
    <link rel="icon" href="img/logo.png" type="img/favicon" /></head>
    <!-- Favicon  END-->
</head>
<body>
<div class="submit">
                <button> <a href=""></a><?php echo "Hoşgeldin, $username" ;?></button>
            </div>   

    <div class="nav">
        <div class="logo">
            <img src="img/logo.png" alt="">
            
        </div>
        <ul class="nav-links">
            <div class="submit">
                <button> <a href=""></a>Mesajlar</button>
            </div>
            <div class="submit">
                <button> <a href=""></a></button>
            </div>

        </ul>
    </div>
    <div class="table">
    <span>Data List:</span>
    <table>
        <thead>
            <tr>
                <th>Profil Fotoğrafı</th>
                <th>Kullanıcı Adı</th>
                <th>Mesaj İçeriği</th>
                <th>Gönderim Tarihi</th>
                <th>Gönderilen Kanal</th>
                <th>Detay</th
            </tr>
        </thead>
        <tbody>
      <?php
      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td class='avatar-cell'>";
              echo "<a class='avatar-link' href='" . $row["user_avatar"] . "' target='_blank'>";
              echo "<img src='" . $row["user_avatar"] . "' alt='Avatar'>";
              echo "</a>";
              echo "</td>";
              echo "<td>" . $row["user_name"] . "</td>";
              echo "<td>" . substr($row["message_content"], 0, 10) . (strlen($row["message_content"]) > 10 ? '...' : '') . "</td>";
              echo "<td>" . $row["message_timestamp"] . "</td>";
              echo "<td>" . $row["message_channel_name"] . "</td>";
              echo "<td class='button'> <a href='view?id=" . $row["id"] . "'>Detay</a> </td>";
              echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='4'>Veri bulunamad�.</td></tr>";
      }
      ?>



    </table>
</div>


    <footer class="footer">
        <p>aKsamci &copy; 2023 Tüm hakları saklıdır.</p>
    </footer>
    
</body>
</html>
