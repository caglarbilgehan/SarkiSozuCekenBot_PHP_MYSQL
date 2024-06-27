<?php include './header.php'; $conn = connectDatabase();?>

<div class="container">
    <div class="row pt-3 border-bottom border-start border-end">
        <p class="text-center fs-5 fw-bolder">BOT ÇALIŞTIR > ŞARKILAR</p>
    </div>
</div>
<?php 

for ($sayfa=1; $sayfa < 59 ; $sayfa++) { 
	$URLHomePage = "https://www.sarkisozleri.bbs.tr/";
	$URL = "https://www.sarkisozleri.bbs.tr/sanatcilar/".$sayfa;
	$icerik = file_get_contents($URL);


	preg_match_all('@<div style="padding: 4px 0; border-bottom: 1px solid #EEEEEE;">(.*?)<span class="badge pull-right">@si',$icerik,$sanatciIcerik);
	preg_match_all('@<div style="padding: 4px 0; border-bottom: 1px solid #EEEEEE;">(.*?)<a href="/(.*?)"@si',$icerik,$getSanatciURL);

	$sanatciURL = $URLHomePage.$getSanatciURL[2][0];
    ?>
    <?php

	for ($i=0; $i < 9999 ; $i++) {
		if(!isset($sanatciIcerik[0][$i])){ break; }

		$sanatciURL =escape($URLHomePage.$getSanatciURL[2][$i]);

		$sanatciAdi =escape(strip_tags($sanatciIcerik[0][$i]));
		$sanatciAdi = str_replace('"',"'",$sanatciAdi);
		$sanatciAdi = escape(trim($sanatciAdi));
		
		$icerikSanatci = file_get_contents($sanatciURL);
        
		
		preg_match_all('@ <a(.*?)</a>@si',$icerikSanatci,$sarkiIcerik);
		preg_match_all('@<a href="/(.*?)"@si',$icerikSanatci,$getSarkiURL);

        $d = 1;
		$z = 5;
	

        ?> <p class="text-center fs-4 fw-bolder mt-3"><?php echo "<strong>".($i+1).". Sanatçı:</strong> ".$sanatciAdi;  ?></p> <?php

		for ($y=1 ; $y < 99999 ; $y++) { 
			if(!isset($sarkiIcerik[0][$y])){ break; }

			$sarkiAdi = $sarkiIcerik[0][$y];
			$sarkiAdi = strip_tags($sarkiAdi);
			$sarkiAdi = str_replace('"',"'",$sarkiAdi);
			$sarkiAdi = escape(trim($sarkiAdi));
            
            
			$sarkiURL = $URLHomePage.$getSarkiURL[$d][$z]; 
			$sarkiURL = str_replace('<a href="/','',$sarkiURL);
			$sarkiURL = escape(str_replace('"','',$sarkiURL)); 
			$z++;

			$icerikSarki = file_get_contents($sarkiURL); 
			preg_match_all('@<div class="tab-pane active" id="sarki-sozleri">(.*?)</div>@si',$icerikSarki,$sarkiSozleri);
			$sarkiSozleri =strip_tags($sarkiSozleri[0][0], "<br><i>");
			$sarkiSozleriHTML = escape($sarkiSozleri);
			

            ?>
            <div class="mt-3 container">
                <div class="row">
                    <div class="col-6 border p-3">
                        <?php 
                            echo '<p><strong>Şarkı Sözü Çekilen URL:</strong> <a href="'.$sarkiURL.'" target="_blank">'.$sarkiURL.'</a></p>';
                            echo "<p><strong>".($i+1).". Sanatçı:</strong> ".$sanatciAdi."</p>";
                            echo "<p><strong>Şarkı Adı:</strong> ".$sarkiAdi."</p>";
							echo "<p><strong>HTML Şeklinde Şarkı Sözleri:</strong><br/>".$sarkiSozleriHTML."</p>";
                        ?>

						<?php SarkiKaydet ($conn, $sanatciAdi, $sarkiAdi, $sarkiSozleriHTML, $sarkiURL ); ?>
                    </div>
                    <div class="col-6 border p-3"><?php echo "<p><strong>Şarkı Sözleri:</strong><br/>".$sarkiSozleri."</p>"; ?></div>
                </div>
            </div>
<?php
		}
	}
}			
?>

<?php include './footer.php';?>