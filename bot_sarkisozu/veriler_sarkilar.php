<?php include './header.php'; $conn = connectDatabase();?>

<div class="container">
    <div class="row pt-3 border-bottom border-start border-end">
        <p class="text-center fs-5 fw-bolder">VERİLER > ŞARKILAR</p>
    </div>
</div>
            <?php
                $sql = "SELECT * FROM sarkisozleri.lyrics";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    $i = 1;
                    while($row = $result->fetch_assoc()) { ?>
                        
                        <p class="text-center fs-4 fw-bolder mt-3"><?php echo "<strong>Sanatçı:</strong> ".$row['artist_name'];  ?></p> 

                        <div class="mt-3 container">
                            <div class="row">
                                <div class="col-6 border p-3">
                                    <?php 
                                        echo "<p>".$i.".Şarkı</p><hr>";
                                        echo '<p><strong>Çekildiği URL:</strong> <a href="'.$row['getLyricsURL'].'" target="_blank">'.$row['getLyricsURL'].'</a></p>';
                                        echo "<p><strong>Sanatçı Adı:</strong> ".$row['artist_name']."</p>";
                                        echo "<p><strong>Şarkı Adı:</strong> ".$row['song_name']."</p>";
                                        $i++;
                                    ?>
                                </div>
                                <div class="col-6 border p-3"><?php echo "<p><strong>HTML Şeklinde Şarkı Sözleri:</strong><br/>".$row['lyrics']."</p>"; ?></div>
                            </div>
                        </div>
                <?php 
                } } else { ?>
                    <div class="container">
                        <div class="row border p-3">
                            <?php
                            echo '<span class="text-center fs-5">0 sonuç bulundu... Veri tabanında kayıtlı hiç <strong>şarkı</strong> yok!</span>'; ?>
                        </div>
                    </div> <?php
                }
                $conn->close();
                ?>

<?php include './footer.php';?>