<?php
class SysSmarty
{
    public $smarty;
    function init($debug = false) {
        global $SysSmarty;
        $SysSmarty = new Smarty();

        $SysSmarty->template_dir = SITE_DIR_NAME_PATCH.DS.'templates/';
        $SysSmarty->compile_dir = CACHE_TMP_FOLDER.'templates_c/';
        $SysSmarty->config_dir = CACHE_TMP_FOLDER.'configs/';
        $SysSmarty->cache_dir = CACHE_TMP_FOLDER.'cache/';
        $SysSmarty->debugging = $debug;
        $smarty = $SysSmarty;
    }
}