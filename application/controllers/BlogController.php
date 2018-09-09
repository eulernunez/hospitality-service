<?php
require_once 'BaseSiteController.php';
class BlogController extends BaseSiteController
{

    public function init()
    {
        /* Initialize action controller here */
        parent::init();
    }

    public function indexAction()
    {
        // action body
        $id = (int)$this->_getParam('id');
        $repository = new Application_Model_Repository_Statement();
        $publication = $repository->getPublication($id);

        $publications = $repository->getPublications();
        unset($publications[$id]);
        //die('0<pre>' . print_r($publication["0"], true) . '</pre>');

        $this->view->publication = $publication["0"];
        $this->view->publications = $publications;
    }

    public function indexOldAction()
    {

        // action body
        $ads = array();
        $id = (int)$this->_getParam('id');

        $repository = new Application_Model_Repository_Statement();
        $ads = $repository->getAd($id);

        // Get publications
        $publications = $repository->getPublications();
        
        //die('<pre>' . print_r($publications, true) . '</pre>');
        
        $advert = array();
        $pics = array();

        foreach($ads as $ad) {

            $advert["featured"] = array(

                "id" => $ad["id"],
                "room_type_id" => $ad["room_type_id"],
                "title_ad" => $ad["title_ad"], 
                "comments_ad" => $ad["comments_ad"],
                "address_ad" => $ad["address_ad"],
                "price_ad" => $ad["price_ad"],
                "bed_type_id" => $ad["bed_type_id"],
                "surface_type_id" => $ad["surface_type_id"],
                "persons_number_id" => $ad["persons_number_id"],
                "free_service_internet" => $ad["free_service_internet"],
                "free_service_wifi" => $ad["free_service_wifi"],
                "free_service_newspaper" => $ad["free_service_newspaper"],
                "free_service_breakfast_include" => $ad["free_service_breakfast_include"],
                "other_service_full_ac" => $ad["other_service_full_ac"],
                "other_service_private_balcony" => $ad["other_service_private_balcony"],
                "other_service_flat_screen_tv" => $ad["other_service_flat_screen_tv"],
                "other_service_room_service" => $ad["other_service_room_service"],
                "other_service_beach_view" => $ad["other_service_beach_view"]

            );
             
            $pics[$ad["pic"]] = $ad["file_name"];

        }
        
        $advert["pics"] = $pics;

        
        $this->view->ad = $advert;
        $this->view->publications = $publications;

    }
    
    
    public function listAction()
    {

       $repository = new Application_Model_Repository_Statement();
       $publications = $repository->getPublications();
       //die('PUBLICACIONES: <pre>' . print_r($publications, true) . '</pre>');
       $this->view->publications = $publications; 

    }

}

