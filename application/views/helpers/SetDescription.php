<?php
class Zend_View_Helper_SetDescription extends Zend_View_Helper_Abstract
{

    public function setDescription()
    {

        $config = new Application_Model_Repository_Statement();
        $results = $config->getSeoConfig();
        $description = $results['0']['description'];

        return $description;

    }

}