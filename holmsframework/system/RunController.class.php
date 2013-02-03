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
            $SysSmarty->init(true);
            $controller = new $className($SysDataBase->getValueDb(), $SysSmarty->smarty, $this->mod, $this->act, $this->task);
            $metodName = 'get'.ucfirst($this->act);
            if (method_exists($controller, $metodName)) {
                $controller->$metodName();
            } else {
                throw new Exception("Unable to load $metodName in $className.");
            }
        }
    }
}