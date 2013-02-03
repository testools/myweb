<?php
class ParentController
{
    protected $mod;
    protected $act;
    protected $task;
    protected $db;
    protected $smarty;
    
    public function __construct($db, $smarty, $mod, $act = 'default', $task = 'default')
    {
        $this->db = $db;
        $this->smarty = $smarty;
        $this->mod = $mod;
        $this->act = $act;
        $this->task = $task;
    }
}