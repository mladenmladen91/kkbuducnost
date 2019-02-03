<?php

$scripts = [
    'header.php' => ['jquery-3.3.1.min.js', 'popper.js', 'bootstrap.min.js'],
    'index.php' => ['swiper.min.js', 'index.js'],
    'album_fotografije.php' => ['lightgallery.min.js', 'lg-thumbnail.min.js', 'lg-fullscreen.min.js', 'lg-autoplay.min.js', 'lg-zoom.min.js', 'album_fotografije.js'],
    'aba.php' => ['vijesti.js'],
    'eurocup.php' => ['vijesti.js'],
    'euroleague.php' => ['vijesti.js'],
    'prvaliga.php' => ['vijesti.js'],
    'klub.php' => ['vijesti.js'],
    'ostalo.php' => ['vijesti.js'],
    'tabele.php' => ['tabele.js'],
    'juniori.php' => ['igraci.js'],
    'kadeti.php' => ['igraci.js'],
    'pioniri.php' => ['igraci.js'],
    'menadzment.php' => ['staff.js'],
    'upravni_odbor.php' => ['staff.js'],
    'staff.php' => ['staff.js'],
    'strucni_stab' => ['staff.js'],
    'selekcije.php' => ['staff.js'],
    'rezultati.php' => ['rezultati.js'],
    'kalendar.php' => ['kalendar.js'],
    'fotografije_takmicenja.php' => ['fotografije_takmicenja.js'],
    'medija_kutak.php' => ['lightgallery.min.js', 'lg-thumbnail.min.js', 'lg-fullscreen.min.js', 'lg-autoplay.min.js', 'lg-zoom.min.js', 'medija_kutak.js'],
];

foreach($scripts as $key => $value) {
	if($key != $pageName) continue;
    foreach($value as $href) {
?>

<script type="text/javascript"  src="<?php echo 'js/'.$href; ?>" ></script>

<?php
		}
	}
?>