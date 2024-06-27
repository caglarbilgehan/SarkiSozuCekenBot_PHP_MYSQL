<?php include './header.php'; $conn = connectDatabase();?>
<div class="container">
        <div class="row pt-3 border-bottom border-start border-end">
            <p class="text-center fs-5 fw-bolder">BOT ÇALIŞTIR > SANATÇILAR</p>
        </div>

    <?php
        $lyrics_id_site= 1;
        $sanatciSayisi = 1;

        for ($sayfa=1; $sayfa < 59 ; $sayfa++) { 

            echo '<div class="row border p-3 ps-3">';  

            $siteHomePage = "https://www.sarkisozleri.bbs.tr/";
            $site = "https://www.sarkisozleri.bbs.tr/sanatcilar/".$sayfa;
            $icerik = file_get_contents($site);

            preg_match_all('@<div style="padding: 4px 0; border-bottom: 1px solid #EEEEEE;">(.*?)<span class="badge pull-right">@si',$icerik,$sanatciIcerik);
            preg_match_all('@<div style="padding: 4px 0; border-bottom: 1px solid #EEEEEE;">(.*?)<a href="/(.*?)"@si',$icerik,$getLink);
    
            $sanatciURL = $siteHomePage.$getLink[2][0];
            echo '<div class="text-center fs-4 px-5"><strong>'.$sayfa.'. SAYFA SANATÇILARI</strong><p class="fs-5"><a href="'.$site.'" target="_blank">'.$site.'</a></p><hr></div>';
            echo '<ul id="list-test">';
            
            for ($i=0; $i < 9999 ; $i++) {
                if(!isset($sanatciIcerik[0][$i])){ break; }

                $sanatciAdi =strip_tags($sanatciIcerik[0][$i]);
                $sanatciAdi = str_replace('"',"",$sanatciAdi);
                $sanatciAdi = escape(trim($sanatciAdi));

                $sanatciURL = escape($siteHomePage.$getLink[2][$i]);

                echo '<li>'.$sanatciSayisi.'. ';
                echo '<span class="mr-5 fw-bolder">Sanatçı Adı: </span><span>'.$sanatciAdi.'</span> | ';
                echo '<span class="mr-5 fw-bolder">Sanatçı URL: </span><span><a href="'.$sanatciURL.'">'.$sanatciURL.'</a></span>';

                sanatciKaydet ($conn, $sanatciAdi, $sanatciURL );

                echo '</li>';

                $sanatciSayisi++;
            }
            echo'</ul>';
            echo'</div>';
        }			
        ?>



	
</div>
<?php include './footer.php';?>