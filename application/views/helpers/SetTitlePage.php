<?php
class Zend_View_Helper_SetTitlePage extends Zend_View_Helper_Abstract
{

    public function setTitlePage()
    {

        $config = new Application_Model_Repository_Statement();
        $results = $config->getSeoConfig();
        $title = $results['0']['title'];

        return $title;

    }

}