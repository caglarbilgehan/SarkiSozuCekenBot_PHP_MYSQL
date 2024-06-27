<?php
function connectDatabase(){
    $servername = "localhost";
    $database = "sarkisozleri";
    $username = "root";
    $password = "12345678";
    // Create connection
    $conn = new mysqli($servername, $username, $password);
    mysqli_set_charset($conn, "utf8");

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

set_time_limit(0); 
date_default_timezone_set('Europe/Istanbul');
function escape($string) { 
    // Html tag kontrolü.  
    // Veri girişinde tagları html karakteri olarak kaydetmesi içindir.
    return htmlentities(trim($string), ENT_QUOTES, 'UTF-8'); 
    }

function SarkiKaydet ($conn, $sanatciAdi, $sarkiAdi, $sarkiSozleriHTML, $sarkiURL ) { 
    $sql = "SELECT song_name, artist_name FROM `sarkisozleri`.`lyrics` WHERE song_name='$sarkiAdi'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows == 0) {    
        $sql_SarkiKaydet="INSERT INTO `sarkisozleri`.`lyrics` ( `artist_name`, `song_name`, `lyrics`, `getLyricsURL`) 
                VALUES ('$sanatciAdi', '$sarkiAdi', '$sarkiSozleriHTML', '$sarkiURL');";					
        $result_SarkiKaydet=mysqli_query($conn,$sql_SarkiKaydet);
        if ($result_SarkiKaydet==0)
            echo "<p class='fs-3' style='color:red;'>Şarkı sözü eklenemedi, kontrol ediniz!</p>";
        else
            echo "<p class='fs-3' style='color:green;'>Şarkı sözü başarıyla eklendi!</p>";
    } else { 
        while($row = $result->fetch_assoc()) {		
            if ($row["artist_name"] == $sanatciAdi ) {    
                echo "<p class='fs-3' style='color:orange;'>Zaten ekli olduğu için eklenmedi!</p>"; 
            } else {
                $sql_SarkiKaydet="INSERT INTO `sarkisozleri`.`lyrics` ( `artist_name`, `song_name`, `lyrics`, `getLyricsURL`) 
                        VALUES ('$sanatciAdi', '$sarkiAdi', '$sarkiSozleriHTML', '$sarkiURL');";					
                $result_SarkiKaydet=mysqli_query($conn,$sql_SarkiKaydet);
                if ($result_SarkiKaydet==0)
                    echo "<p class='fs-3' style='color:red;'>Şarkı sözü eklenemedi, kontrol ediniz!</p>";
                else
                    echo "<p class='fs-3' style='color:green;'>Şarkı sözü başarıyla eklendi!</p>";
            }
        }
    }
}

function sanatciKaydet ($conn, $sanatciAdi, $sanatciURL ){
    $sql_1 = "SELECT artist_name FROM `sarkisozleri`.`artists` WHERE artist_name='$sanatciAdi'";
    $result_1 = mysqli_query($conn, $sql_1);
				
    if ($result_1->num_rows == 0) {  
            $sql="INSERT INTO `sarkisozleri`.`artists` ( `artist_name`, `getArtistURL`) 
                VALUES ('$sanatciAdi', '$sanatciURL');";
            $result=mysqli_query($conn,$sql);
        
            if  ($result==0) { echo "<span style='color:red;'> | Eklenemedi, kontrol ediniz!</span>"; }
            else  { echo "<span style='color:green;'> | Başarıyla eklendi!"; }
    } else { 
            echo "<span style='color:orange;'> | Zaten ekli olduğu için eklenmedi!</span>"; 
    }
}

?>