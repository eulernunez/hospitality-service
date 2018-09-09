<?php
class Zend_View_Helper_SetAuthor extends Zend_View_Helper_Abstract
{

    public function setAuthor()
    {

        $config = new Application_Model_Repository_Statement();
        $results = $config->getSeoConfig();
        $author = $results['0']['author'];

        return $author;

    }

}