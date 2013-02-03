<?php
include(SYSTEM_FRAME.DS.'SysInit.php');
$SysInit = new SysInit();
$SysInit->_readSysDirectory(SYSTEM_FRAME);

if ($SysInit->_beforeStart() !== false and ($autoran = $SysInit->_autorunStart()) !== false) {
    $SysInit->_includeEnviroment();
    //start autorun
    if(count($autoran)) {
        foreach ($autoran as $key=>$value) {
            if (isset($value['mod']) and isset($value['act'])) {
                $RunController = new RunController($SysInit->enviroment, $value['mod'], $value['act']);
                $RunController->run();
            }
        }
    }
    //run controller
    if (isset($SysInit->mod) and isset($SysInit->act)) {
        $RunController = new RunController($SysInit->enviroment, $SysInit->mod, $SysInit->act);
        $RunController->run();
    }
}



//redirect to error page

$smarty = new Smarty();

$smarty->template_dir = SITE_DIR_NAME_PATCH.DS.'templates/';
$smarty->compile_dir = CACHE_TMP_FOLDER.'templates_c/';
$smarty->config_dir = CACHE_TMP_FOLDER.'configs/';
$smarty->cache_dir = CACHE_TMP_FOLDER.'cache/';

$smarty->assign('name', 'Привет');
//$smarty->debugging = true;

$smarty->display('frontend/home/index.tpl');
$smarty->display('index.tpl');
//$output = $smarty->fetch("index.tpl");
//echo $output;
exit;

/*$DB = NewADOConnection('mysql');
$server = 'localhost';
$user = 'root';
$db = 'frame';
$pwd = '';
$DB->Connect($server, $user, $pwd, $db);

$val = $DB->GetOne("select test_name from test_connection where id='1'");
var_dump($val);*/