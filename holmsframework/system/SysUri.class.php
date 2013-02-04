<?php
class SysUri{
    public static function getParam($enviroment = false, $enviromentUri = false) {
        $requestUri = $_SERVER['REQUEST_URI'];
        if ($enviroment and $enviromentUri and $enviromentUri !== '/') {
            $requestUri = str_replace($enviromentUri, '', $requestUri);
        }
        foreach (SysUri::getConfigUri() as $key=>$value) {
            if(preg_match('/.+\.route\..+$/', $key)) {
                if ($enviroment) {
                    if (!preg_match('/.+\.route\..+\.(.*?)$/', $key, $match) or end($match) !== $enviroment) {
                        continue;
                    }
                }
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

    private static function getNameInParam($paramKey = false)
    {
        if ($paramKey) {
            if (($nameParam = strstr($paramKey, '.route', true)) !== false) {
                return $nameParam;
            }
        }
        return false;
    }

    private static function getAllParamByName($paramName = false)
    {
        if ($paramName) {
            $mod = '';
            $act = 'default';
            $task = 'default';
            $paramsArray = array();
            foreach (SysUri::getConfigUri() as $key=>$value) {
                if(preg_match('/'.$paramName.'\..+$/', $key)) {
                    if ($res = strstr($key, '.mod', true)) {
                        $mod = $value;
                        $_REQUEST['mod'] = $value;
                    } elseif ($res = strstr($key, '.act', true)) {
                        $act = $value;
                        $_REQUEST['act'] = $value;
                    } elseif (strstr($key, '.request', true)) {
                        if (($request = str_replace('.request.', '', strstr($key, '.request.'))) == 'task') {
                            $task = $value;
                        } else {
                            $paramsArray[$request] = $value;
                        }
                    }
                }
            }
            if(strlen($mod) > 0){
                return array('mod' => $mod, 'act' => $act, 'task' => $task, 'params' => $paramsArray);
            }
        }
        return false;
    }

    public static function getConfigUri()
    {
        $file_name = 'uri.ini';
        return parse_ini_file(ROOT_DIR.PROJECT_NAME.DS.CONFIG_FOLDER.DS.$file_name, true);
    }
}