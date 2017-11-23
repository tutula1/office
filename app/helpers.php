<?php
    function tagImage($src, $lazy=1, $alt='', $class='', $type=1) {
        if ($lazy == 1) {
            if ($type != 1) {
                $html = "<img class='lazy $class' data-src='$src' alt='$alt'/><noscript><img class='$class' src='$src' alt='$alt'/></noscript>";
            } else {
                $html = '<img class="lazy '.$class.'" data-src="'.$src.'" alt="'.$alt.'"/><noscript><img class="'.$class.'" src="'.$src.'" alt="'.$alt.'"/></noscript>';
            }
        } else {
            if ($type != 1) {
                $html = "<img class='$class' src='$src' alt='$alt'/>";
            } else {
                $html = '<img class="'.$class.'" src="'.$src.'" alt="'.$alt.'"/>';
            }
        }
        return $html;
    }
?>
