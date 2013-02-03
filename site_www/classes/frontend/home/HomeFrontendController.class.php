<?php
class HomeFrontendController extends ParentController
{

    public function getDafault()
    {
        echo '-=getDafault=-';
        $homeFrontendDB = new HomeFrontendDB();
        $homeFrontendDB->getAutorizeUser();
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