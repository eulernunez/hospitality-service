<?php
require_once 'BaseSiteController.php';
class ValidacionController extends BaseSiteController
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
        $flag = (int)$this->_getParam('flag');

        $repository = new Application_Model_Repository_Statement();
        $ads = $repository->getAd($id, 'all');
        //die('$dataForm: <pre>' . print_r($ads, true) . '</pre>');
        $owners = $repository->fetchOwners();

        $pics = array();
        foreach ($ads as $ad) {
            $pics[] = array(
            'file_name' => $ad['file_name'],
            'section_id' => $ad['section_id']);
        }

        $ibi = array('file_name' => $ads["0"]["pdf_name"]);

        $dataForm = array(
            'id' => $ads["0"]["id"],
            'owner_id' => $ads["0"]["owner_id"],
            'room_type_id' => $ads["0"]["room_type_id"],
            "alojamiento_id" => $ads["0"]["alojamiento_id"],
            'title_ad' => $ads["0"]["title_ad"],
            'comments_ad' => $ads["0"]["comments_ad"],
            'address_ad' => $ads["0"]["address_ad"],
            'price_ad' => $ads["0"]["price_ad"],
            'surface_type_id' => $ads["0"]["surface_type_id"],
            'persons_number_id' => $ads["0"]["persons_number_id"],
            "childrens-number-id" => $ad["childrens-number-id"],
            'tipo_aseo_bano_privado' => $ads["0"]["tipo_aseo_bano_privado"],
            'tipo_aseo_bano_compartido' => $ads["0"]["tipo_aseo_bano_compartido"],
            'tipo_aseo_aseo' => $ads["0"]["tipo_aseo_aseo"],
            'otro_ambiente_balcon' => $ads["0"]["otro_ambiente_balcon"],
            'otro_ambiente_terraza' => $ads["0"]["otro_ambiente_terraza"],
            'otro_ambiente_zonas_comunes' => $ads["0"]["otro_ambiente_zonas_comunes"],
            'tipo_ocio_confort_tv_pantalla_plana' => $ads["0"]["tipo_ocio_confort_tv_pantalla_plana"],
            'tipo_ocio_confort_aire_acondicionado' => $ads["0"]["tipo_ocio_confort_aire_acondicionado"],
            'tipo_ocio_confort_calefaccion' => $ads["0"]["tipo_ocio_confort_calefaccion"],
            'tipo_ocio_confort_wifi' => $ads["0"]["tipo_ocio_confort_wifi"],
            'tipo_ocio_confort_salon_compartido' => $ads["0"]["tipo_ocio_confort_salon_compartido"],
            'servicios_cocina_compartida' => $ads["0"]["servicios_cocina_compartida"],
            'servicios_cocina_privada' => $ads["0"]["servicios_cocina_privada"],
            'servicios_cocina_sin_servicio' => $ads["0"]["servicios_cocina_sin_servicio"],
            'servicios_cocina_mascota' => $ads["0"]["servicios_cocina_mascota"],
            "big_room_id" => $ads["0"]["big_room_id"],
            "middle_room_id" => $ads["0"]["middle_room_id"],
            "individually_room_id" => $ads["0"]["individually_room_id"],
            "big_bed_id" => $ads["0"]["big_bed_id"],
            "middle_bed_id" => $ads["0"]["middle_bed_id"],
            "sofabed_id" => $ads["0"]["sofabed_id"],
//            'tipo_habitacion_grande' => $ads["0"]["tipo_habitacion_grande"],
//            'tipo_habitacion_mediana' => $ads["0"]["tipo_habitacion_mediana"],
//            'tipo_habitacion_individual' => $ads["0"]["tipo_habitacion_individual"],

//            'tipo_cama_grande' => $ads["0"]["tipo_cama_grande"],
////            'tipo_cama_mediana' => $ads["0"]["tipo_cama_mediana"],
//            'tipo_cama_individual' => $ads["0"]["tipo_cama_individual"],
//            'tipo_cama_sofa_cama' => $ads["0"]["tipo_cama_sofa_cama"],
            'tipo_electrodomestico_lavadora' => $ads["0"]["tipo_electrodomestico_lavadora"],
            'tipo_electrodomestico_frigorifico' => $ads["0"]["tipo_electrodomestico_frigorifico"],
            'tipo_electrodomestico_encimera' => $ads["0"]["tipo_electrodomestico_encimera"],
            'tipo_electrodomestico_horno' => $ads["0"]["tipo_electrodomestico_horno"],
            'fianza' => $ads["0"]["fianza"],
            'limpieza' => $ads["0"]["limpieza"],
            'zip' => $ads["0"]["zip"],
            'city' => $ads["0"]["city"],
            'provincia' => $ads["0"]["provincia"],
            'country' => $ads["0"]["country"],
            'telephone' => $ads["0"]["telephone"],
            'email' => $ads["0"]["email"],
            'pics' => $pics,
            'ibi' => $ibi,
            'condiciones_uso' => $ads["0"]["condiciones_uso"],
            'file_home'=> $ads["0"]['file_home'],
            'titulo_enlace' => $ads["0"]['titulo_enlace'],
            'titulo_imagen' => $ads["0"]['titulo_imagen'],
            'titulo_alt' => $ads["0"]['titulo_alt'],
            'file_gallery1' => $ads["0"]['file_gallery1'],
            'titulo_enlace1' => $ads["0"]['titulo_enlace1'],
            'titulo_imagen1' => $ads["0"]['titulo_imagen1'],
            'titulo_alt1' => $ads["0"]['titulo_alt1'],
            'file_gallery2' => $ads["0"]['file_gallery2'],
            'titulo_enlace2' => $ads["0"]['titulo_enlace2'],
            'titulo_imagen2' => $ads["0"]['titulo_imagen2'],
            'titulo_alt2' => $ads["0"]['titulo_alt2'],
            'file_gallery3' => $ads["0"]['file_gallery3'],
            'titulo_enlace3' => $ads["0"]['titulo_enlace3'],
            'titulo_imagen3' => $ads["0"]['titulo_imagen3'],
            'titulo_alt3' => $ads["0"]['titulo_alt3'],
            'file_gallery4' => $ads["0"]['file_gallery4'],
            'titulo_enlace4' => $ads["0"]['titulo_enlace4'],
            'titulo_imagen4' => $ads["0"]['titulo_imagen4'],
            'titulo_alt4' => $ads["0"]['titulo_alt4'],
            'file_gallery5' => $ads["0"]['file_gallery5'],
            'titulo_enlace5' => $ads["0"]['titulo_enlace5'],
            'titulo_imagen5' => $ads["0"]['titulo_imagen5'],
            'titulo_alt5' => $ads["0"]['titulo_alt5'],
            'file_gallery6' => $ads["0"]['file_gallery6'],
            'titulo_enlace6' => $ads["0"]['titulo_enlace6'],
            'titulo_imagen6' => $ads["0"]['titulo_imagen6'],
            'titulo_alt6' => $ads["0"]['titulo_alt6'],
            'file_gallery7' => $ads["0"]['file_gallery7'],
            'titulo_enlace7' => $ads["0"]['titulo_enlace7'],
            'titulo_imagen7' => $ads["0"]['titulo_imagen7'],
            'titulo_alt7' => $ads["0"]['titulo_alt7'],
            'file_gallery8' => $ads["0"]['file_gallery8'],
            'titulo_enlace8' => $ads["0"]['titulo_enlace8'],
            'titulo_imagen8' => $ads["0"]['titulo_imagen8'],
            'titulo_alt8' => $ads["0"]['titulo_alt8'],
            'comments_slider' => $ads["0"]['comments_slider']            
        );

        //die('$dataForm: <pre>' . print_r($dataForm, true) . '</pre>');

        $ownerId = (int)$ads["0"]["owner_id"];

        $this->view->selected = $this->createOwnersSelect($owners, $ownerId);
        $this->view->dataForm = $dataForm;
        $this->view->flag = $flag;
    }

    public function validationAdAction()
    {

        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
        $post = $this->getRequest()->getPost();

        $this->renamePic($post["id"], $post["file-home-hidden"], $post["file-home"]);
        $this->renameGalleryPic($post);
        
        $post['active'] = '1';
        $anuncio = new Application_Model_DbTable_Anuncio();
        
        $anuncio->editar($post);

        # SESSION
        //$session = new Zend_Session_Namespace('adId');
        //$session->id = $lastInsertId;

        //$filesUploadForm = "<div style='width: 500px; height: 200px; border: 2px solid red;'></div>";
        //$this->view->headLink( )->appendStylesheet($this->view->baseUrl( ) . '/css/uploadify/uploadify.css');
        //$this->view->headScript( )->appendFile($this->view->baseUrl( ) . '/js/uploadify/jquery.uploadify.min.js', $type = 'text/javascript', $attrs = array());

        //$filesUploadForm = $this->view->partial('partials/alta-anuncio/upload-pics.phtml');

        $result = "<div style='width: 500px; height: 200px; border: 2px solid red;'>Validado</div>";

        echo $result;

    }

    
    public function createOwnersSelect($owners, $ownerId)
    {

        $select = "<select id='owner-id' name='owner-id' class='form-control' title='Seleccione al propietario' data-header='Propietarios' disabled>";

        foreach($owners as $owner) {

            if($owner["id"] == $ownerId) {
                $selected = 'selected';
            } else {
                $selected = '';
            }
                
            $select .= "<option value='" . $owner["id"] .  "' data-subtext='' $selected>" . $owner["name"] . "</option>";
        }

        $select .= "</select>";

        return $select;

    }


    public function changeImageAction()
    {

        $adId = (int)$this->_getParam('id');
        $repository = new Application_Model_Repository_Statement();
        $pics = $repository->getAllGalleryPics($adId);

        $this->view->gallery = $this->createGallerySelect($pics);
        $this->view->id = $adId;

    }



    public function createGallerySelect($pics)
    {

        $select = "<select id='gallery' name='gallery' class='form-control' title='Seleccione la imagen a cambiar' data-header='Imagenes de la galleria'>";

        foreach($pics as $pic) {
            $select .= "<option value='" . $pic["id"] .  "' data-subtext=''>" . $pic["file_name"] . "</option>";
        }

        $select .= "</select>";

        return $select;

    }

    public function desactivarAction()
    {
        $adId = (int)$this->_getParam('id');
        
        $repository = new Application_Model_Repository_Statement();
        $repository->desactivarAd($adId);
        
        $this->_response->setRedirect($this->view->baseUrl() . '/')
                            ->sendResponse();
    }

    public function renamePic($id, $original, $new, $target = '/home/') {

        if($original==$new) {

            return true;

        } else {

            $basicPathPic = $this->system->getConfig()->path->pics->anuncios;
            $pathPic = $basicPathPic . '/57/' . $id . $target;

            $original = $pathPic . $original;
            $new = $pathPic . $new;

            rename($original, $new);

        }
        
        return true;
        
    }
    
    public function renameGalleryPic($post) {

        $id = $post["id"]; 

        for ($x=1; $x<9; $x++) {
            $this->renamePic($id, $post["file-gallery-hidden$x"], $post["file-gallery$x"], "/gallery/" );
            $this->renamePic($id, $post["file-gallery-hidden$x"], $post["file-gallery$x"], "/thumbnail/" );
        }

        return true;

    }
    
    
    
    
}

