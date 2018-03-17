<?php

class BookingFormController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $id = (int)$this->_getParam('id');
        //die('<pre>' . print_r($id, true) . '</pre>');
        $this->view->id = $id;
    }


    public function saveBookAction()
    {

        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $post = $this->getRequest()->getPost();
        //die('POST: <pre>' . print_r($post, true) . '</pre>');
        $post['active'] = '1';
        $post['createdDate'] = date("Y-m-d H:i:s");
        $post['bookingRoomtype'] = 0;

        $book = new Application_Model_DbTable_Booking();
        $lastInsertId = $book->agregar($post);

        $anuncioId = (int)$post['anuncioId'];

        $bookingCheckin  = $post['bookingCheckin'];
        $bookingCheckout = $post['bookingCheckout'];

        $interval = $this->diferenciaDias($bookingCheckin, $bookingCheckout);

        $post['interval'] = $interval;

        $handler = new Application_Model_Repository_Statement();
        $anuncio = $handler->getAdForBooking($anuncioId);

        //die('ANUNCIO: <pre>' . print_r($anuncio,true) . '</pre>');
        
        $post['anuncio'] = $anuncio;

        # SESSION
        $session = new Zend_Session_Namespace('adId');
        $session->id = $lastInsertId;

        //$filesUploadForm = "<div style='width: 500px; height: 200px; border: 2px solid red;'><pre>" . print_r($post,true) . "</pre></div>";

        $filesUploadForm = $this->view->partial('partials/booking/booking.phtml',$post);

        echo $filesUploadForm;

    }

    
    /*
     * CONTINUAR CON EL POST EN EL NUEVO FORMULARIO
     * 
     */

    public function reservaAction()
    {

        $post = $this->getRequest()->getPost();

        $post['active'] = '1';
        $post['createdDate'] = date("Y-m-d H:i:s");
        $post['bookingCountry'] = 0;
        $post['bookingRoomtype'] = 0;
        $post['bookingComments'] = '';

        $book = new Application_Model_DbTable_Booking();
        $lastInsertId = $book->agregar($post);

        $anuncioId = (int)$post['anuncioId'];

        $bookingCheckin  = $post['bookingCheckin'];
        $bookingCheckout = $post['bookingCheckout'];

        $interval = $this->diferenciaDias($bookingCheckin, $bookingCheckout);

        $post['interval'] = $interval;

        $handler = new Application_Model_Repository_Statement();
        $anuncio = $handler->getAdForBooking($anuncioId);
        //die('fast book: <pre>' . print_r($anuncio,true) . '</pre>');
        $post['anuncio'] = $anuncio;

        $this->view->post = $post;

    }

    public function diferenciaDias($checkIn, $checkOut)
    {

        $checkIn = date_format(date_create_from_format('d/m/Y', $checkIn), 'Y-m-d');
        $checkOut = date_format(date_create_from_format('d/m/Y', $checkOut), 'Y-m-d');

        $datetime1 = new DateTime($checkIn);
        $datetime2 = new DateTime($checkOut);  
        $interval = $datetime1->diff($datetime2);

        //echo $interval->format('%R%a días');
        return $interval->format('%a');

    }
    
    
    
    
    
    
    
    
    
    
}

