<?php
class SysConfig{
    public static function getParam() {
        $requestUri = $_SERVER['REQUEST_URI'];
        foreach (SysUri::getConfigUri() as $key=>$value) {
            if(preg_match('/.+\.route\..+$/', $key)) {
                if(preg_match_all('#^'.$value.'$#', $requestUri, $out, PREG_PATTERN_ORDER)) {
                    $res = SysUri::getAllParamByName(SysUri::getNameInParam($key));
                    if($res !== false){
                        if(isset($res['task']) and is_numeric($res['task']) and isset($out[$res['task']])){
                           $task = end($out[$res['task']]);
                        } else {
                           $task = $res['task'];
                        }
                        if (isset($res['params'])) {
                            foreach ($res['params'] as $key=>$value) {
                                if (isset($out[$value])) {
                                    $_REQUEST[$key] = end($out[$value]);
                                }
                            }
                        }
                        $_REQUEST['task'] = $task;
                        return array('mod' => $res['mod'], 'act' => $res['act'], 'task' => $task);
                    }
                }
            }
        }
        return false;
    }
    
    public static function getConnectParamDb()
    {
        $resArray = SysConfig::getConfigFile();
        if (isset($resArray['database'])) {
            if (isset($resArray['database']['type']) and isset($resArray['database']['username']) and isset($resArray['database']['password']) and isset($resArray['database']['host']) and isset($resArray['database']['database'])) {
                return array($resArray['database']['type'], $resArray['database']['username'], $resArray['database']['password'], $resArray['database']['host'], $resArray['database']['database']);
            }
            return false;
        }
    }

    public static function getSystemAutorun($enviroment = false)
    {
        $resArray = SysConfig::getConfigFile();
        $autorunArray = array();
        if (isset($resArray['autorun']) and $enviroment) {
            foreach ($resArray['autorun'] as $key=>$value) {
                if (list($envKey) = explode('.', $key) and $envKey == $enviroment) {
                    list($mod, $act) = explode('.', $value);
                    if (!is_null($mod) and !is_null($act)) {
                        $autorunArray[] = array('mod' => $mod, 'act' => $act);
                    }
                }
            }
        }

        return $autorunArray;
    }
    
    public static function getEnviroment()
    {
        $resArray = SysConfig::getConfigFile();
        $requet = $_SERVER['REQUEST_URI'];
        if (isset($resArray['environment'])) {
            foreach ($resArray['environment'] as $key=>$value) {
                if(strstr($requet, $value, true) !== false) {
                    $findme = 'environment.';
                    return array('name' => substr($key, strrpos($key , $findme) + strlen($findme)),
                        'value' => $value);
                }
            }
        }
        return false;
    }
    
    public static function getConfigFile()
    {
        $file_name = 'config.ini';
        return parse_ini_file(ROOT_DIR.PROJECT_NAME.DS.CONFIG_FOLDER.DS.$file_name, true);
    }
}