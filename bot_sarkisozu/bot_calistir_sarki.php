<?php include './header.php'; $conn = connectDatabase();?>
<?php  $sarkiURL = escape($_GET["sarki"]); ?> 
<?php 
$icerik = file_get_contents($sarkiURL);

preg_match_all('@<small>(.*?)</small>@si',$icerik,$sanatciAdi);
preg_match_all('@<h1>(.*?)<small>@si',$icerik,$sarkiAdi);
preg_match_all('@<div class="tab-pane active" id="sarki-sozleri">(.*?)</div>@si',$icerik,$sarkiSozleri);

$sanatciAdi =escape(strip_tags($sanatciAdi[0][0]));
$sarkiAdi =escape(strip_tags($sarkiAdi[0][0]));
$sarkiSozleri =strip_tags($sarkiSozleri[0][0], "<br><i>");
$sarkiSozleriHTML = escape($sarkiSozleri);
?>

<div class="container">
    <div class="row">
        <div class="col-12 pt-3 border-bottom border-start border-end">
            <p class="text-center fs-5 fw-bolder">BOT ÇALIŞTIR > ŞARKI</p>
        </div>
        <div class="col-6 border p-3">
            <?php 
                echo '<p><strong>Şarkı Sözü Çekilen URL:</strong> <a href="'.$sarkiURL.'" target="_blank">'.$sarkiURL.'</a></p>';
                echo "<p><strong>Sanatçı:</strong> ".$sanatciAdi."</p>";
                echo "<p><strong>Şarkı Adı:</strong> ".$sarkiAdi."</p>";
                echo "<p><strong>HTML Şeklinde Şarkı Sözleri:</strong><br/>".$sarkiSozleriHTML."</p>";
            ?>
            <?php SarkiKaydet ($conn, $sanatciAdi, $sarkiAdi, $sarkiSozleriHTML, $sarkiURL ); ?>
        </div>
        <div class="col-6 border p-3"><?php echo "<p><strong>Şarkı Sözleri:</strong><br/>".$sarkiSozleri."</p>"; ?></div>
    </div>
</div>
<?php include './footer.php';?>