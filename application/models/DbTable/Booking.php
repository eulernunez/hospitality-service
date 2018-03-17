<?php
class Application_Model_DbTable_Booking extends Zend_Db_Table_Abstract
{

    protected $_name = 'booking';

    protected $campos =  array(
        'booking_name' => 'bookingName',
        'booking_document' => 'bookingDocument',
        'booking_email' => 'bookingEmail',
        'booking_phone' => 'bookingPhone',
        'booking_country' => 'bookingCountry',
        'booking_checkin' => 'bookingCheckin',
        'booking_checkout' => 'bookingCheckout',
        'booking_adults' => 'bookingAdults',
        'booking_children' => 'bookingChildren',
        'booking_roomtype' => 'bookingRoomtype',
        'booking_comments' => 'bookingComments',
        'created_date' => 'createdDate',
        'active' => 'active',
        'anuncio_id' => 'anuncioId'
    );

    public function listar()
    {

        return $this->fetchAll();

    }

    public function agregar($params)
    {

        foreach( $this->campos as $key => $value ) {
           $this->campos[$key] = $params[$value];
        }
        
        if(!empty ($this->campos['booking_checkin'])) {
        $this->campos['booking_checkin'] = 
                date_format(date_create_from_format('d/m/Y', $this->campos['booking_checkin']), 'Y-m-d');
        }
        
        if(!empty ($this->campos['booking_checkout'])) {
        $this->campos['booking_checkout'] = 
                date_format(date_create_from_format('d/m/Y', $this->campos['booking_checkout']), 'Y-m-d');
        }
        
        $this->insert($this->campos);

        return $this->getAdapter()->lastInsertId();

    }

    public function editar($params)
    {

        foreach( $this->campos as $key => $value ) {
           $this->campos[$key] = $params[$value] ;  
        }

        $this->update($this->campos, 'id = ' . (int) $params['id']);

        return true;

    }

    
    
 


}