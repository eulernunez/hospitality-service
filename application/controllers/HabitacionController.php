<?php
require_once 'BaseSiteController.php';
class HabitacionController extends BaseSiteController
{

    public function init()
    {
        /* Initialize action controller here */
        parent::init();
    }

    public function indexAction()
    {
        // action body
        $ads = array();

        $id = (int)$this->_getParam('id');

        $repository = new Application_Model_Repository_Statement();
        $ads = $repository->getAd($id);

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

        //die('<pre>' . print_r($advert, true) . '</pre>');
        $this->view->ad = $advert;

    }

}

