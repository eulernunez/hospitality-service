<?php
class Zend_View_Helper_SetKeywords extends Zend_View_Helper_Abstract
{

    public function setKeywords()
    {

        $config = new Application_Model_Repository_Statement();
        $results = $config->getSeoConfig();
        $keywords = $results['0']['keywords'];

        return $keywords;

    }

}