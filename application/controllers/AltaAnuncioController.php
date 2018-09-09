<?php
require_once 'BaseSiteController.php';
class AltaAnuncioController extends BaseSiteController
{

    public function init()
    {
        /* Initialize action controller here */
        parent::init();
    }

    public function indexAction()
    {
        // action body
        // TODO:
        // Relacionar los propietarios

        $repository = new Application_Model_Repository_Statement();
        $owners = $repository->fetchOwners();

        //die ('$owners: <pre>' . print_r($owners, true) . '</pre>');

        $this->view->selected = $this->createOwnersSelect($owners);

    }

    public function guardarAction()
    {

        $post = $this->getRequest()->getPost();

        $post['active'] = '1';
        $post['created-date'] = date("Y-m-d H:i:s");
        $anuncio = new Application_Model_DbTable_Anuncio();
        $lastInsertId = $anuncio->agregar($post);

        die('$lastInsertId: <pre>' . print_r($lastInsertId, true) . '</pre>');

    }

    public function saveAdAction()
    {

        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $post = $this->getRequest()->getPost();
        $post['active'] = '0';
        $post['created-date'] = date("Y-m-d H:i:s");
        $anuncio = new Application_Model_DbTable_Anuncio();
        $lastInsertId = $anuncio->agregar($post);

        # SESSION
        $session = new Zend_Session_Namespace('adId');
        $session->id = $lastInsertId;

        //$filesUploadForm = "<div style='width: 500px; height: 200px; border: 2px solid red;'></div>";
        //$this->view->headLink( )->appendStylesheet($this->view->baseUrl( ) . '/css/uploadify/uploadify.css');
        //$this->view->headScript( )->appendFile($this->view->baseUrl( ) . '/js/uploadify/jquery.uploadify.min.js', $type = 'text/javascript', $attrs = array());

        $filesUploadForm = $this->view->partial('partials/alta-anuncio/upload-pics.phtml');

        echo $filesUploadForm;

    }

    public function executeUploadPicAction()
    {

        $this->view->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $userId = $this->system->getLoggedInUser()->getId();
        $basicPathPic = $this->system->getConfig()->path->pics->anuncios;
        $session = new Zend_Session_Namespace('adId');
        $adId = $session->id;

        $this->setFolder($userId, $adId);
        $targetFolderOriginal = $basicPathPic . '/' . $userId . '/' . $adId . '/home';

        $verifyToken = md5('unique_salt' . $_POST['timestamp']);

        if (!empty($_FILES) && $_POST['token'] == $verifyToken) {

            $tempFile = $_FILES['Filedata']['tmp_name'];
            $nameArchivo = '/' . $_FILES['Filedata']['name'];
            
            $targetFileOriginal = rtrim($targetFolderOriginal,'/') . $nameArchivo;
            $fileTypes = array('jpg','jpeg','gif','png'); 
            $fileParts = pathinfo($_FILES['Filedata']['name']);
            if (in_array(strtolower($fileParts['extension']),$fileTypes)) {
                move_uploaded_file($tempFile,$targetFileOriginal);
                
                $formData['fileName'] = $_FILES['Filedata']['name'];
                $formData['fileExt'] = $fileParts['extension'];
                $formData['sectionId'] = '1';
                $formData['adId'] = $adId;
                //$formData['anuncioId'] = $_SESSION['anuncioId'];
                $modelo = new Application_Model_DbTable_Pic();
                $modelo->agregar($formData);
                
                echo '1';
                
            } else {
                echo 'Invalid file type.'; 
            }

        }

        return true;

    }

    public function updateUploadPicAction()
    {

        $this->view->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $adId = (int)$this->_getParam('id');
       
        
        /* HARDCORE 57 */
//      $userId = $this->system->getLoggedInUser()->getId();
        $userId = 57;
        $basicPathPic = $this->system->getConfig()->path->pics->anuncios;
       
        $this->setFolder($userId, $adId);
        $targetFolderOriginal = $basicPathPic . '/' . $userId . '/' . $adId . '/home';

        $verifyToken = md5('unique_salt' . $_POST['timestamp']);

        if (!empty($_FILES) && $_POST['token'] == $verifyToken) {

            $tempFile = $_FILES['Filedata']['tmp_name'];
            $nameArchivo = '/' . $_FILES['Filedata']['name'];
            
            $targetFileOriginal = rtrim($targetFolderOriginal,'/') . $nameArchivo;
            $fileTypes = array('jpg','jpeg','gif','png'); 
            $fileParts = pathinfo($_FILES['Filedata']['name']);
            if (in_array(strtolower($fileParts['extension']),$fileTypes)) {
                move_uploaded_file($tempFile,$targetFileOriginal);
                
                $formData['fileName'] = $_FILES['Filedata']['name'];
                $formData['fileExt'] = $fileParts['extension'];
                $formData['sectionId'] = '1';
                $formData['adId'] = $adId;
                $handler = new Application_Model_Repository_Statement();
                $handler->delete($adId);
                $handler->actualizarFileHome($adId);
                
                $modelo = new Application_Model_DbTable_Pic();
                $modelo->agregar($formData);
                
                echo '1';
                
            } else {
                echo 'Invalid file type.'; 
            }

        }

        return true;

    }
    
    
    
    
    
    public function setFolder($userId, $adId)
    {

        $basicPathPic = $this->system->getConfig( )->path->pics->anuncios;
        $folderDestino = $basicPathPic . '/' . $userId ;
        $folderAd = $folderDestino . '/' . $adId ;
        $folderDestinoHome = $folderAd . '/' . 'home' ;
        $folderDestinoPdfIbi = $folderAd . '/' . 'ibi' ;
        $folderDestinoGallery = $folderAd . '/' . 'gallery' ;
        $folderDestinoThumbnail = $folderAd . '/' . 'thumbnail' ;
        
        if (file_exists($folderDestino)) {
        } else {
                mkdir($folderDestino, 0777 );
                chmod($folderDestino, 0777);
        }
        
        if (file_exists($folderAd)) {
        } else {
                mkdir($folderAd, 0777 );
                chmod($folderAd, 0777);
        }
        
        if(file_exists($folderDestinoHome)){
        } else { 
                mkdir($folderDestinoHome, 0777 );
                chmod($folderDestinoHome, 0777);
        }

        if(file_exists($folderDestinoPdfIbi)){
        } else { 
                mkdir($folderDestinoPdfIbi, 0777 );
                chmod($folderDestinoPdfIbi, 0777);
        }

        if(file_exists($folderDestinoGallery)){
        } else { 
                mkdir($folderDestinoGallery, 0777 );
                chmod($folderDestinoGallery, 0777);
        }

        if( file_exists($folderDestinoThumbnail)){
        } else { 
                mkdir($folderDestinoThumbnail, 0777);
                chmod($folderDestinoThumbnail, 0777);
        }

        return true;

    }
    
    public function executeUploadGalleryPicsAction()
    {

        $this->view->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $userId = $this->system->getLoggedInUser()->getId();
        $basicPathPic = $this->system->getConfig()->path->pics->anuncios;

        $session = new Zend_Session_Namespace('adId');
        $adId = $session->id;
        $this->setFolder($userId, $adId);

        $targetFolderGallery = $basicPathPic . '/' . $userId . '/' . $adId . '/gallery';
        $targetFolderThumbnail = $basicPathPic . '/' . $userId . '/' . $adId . '/thumbnail';
        $verifyToken = md5('unique_salt' . $_POST['timestamp']);

        if (!empty($_FILES) && $_POST['token'] == $verifyToken) {

            $tempFile = $_FILES['Filedata']['tmp_name'];
            $nameArchivo = '/' . $_FILES['Filedata']['name'];

            $targetFileGallery = rtrim($targetFolderGallery,'/') . $nameArchivo;
            $fileTypes = array('jpg','jpeg','gif','png'); 
            $fileParts = pathinfo($_FILES['Filedata']['name']);
            if (in_array(strtolower($fileParts['extension']),$fileTypes)) {
                move_uploaded_file($tempFile,$targetFileGallery);

                $targetFileThumbnail = rtrim($targetFolderThumbnail,'/') . $nameArchivo;
                $resizeThumbnail = new Application_Model_System_ImagenResize($targetFileGallery);
                $resizeThumbnail->resizeImage(116, 80, 'crop');
                $resizeThumbnail->saveImage($targetFileThumbnail, 100);

                $formData['fileName'] = $_FILES['Filedata']['name'];
                $formData['fileExt'] = $fileParts['extension'];
                $formData['sectionId'] = '2';
                $formData['adId'] = $adId;
                //$formData['anuncioId'] = $_SESSION['anuncioId'];
                $modelo = new Application_Model_DbTable_Pic();
                $modelo->agregar($formData);

                echo '1';

            } else {

                echo 'Invalid file type.'; 

            }

        }

        return true;
        
        
    }
    

    public function updateUploadGalleryPicsAction()
    {

        $this->view->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        
        $basicPathPic = $this->system->getConfig()->path->pics->anuncios;

        $adId = (int)$this->_getParam('id');
        $pic = (int)$this->_getParam('pic');
        
        
        /* HARDCORE 57 */
//      $userId = $this->system->getLoggedInUser()->getId();
        $userId = 57;

        
        $this->setFolder($userId, $adId);

        $targetFolderGallery = $basicPathPic . '/' . $userId . '/' . $adId . '/gallery';
        $targetFolderThumbnail = $basicPathPic . '/' . $userId . '/' . $adId . '/thumbnail';
        $verifyToken = md5('unique_salt' . $_POST['timestamp']);

        if (!empty($_FILES) && $_POST['token'] == $verifyToken) {

            $tempFile = $_FILES['Filedata']['tmp_name'];
            $nameArchivo = '/' . $_FILES['Filedata']['name'];

            $targetFileGallery = rtrim($targetFolderGallery,'/') . $nameArchivo;
            $fileTypes = array('jpg','jpeg','gif','png'); 
            $fileParts = pathinfo($_FILES['Filedata']['name']);
            if (in_array(strtolower($fileParts['extension']),$fileTypes)) {
                move_uploaded_file($tempFile,$targetFileGallery);

                $targetFileThumbnail = rtrim($targetFolderThumbnail,'/') . $nameArchivo;
                $resizeThumbnail = new Application_Model_System_ImagenResize($targetFileGallery);
                $resizeThumbnail->resizeImage(116, 80, 'crop');
                $resizeThumbnail->saveImage($targetFileThumbnail, 100);

                $formData['fileName'] = $_FILES['Filedata']['name'];
                $formData['fileExt'] = $fileParts['extension'];
                $formData['sectionId'] = '2';
                $formData['adId'] = $adId;
                
                $handler = new Application_Model_Repository_Statement();
                $handler->deleteGallery($pic);
                
                
                $modelo = new Application_Model_DbTable_Pic();
                $modelo->agregar($formData);

                echo '1';

            } else {

                echo 'Invalid file type.'; 

            }

        }

        return true;
        
        
    }
    
    
    
    

    public function createOwnersSelect($owners)
    {

        $select = "<select id='owner-id' name='owner-id' class='form-control' title='Seleccione al propietario' data-header='Propietarios'>";

        foreach($owners as $owner) {
            $select .= "<option value='" . $owner["id"] .  "' data-subtext=''>" . $owner["name"] . "</option>";
        }

        $select .= "</select>";

        return $select;

    }

    
    public function executeUploadIbiAction()
    {
        
        $this->view->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $userId = $this->system->getLoggedInUser()->getId();
        $basicPathPic = $this->system->getConfig()->path->pics->anuncios;
        $session = new Zend_Session_Namespace('adId');
        $adId = $session->id;

        $this->setFolder($userId, $adId);
        $targetFolderOriginal = $basicPathPic . '/' . $userId . '/' . $adId . '/ibi';

        $verifyToken = md5('unique_salt' . $_POST['timestamp']);

        if (!empty($_FILES) && $_POST['token'] == $verifyToken) {

            $tempFile = $_FILES['Filedata']['tmp_name'];
            $nameArchivo = '/' . $_FILES['Filedata']['name'];

            $targetFileOriginal = rtrim($targetFolderOriginal,'/') . $nameArchivo;
            $fileTypes = array('pdf','doc','docx'); 
            $fileParts = pathinfo($_FILES['Filedata']['name']);
            if (in_array(strtolower($fileParts['extension']),$fileTypes)) {
                move_uploaded_file($tempFile,$targetFileOriginal);

                $formData['fileName'] = $_FILES['Filedata']['name'];
                $formData['fileExt'] = $fileParts['extension'];
                $formData['adId'] = $adId;
                $modelo = new Application_Model_DbTable_Ibi();
                $modelo->agregar($formData);

                echo '1';
                
            } else {
                echo 'Invalid file type.'; 
            }

        }

        return true;
        
        
    }
    
    
    
    
}

