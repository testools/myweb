<?php
class SysInit{

    public $enviroment;
    public $mod;
    public $act = 'default';
    public $tack = 'default';

    function _readSysDirectory($path, $enviroment = false)
    {
        if (!is_dir($path)) {
            return;
        }
        $dh = opendir($path);
        while (($file = readdir($dh)) !== false) {
            if ($file != "." && $file != "..") {
                if ($enviroment) {
                    $patern = '/.+'.$enviroment.'Controller\.class\.php$/';
                } else {
                    $patern = '/.+\.class\.php$/';
                }
                if(is_dir($path.DS.$file.DS) and $enviroment !== false) {
                    $this->_readSysDirectory($path.DS.$file, $enviroment);
                }
                if(preg_match($patern, $file)) {
                    if (file_exists($path.DS.$file)) {
                        include($path.DS.$file);
                    }
                }
            }
        }

        closedir($dh);
    }
    
    function _beforeStart()
    {
        $this->enviroment = SysConfig::getEnviroment();
        if($responsParam = SysUri::getParam()) {
            if(isset($responsParam['mod']) and isset($responsParam['act']) and isset($responsParam['task'])) {
                $this->mod = $responsParam['mod'];
                $this->act = $responsParam['act'];
                $this->task = $responsParam['task'];
                return true;
            }
        }
        
        return false;
    }
    
    function _autorunStart()
    {
        if(!$this->enviroment) {
            return false;
        }

        return SysConfig::getSystemAutorun($this->enviroment);
    }
    
    function _includeEnviroment()
    {        
        if ($this->enviroment){
            $dir = ROOT_DIR.SITE_DIR_NAME.DS.ClASS_DIR_NAME.DS.$this->enviroment;
            if(is_dir($dir)) {
                $this->_readSysDirectory($dir, ucfirst($this->enviroment));
                return true;
            }
        }
        
        return false;
    }
}