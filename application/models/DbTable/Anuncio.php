<?php
class Application_Model_DbTable_Anuncio extends Zend_Db_Table_Abstract 
{

    protected $_name = 'anuncios';

    protected $campos =  array(
                'owner_id' => 'owner-id', 
                'room_type_id' => 'room-type-id',
                'title_ad' => 'title-ad',
                'comments_ad' => 'comments-ad',
                'address_ad' => 'address-ad',
                'zip' => 'zip',
                'city' => 'city',
                'country' => 'country',
                'price_ad' => 'price-ad',
                'bed_type_id' => 'bed-type-id',
                'surface_type_id' => 'surface-type-id',
                'persons_number_id' => 'persons-number-id',
//                        'free_service_internet' => '',
//                        'free_service_wifi' => '',
//                        'free_service_newspaper' => '',
//                        'free_service_breakfast_include' => '',
//                        'other_service_full_ac' => '',
//                        'other_service_private_balcony' => '',
//                        'other_service_flat_screen_tv' => '',
//                        'other_service_room_service' => '',
//                        'other_service_beach_view' => ''
                'created_date' => 'created-date',
                'active' => 'active'
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
        
        foreach($params['free-ads'] as $value) {

            $this->getValueFreeAds($value);

        }

        foreach($params['other-services-ads'] as $value) {
            
            $this->getValueOtherServicesAds($value);

        }
        
        $this->insert($this->campos);

        return $this->getAdapter()->lastInsertId();

    }

    public function getValueFreeAds($value)
    {

        switch ($value) {

            case 1:
                $this->campos['free_service_internet'] = '1';
                break;
            case 2:
                $this->campos['free_service_wifi'] = '1';
                break;
            case 3:
                $this->campos['free_service_newspaper'] = '1';
                break;
            case 4:
                $this->campos['free_service_breakfast_include'] = '1';
                break;

        }

    }


    public function getValueOtherServicesAds($value)
    {

        switch ($value) {

            case 1:
                $this->campos['other_service_full_ac'] = '1';
                break;
            case 2:
                $this->campos['other_service_private_balcony'] = '1';
                break;
            case 3:
                $this->campos['other_service_flat_screen_tv'] = '1';
                break;
            case 4:
                $this->campos['other_service_room_service'] = '1';
                break;
            case 5:
                $this->campos['other_service_beach_view'] = '1';
                break;

        }


    }
    
    
    
    
    
    
    
    public function editar($params)
    {

        unset($this->campos['owner_id']);
        unset($this->campos['created_date']);
        
        foreach( $this->campos as $key => $value ) {
            $this->campos[$key] = $params[$value];
        }


        $this->campos['gasto_tramite'] = $params['gastoTramite'];
        $this->campos['fianza'] = $params['fianza'];
        
        $this->update($this->campos, 'id = ' . (int) $params['id']);

        return true;

    }

    
    
    public function sanitize($cadena)
    {

        $patron = array(
                        '/à|á|â|ã|ä|å|æ/' => 'a',
                        '/À|Á|Â|Ã|Ä|Å|Æ/' => 'A',
                        '/è|é|ê|ë|ð/' => 'e',
                        '/È|É|Ê|Ë|Ð/' => 'E',
                        '/ì|í|î|ï/' => 'i',
                        '/Ì|Í|Î|Ï/' => 'I',
                        '/ò|ó|ô|õ|ö|ø|º/' => 'o',
                        '/Ò|Ó|Ô|Õ|Ö|Ø/' => 'O',
                        '/ù|ú|û|ü/' => 'u',
                        '/Ù|Ú|Û|Ü/' => 'U',
                        '/ /' => '-',
                        '/ñ|Ñ/' => 'n',
                       );

       $cadena = preg_replace(array_keys($patron),array_values($patron),$cadena);

       return strtolower($cadena);

    }


    
    
    public function validate()
    {
        # Set this value
        # Set friendly url´s

        return true;

    }

}