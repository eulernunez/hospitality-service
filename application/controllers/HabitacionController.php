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
        //die('<pre>' . print_r($ads, true) . '</pre>');
        $allAdsWithoutOne = $repository->fetchAllAdsWithoutOne($id);

        // Get publications
        $publications = $repository->getPublications();

        // Get comments
        $comments = $repository->getComentarios($id);
        //die('<pre>' . print_r($comments, true) . '</pre>');
        $advert = array();
        $pics = array();

        $contador = 1;
        foreach($ads as $ad) {

            $advert["featured"] = array(
                "id" => $ad["id"],
                "room_type_id" => $ad["room_type_id"],
                "alojamiento_id" => $ad["alojamiento_id"],
                "title_ad" => $ad["title_ad"], 
                "comments_ad" => $ad["comments_ad"],
                "address_ad" => $ad["address_ad"],
                "comments_slider" => $ad["comments_slider"],
                "price_ad" => $ad["price_ad"],
                "surface_type_id" => $ad["surface_type_id"],
                "persons_number_id" => $ad["persons_number_id"],
                "childrens-number-id" => $ad["childrens-number-id"],
                "big_room_id" => $ad["big_room_id"],
                "middle_room_id" => $ad["middle_room_id"],
                "individually_room_id" => $ad["individually_room_id"],
                "big_bed_id" => $ad["big_bed_id"],
                "middle_bed_id" => $ad["middle_bed_id"],
                "sofabed_id" => $ad["sofabed_id"],

//                'tipo_huesped_familiar' => $ad["tipo_huesped_familiar"],
//                'tipo_huesped_persona_mayores' => $ad["tipo_huesped_persona_mayores"],
//                'tipo_huesped_ninos' => $ad["tipo_huesped_ninos"],
//                'tipo_huesped_mascotas' => $ad["tipo_huesped_mascotas"],

//                'tipo_habitacion_grande' => $ad["tipo_habitacion_grande"],
//                'tipo_habitacion_mediana' => $ad["tipo_habitacion_mediana"],
//                'tipo_habitacion_individual' => $ad["tipo_habitacion_individual"],

//                'tipo_cama_grande' => $ad["tipo_cama_grande"],
//                'tipo_cama_individual' => $ad["tipo_cama_individual"],
//                'tipo_cama_sofa_cama' => $ad["tipo_cama_sofa_cama"],
                
                'tipo_aseo_bano_privado' => $ad["tipo_aseo_bano_privado"],
                'tipo_aseo_bano_compartido' => $ad["tipo_aseo_bano_compartido"],
                'tipo_aseo_aseo' => $ad["tipo_aseo_aseo"],
                'otro_ambiente_balcon' => $ad["otro_ambiente_balcon"],
                'otro_ambiente_terraza' => $ad["otro_ambiente_terraza"],
                'otro_ambiente_zonas_comunes' => $ad["otro_ambiente_zonas_comunes"],
                'tipo_ocio_confort_tv_pantalla_plana' => $ad["tipo_ocio_confort_tv_pantalla_plana"],
                'tipo_ocio_confort_aire_acondicionado' => $ad["tipo_ocio_confort_aire_acondicionado"],
                'tipo_ocio_confort_calefaccion' => $ad["tipo_ocio_confort_calefaccion"],
                'tipo_ocio_confort_wifi' => $ad["tipo_ocio_confort_wifi"],
                'tipo_ocio_confort_salon_compartido' => $ad["tipo_ocio_confort_salon_compartido"],
                'servicios_cocina_compartida' => $ad["servicios_cocina_compartida"],
                'servicios_cocina_privada' => $ad["servicios_cocina_privada"],
                'servicios_cocina_sin_servicio' => $ad["servicios_cocina_sin_servicio"],
                'servicios_cocina_mascota' => $ad["servicios_cocina_mascota"],
                'tipo_electrodomestico_lavadora' => $ad["tipo_electrodomestico_lavadora"],
                'tipo_electrodomestico_frigorifico' => $ad["tipo_electrodomestico_frigorifico"],
                'tipo_electrodomestico_encimera' => $ad["tipo_electrodomestico_encimera"],
                'tipo_electrodomestico_horno' => $ad["tipo_electrodomestico_horno"],
                'titulo_enlace1' => $ad["titulo_enlace1"],
                'titulo_imagen1' => $ad["titulo_imagen1"],
                'titulo_alt1' => $ad["titulo_alt1"],
                'titulo_enlace2' => $ad["titulo_enlace2"],
                'titulo_imagen2' => $ad["titulo_imagen2"],
                'titulo_alt2' => $ad["titulo_alt2"],
                'titulo_enlace3' => $ad["titulo_enlace3"],
                'titulo_imagen3' => $ad["titulo_imagen3"],
                'titulo_alt3' => $ad["titulo_alt3"],
                'titulo_enlace4' => $ad["titulo_enlace4"],
                'titulo_imagen4' => $ad["titulo_imagen4"],
                'titulo_alt4' => $ad["titulo_alt4"],
                'titulo_enlace5' => $ad["titulo_enlace5"],
                'titulo_imagen5' => $ad["titulo_imagen5"],
                'titulo_alt5' => $ad["titulo_alt5"],
                'titulo_enlace6' => $ad["titulo_enlace6"],
                'titulo_imagen6' => $ad["titulo_imagen6"],
                'titulo_alt6' => $ad["titulo_alt6"],
                'titulo_enlace7' => $ad["titulo_enlace7"],
                'titulo_imagen7' => $ad["titulo_imagen7"],
                'titulo_alt7' => $ad["titulo_alt7"],
                'titulo_enlace8' => $ad["titulo_enlace8"],
                'titulo_imagen8' => $ad["titulo_imagen8"],
                'titulo_alt8' => $ad["titulo_alt8"]

            );
            
            $pics[$ad["pic"]] = (empty($ad["file_gallery" . $contador]))?$ad["file_name"]:$ad["file_gallery" . $contador];
            $contador++;
        }

        $advert["pics"] = $pics;

        //die('$advert: <pre>' . print_r($comments,true) . '</pre>');
        
        $this->view->ad = $advert;
        $this->view->publications = $publications;
        $this->view->allAdsWithoutOne = $allAdsWithoutOne;
        $this->view->comments = $comments;
    }

}

