<?php
/*function convertEnglish($string = false) {
    $resString = '';
    if (!$string or !strlen($string)) {
        return $resString;
    }

    $arrReplace = array('q'=>'й', 'w'=>'ц', 'e'=>'у', 'r'=>'к', 't'=>'е', 'y'=>'н', 'u'=>'г', 'i'=>'ш', 'o'=>'щ', 'p'=>'з', '['=>'х', ']'=>'ъ', 'a'=>'ф', 's'=>'ы', 'd'=>'в', 'f'=>'а', 'g'=>'п', 'h'=>'р', 'j'=>'о', 'k'=>'л', 'l'=>'д', ';'=>'ж', "'"=>'э', 'z'=>'я', 'x'=>'ч', 'c'=>'с', 'v'=>'м', 'b'=>'и', 'n'=>'т', 'm'=>'ь', ','=>'б', '.'=>'ю', '/'=>'.', '`'=>'ё', 'Q'=>'Й', 'W'=>'Ц', 'E'=>'У', 'R'=>'К', 'T'=>'Е', 'Y'=>'Н', 'U'=>'Г', 'I'=>'Ш', 'O'=>'Щ', 'P'=>'З', '{'=>'Х', '}'=>'Ъ', 'A'=>'Ф', 'S'=>'Ы', 'D'=>'В', 'F'=>'А', 'G'=>'П', 'H'=>'Р', 'J'=>'О', 'K'=>'Л', 'L'=>'Д', ':'=>'Ж', '"'=>'Э', '|'=>'/', 'Z'=>'Я', 'X'=>'Ч', 'C'=>'С', 'V'=>'М', 'B'=>'И', 'N'=>'Т', 'M'=>'Ь', '<'=>'Б', '>'=>'Ю', '?'=>',', '~'=>'Ё', '@'=>'"', '#'=>'№', '$'=>';', '^'=>':', '&'=>'?');
    for ($i = 0; $i < strlen($string); $i++) {
        $char = $string[$i];
        if (isset($arrReplace[$char])) {
            $resString .= $arrReplace[$char];
        }
    }
    
    return $resString;
}*/
define('DS', '/');
define('ROOT_DIR', dirname(__FILE__).DS);
define('PROJECT_NAME', 'holmsframework');
define('SITE_DIR_NAME', 'site_www');
define('ClASS_DIR_NAME', 'classes');
define('SITE_DIR_NAME_PATCH', ROOT_DIR.SITE_DIR_NAME);
define('SYSTEM_FRAME', ROOT_DIR.PROJECT_NAME.DS.'system');
define('CONFIG_FOLDER', 'config');
define('COMPONENT_FOLDER', 'component');
define('CACHE_TMP_FOLDER', ROOT_DIR.PROJECT_NAME.DS.'cache_tmp/');
require_once(PROJECT_NAME.DS.'run.php');