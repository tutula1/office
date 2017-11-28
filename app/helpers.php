<?php
    function tagImage($src, $lazy=1, $type=1, $alt='', $class='') {
        if ($lazy == 1) {
            if ($type != 1) {
                $html = "<img class='lazy $class' data-src='$src' alt='$alt' src='data:image/gif;base64,R0lGODdhAQABAPAAAP///wAAACwAAAAAAQABAEACAkQBADs='/><noscript><img class='$class' src='$src' alt='$alt'/></noscript>";
            } else {
                $html = '<img class="lazy '.$class.'" data-src="'.$src.'" alt="'.$alt.'" src="data:image/gif;base64,R0lGODdhAQABAPAAAP///wAAACwAAAAAAQABAEACAkQBADs="/><noscript><img class="'.$class.'" src="'.$src.'" alt="'.$alt.'"/></noscript>';
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

    function getConfig($key){
        if (\Session::has('configs')){
            $configs = \Session::get('configs');
            foreach($configs as $config){
                if($config->key == $key) {
                    return $config->value;
                }
            }
        }
        return $key;
    }
?>
