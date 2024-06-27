<?php include './header.php'; $conn = connectDatabase();?>
    <div class="container">
        <div class="row pt-3 border-bottom border-start border-end">
            <p class="text-center fs-5 fw-bolder">VERİLER > SANATÇILAR</p>
        </div>
        <div class="row border p-3">
            
            <?php
                $sql = "SELECT * FROM sarkisozleri.artists";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) { ?>
                    <ul class="sanatciList">
                <?php    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<li>Sanatçı ID: " . $row["artist_id"]. " | Sanatçı Adı: " . $row["artist_name"]. " | Çekildiği URL: " . $row["getArtistURL"]. "</li>";
                    } ?>
                </ul>  
                <?php } else {
                    echo '<span class="text-center fs-5">0 sonuç bulundu... Veri tabanında kayıtlı hiç <strong>sanatçı</strong> yok!</span>';
                }
                $conn->close();
                
            ?>
            </ul>
        </div> 
    </div>



<?php include './footer.php';?>