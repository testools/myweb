<?php
class HomeFrontendController extends ParentController
{

    public function getDefault()
    {
        /*$homeFrontendDB = new HomeFrontendDB();
        $homeFrontendDB->getAutorizeUser();*/
        $this->smarty->assign('name', 'Имя');
    }
    
    public function getView()
    {
        echo '-=getView=-';
    }
    
    public function getEdit()
    {
        echo '-=getEdit=-';
    }
   
}