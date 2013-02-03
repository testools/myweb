<?php
//init db
include(ROOT_DIR.PROJECT_NAME.DS.COMPONENT_FOLDER.DS.'adodb5/adodb.inc.php');
include(ROOT_DIR.PROJECT_NAME.DS.COMPONENT_FOLDER.DS.'adodb5/adodb-exceptions.inc.php');

define('SMARTY_DIR', ROOT_DIR.PROJECT_NAME.DS.COMPONENT_FOLDER.DS.'Smarty-3.1.13'.DS.'libs'.DS);
ini_set('include_path', ini_get('include_path').PATH_SEPARATOR.ROOT_DIR.SMARTY_DIR);
require_once(SMARTY_DIR.'Smarty.class.php');
