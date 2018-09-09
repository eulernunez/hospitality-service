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

        $post['anuncio'] = $anuncio;

        # SESSION
        $session = new Zend_Session_Namespace('adId');
        $session->id = $lastInsertId;

        //$filesUploadForm = "<div style='width: 500px; height: 200px; border: 2px solid red;'><pre>" . print_r($post,true) . "</pre></div>";

        $filesUploadForm = $this->view->partial('partials/booking/booking.phtml',$post);

        echo $filesUploadForm;

    }


    public function datosFacturacionAction() 
    {
    
        $post = $this->getRequest()->getPost();
        $post['active'] = '1';
        $post['createdDate'] = date("Y-m-d H:i:s");
        $post['bookingCountry'] = 0;
        $post['bookingRoomtype'] = 0;
        $post['bookingComments'] = '';
        $post['bookingDocument'] = '';

        
        $book = new Application_Model_DbTable_Booking();
        $lastInsertId = $book->agregar($post);
        $post['id'] = $lastInsertId;
        
        $this->view->anuncioId = (int)$post['anuncioId'];
        $this->view->bookingId = (int)$lastInsertId;

    }

    
    
    public function reservaAction()
    {

        $post = $this->getRequest()->getPost();

        $post['active'] = '1';
        $post['createdDate'] = date("Y-m-d H:i:s");
        
        $bill = new Application_Model_DbTable_Billing();
        $lastInsertId = $bill->agregar($post);
        
        $post['billingId'] = $lastInsertId;        
        
        $anuncioId = (int)$post['anuncioId'];
        $bookingId = (int)$post['bookingId'];
        $handler = new Application_Model_Repository_Statement();
        
        $book = $handler->getBooking($bookingId);
        $post['id'] = $book['0']['id'];
        $post['bookingName'] = $book['0']['booking_name'];
        $post['bookingDocument'] = $book['0']['booking_document'];
        $post['bookingEmail'] = $book['0']['booking_email'];
        $post['bookingPhone'] = $book['0']['booking_phone'];
        $post['bookingCheckin'] = $book['0']['booking_checkin'];
        $post['bookingCheckout'] = $book['0']['booking_checkout'];
        
        $bookingCheckin  = $post['bookingCheckin'];
        $bookingCheckout = $post['bookingCheckout'];

        $interval = $this->diferenciaDiasFromDataBase($bookingCheckin, $bookingCheckout);

        $post['interval'] = $interval;

        
        $anuncio = $handler->getAdForBooking($anuncioId);
        
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

    public function diferenciaDiasFromDataBase($checkIn, $checkOut)
    {

        $datetime1 = new DateTime($checkIn);
        $datetime2 = new DateTime($checkOut);  
        $interval = $datetime1->diff($datetime2);

        //echo $interval->format('%R%a días');
        return $interval->format('%a');

    }

    
    
    public function reservaAceptadaAction()
    {
        
        $handler = new Application_Model_Repository_Statement();
       
        $postParams = $this->getRequest()->getPost();
        $bill = array();
        $book = array();
        $pic = array();
        $anuncio = array(); 
        $interval = 0;
        
        if(isset ($postParams['anuncioId'])){
            $anuncioId = (int)$postParams['anuncioId'];
            $anuncio = $handler->getAdForBooking($anuncioId);
            $pic = $handler->getPicByAdId($anuncioId);    
        }
        if(isset ($postParams['bookingId'])){
            $bookingId = (int)$postParams['bookingId'];
            $book = $handler->getBooking($bookingId);
            $interval = $this->diferenciaDiasFromDataBase($book['0']['booking_checkin'], $book['0']['booking_checkout']);
        }
        if(isset ($postParams['billingId'])){
            $billingId = (int)$postParams['billingId'];
            $bill = $handler->getBilling($billingId);
        }

        
        
        
        

        

        $post['bill'] = $bill;
        $post['book'] = $book;
        $post['pic'] = $pic;
        $post['book']['0']['interval'] = $interval;
        $post['anuncio'] = $anuncio;

        $body = $this->view->partial('booking-form/booking-email.phtml', $post);
        
        $params = array();
        $params['mensaje'] = $body;
        $params['para']   = $postParams['email'];
        $params['asunto'] = 'Reserva';

        $sender = new Application_Model_System_System();
        try {
            $sender->sendEmail($params);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
            echo $exc->getMessage();
        }

    }
    

}
