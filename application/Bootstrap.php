<?php
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    public function _initUrls()
    {

        $router = Zend_Controller_Front::getInstance()->getRouter();

        $params = 
            array(
                'controller' => 'habitacion',
                'action'     => 'index');

        $handler = new Application_Model_Repository_Statement();
        $urls = $handler->getCleanUrls();

        foreach($urls as $url) {

            $params['id'] = $url['id'];
            $route = new Zend_Controller_Router_Route(
                '/habitacion/'. $url['url'] ,$params
                );

            $router->addRoute('/habitacion/' . $url['url'], $route);

        }

    }

}

