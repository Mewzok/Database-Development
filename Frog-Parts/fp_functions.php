<?php
    function compareName($x, $y) {
        if($x[3] == $y[3]) {
        return 0;
        } else if($x[3] < $y[3]) {
        return -1;
        } else {
        return 1;
        }
    }

    function loadFrogImg($basefrog, $limb, $color) {
        $limbimg = imagecreatefrompng("resources/{$limb}{$color}.png");
        imagesavealpha($limbimg, true);
        imagecopy($basefrog, $limbimg, 0, 0, 0, 0, imagesx($limbimg), imagesy($limbimg));

        return $basefrog;
    }
?>