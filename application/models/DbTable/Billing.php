<?php
class Application_Model_DbTable_Billing extends Zend_Db_Table_Abstract
{

    protected $_name = 'billing';

    protected $campos =  array(
        'billing_name' => 'billingName',
        'billing_document' => 'billingDocument',
        'billing_phone' => 'billingPhone',
        'billing_address' => 'billingAddress',
        'billing_zip' => 'billingZip',
        'billing_city' => 'billingCity',
        'billing_provincia' => 'billingProvincia',
        'billing_country' => 'billingCountry',
        'created_date' => 'createdDate',
        'active' => 'active',
//        'anuncio_id' => 'anuncioId'
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