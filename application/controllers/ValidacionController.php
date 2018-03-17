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
        $repository = new Application_Model_Repository_Statement();
        $ads = $repository->getAd($id, 'all');

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
            'title_ad' => $ads["0"]["title_ad"],
            'comments_ad' => $ads["0"]["comments_ad"],
            'address_ad' => $ads["0"]["address_ad"],
            'price_ad' => $ads["0"]["price_ad"],
            'bed_type_id' => $ads["0"]["bed_type_id"],
            'surface_type_id' => $ads["0"]["surface_type_id"],
            'persons_number_id' => $ads["0"]["persons_number_id"],
            'free_service_internet' => $ads["0"]["free_service_internet"],
            'free_service_wifi' => $ads["0"]["free_service_wifi"],
            'free_service_newspaper' => $ads["0"]["free_service_newspaper"],
            'free_service_breakfast_include' => $ads["0"]["free_service_breakfast_include"],
            'other_service_full_ac' => $ads["0"]["other_service_full_ac"],
            'other_service_private_balcony' => $ads["0"]["other_service_private_balcony"],
            'other_service_flat_screen_tv' => $ads["0"]["other_service_flat_screen_tv"],
            'other_service_room_service' => $ads["0"]["other_service_room_service"],
            'other_service_beach_view' => $ads["0"]["other_service_beach_view"],
            'zip' => $ads["0"]["zip"],
            'city' => $ads["0"]["city"],
            'country' => $ads["0"]["country"],
            'telephone' => $ads["0"]["telephone"],
            'email' => $ads["0"]["email"],
            'pics' => $pics,
            'ibi' => $ibi
        );

        //die('$dataForm: <pre>' . print_r($dataForm, true) . '</pre>');

        $ownerId = (int)$ads["0"]["owner_id"];
        
        $this->view->selected = $this->createOwnersSelect($owners, $ownerId);
        $this->view->dataForm = $dataForm;

    }

    public function validationAdAction()
    {

        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
        $post = $this->getRequest()->getPost();

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



}

