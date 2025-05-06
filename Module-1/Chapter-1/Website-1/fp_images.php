<?php
    header('Content-Type: image/png');

    // retrieve variables
    //$color = $_GET['frogcolor'];
    $arm = $_GET['frogarm'];
    $leg = $_GET['frogleg'];

    $basefrog = imagecreatefrompng("resources/frogbasegreen.png");
    imagesavealpha($basefrog, true);

    if($arm) {
        $armimg = imagecreatefrompng("resources/{$arm}.png");
        imagesavealpha($armimg, true);
        imagecopy($basefrog, $armimg, 0, 0, 0, 0, imagesx($armimg), imagesy($armimg));
    }

    if($leg) {
        $legimg = imagecreatefrompng("resources/{$leg}.png");
        imagesavealpha($legimg, true);
        imagecopy($basefrog, $legimg, 0, 0, 0, 0, imagesx($legimg), imagesy($legimg));
    }

    imagepng($basefrog);
?>