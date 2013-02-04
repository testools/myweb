<?php
class ParentController
{
    protected $enviroment;
    protected $mod;
    protected $act;
    protected $task;
    protected $db;
    protected $smarty;
    
    public function __construct($db, $smarty, $enviroment, $mod, $act = 'default', $task = 'default')
    {
        $this->db = $db;
        $this->smarty = $smarty;
        $this->enviroment = $enviroment;
        $this->mod = $mod;
        $this->act = $act;
        $this->task = $task;
    }
    
    public function __destruct()
    {
        global $SMARTY_TEMPLATE_DEFAULT;
        $SMARTY_TEMPLATE_DEFAULT = $this->smarty->fetch($this->enviroment.DS.$this->mod.DS.$this->act.'.tpl');
    }
}