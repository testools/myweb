<?php
class RunController
{
    private $enviroment;
    private $mod;
    private $act;
    private $task;
    
    function __construct($enviroment, $mod, $act = 'default', $task = 'default')
    {
        $this->enviroment = $enviroment;
        $this->mod = $mod;
        $this->act = $act;
        $this->task = $task;
    }
    
    function run()
    {
        $className = ucfirst($this->mod).ucfirst($this->enviroment).'Controller';
        if (class_exists($className)) {
            $SysSmarty = new SysSmarty();
            $SysDataBase = new SysDataBase();
            if (!$this->isAllow(1, $this->enviroment, $this->mod, $this->act, $this->task)) {
                throw new Exception("Access denied in $className.");
                exit;
            }
            $SysSmarty->init(true);
            $controller = new $className($SysDataBase->getValueDb(), $SysSmarty->smarty, $this->enviroment, $this->mod, $this->act, $this->task);
            $metodName = 'get'.ucfirst($this->act);
            if (method_exists($controller, $metodName)) {
                $controller->$metodName();
            } else {
                throw new Exception("Unable to load $metodName in $className.");
            }
        }
    }
    
    function isAllow($groupId, $enviroment, $mod, $act)
    {
        if($enviroment and $mod and $act) {
            $parentDb = new ParentDB();
            $res = $parentDb->getStoredProc('group_getAllow', array($groupId, $enviroment, $mod, $act));
            if ($res !== false and isset($res[1]) and $res[1] === '1') {
                return true;
            }
        }
        return false;
    }
}
