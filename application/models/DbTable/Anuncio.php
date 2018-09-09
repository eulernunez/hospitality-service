<?php
class Application_Model_DbTable_Anuncio extends Zend_Db_Table_Abstract 
{

    protected $_name = 'anuncios';

    protected $campos =  array(
                'owner_id' => 'owner-id', 
                'room_type_id' => 'room-type-id',
                'alojamiento_id' => 'alojamiento-id',
                'title_ad' => 'title-ad',
                'comments_ad' => 'comments-ad',
                'address_ad' => 'address-ad',
                'zip' => 'zip',
                'city' => 'city',
                'provincia' => 'provincia',        
                'country' => 'country',
                'price_ad' => 'price-ad',
                'big_room_id' => 'big-room-id',
                'middle_room_id' => 'middle-room-id',
                'individually_room_id' => 'individually-room-id',
                'big_bed_id' => 'big-bed-id',
                'middle_bed_id' => 'middle-bed-id',
                'sofabed_id' => 'sofabed-id',
                'childrens-number-id' => 'childrens-number-id',
//              'bed_type_id' => 'bed-type-id',
                'surface_type_id' => 'surface-type-id',
                'persons_number_id' => 'persons-number-id',
//              'free_service_internet' => '',
//              'free_service_wifi' => '',
//              'free_service_newspaper' => '',
//              'free_service_breakfast_include' => '',
//              'other_service_full_ac' => '',
//              'other_service_private_balcony' => '',
//              'other_service_flat_screen_tv' => '',
//              'other_service_room_service' => '',
//              'other_service_beach_view' => ''
                'condiciones_uso' => 'condiciones-uso',
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
        
//        if(isset($params['tipo-huespedes'])) {
//            foreach($params['tipo-huespedes'] as $value) {
//
//                $this->getValueTipoHuesped($value);
//
//            }
//        }
        
//        if(isset($params['tipo-habitaciones'])) {
//            foreach($params['tipo-habitaciones'] as $value) {
//
//                $this->getValueTipoHabitacion($value);
//
//            }
//        }
        
//        if(isset($params['tipo-camas'])) {
//            foreach($params['tipo-camas'] as $value) {
//
//                $this->getValueTipoCama($value);
//
//            }
//        }
        
        if(isset($params['tipo-aseos'])) {
            foreach($params['tipo-aseos'] as $value) {

                $this->getValueTipoAseo($value);

            }
        }
        
        if(isset($params['otros-ambiente'])) {
            foreach($params['otros-ambientes'] as $value) {

                $this->getValueOtroAmbiente($value);

            }
        }
        
        

        if(isset($params['tipo-ocios'])) {
            foreach($params['tipo-ocios'] as $value) {

                $this->getValueTipoOcio($value);

            }
        }

        
        if(isset($params['servicios-cocina'])) {
            foreach($params['servicios-cocina'] as $value) {

                $this->getValueTipoServiciosCocina($value);

            }
        }
        
        
        if(isset($params['tipo-electrodomesticos'])) {
            foreach($params['tipo-electrodomesticos'] as $value) {

                $this->getValueTipoElectrodomestico($value);

            }
        }
        
        $this->campos['url'] = $this->sanitize($this->campos['title_ad']);
        
        $this->insert($this->campos);

        return $this->getAdapter()->lastInsertId();

    }

//    public function getValueTipoHuesped($value)
//    {
//        switch ($value) {
//            case 1:
//                $this->campos['tipo_huesped_familiar'] = '1';
//                break;
//            case 2:
//                $this->campos['tipo_huesped_persona_mayores'] = '1';
//                break;
//            case 3:
//                $this->campos['tipo_huesped_ninos'] = '1';
//                break;
//            case 4:
//                $this->campos['tipo_huesped_mascotas'] = '1';
//                break;
//        }
//    }

//    public function getValueTipoHabitacion($value)
//    {
//        switch ($value) {
//            case 1:
//                $this->campos['tipo_habitacion_grande'] = '1';
//                break;
//            case 2:
//                $this->campos['tipo_habitacion_mediana'] = '1';
//                break;
//            case 3:
//                $this->campos['tipo_habitacion_individual'] = '1';
//                break;
//        }
//    }
//
//    public function cleanValueTipoHabitacion()
//    {
//        $this->campos['tipo_habitacion_grande'] = '0';
//        $this->campos['tipo_habitacion_mediana'] = '0';
//        $this->campos['tipo_habitacion_individual'] = '0';
//    }
    
    
//    public function getValueTipoCama($value)
//    {
//        switch ($value) {
//            case 1:
//                $this->campos['tipo_cama_grande'] = '1';
//                break;
//            case 2:
//                $this->campos['tipo_cama_individual'] = '1';
//                break;
//            case 3:
//                $this->campos['tipo_cama_sofa_cama'] = '1';
//                break;
//        }
//    }
//
//    public function cleanValueTipoCama()
//    {
//        $this->campos['tipo_cama_grande'] = '0';
//        $this->campos['tipo_cama_individual'] = '0';
//        $this->campos['tipo_cama_sofa_cama'] = '0';
//    }


    public function getValueTipoAseo($value)
    {
        switch ($value) {
            case 1:
                $this->campos['tipo_aseo_bano_privado'] = '1';
                break;
            case 2:
                $this->campos['tipo_aseo_bano_compartido'] = '1';
                break;
            case 3:
                $this->campos['tipo_aseo_aseo'] = '1';
                break;
        }
    }

    public function cleanValueTipoAseo()
    {
        $this->campos['tipo_aseo_bano_privado'] = '0';
        $this->campos['tipo_aseo_bano_compartido'] = '0';
        $this->campos['tipo_aseo_aseo'] = '0';
    }

    public function getValueOtroAmbiente($value)
    {
        switch ($value) {
            case 1:
                $this->campos['otro_ambiente_balcon'] = '1';
                break;
            case 2:
                $this->campos['otro_ambiente_terraza'] = '1';
                break;
            case 3:
                $this->campos['otro_ambiente_zonas_comunes'] = '1';
                break;
        }
    }

    public function cleanValueOtroAmbiente()
    {
        $this->campos['otro_ambiente_balcon'] = '0';
        $this->campos['otro_ambiente_terraza'] = '0';
        $this->campos['otro_ambiente_zonas_comunes'] = '0';
    }
    
    
    public function getValueTipoOcio($value)
    {
        switch ($value) {
            case 1:
                $this->campos['tipo_ocio_confort_tv_pantalla_plana'] = '1';
                break;
            case 2:
                $this->campos['tipo_ocio_confort_aire_acondicionado'] = '1';
                break;
            case 3:
                $this->campos['tipo_ocio_confort_calefaccion'] = '1';
                break;
            case 4:
                $this->campos['tipo_ocio_confort_wifi'] = '1';
                break;
            case 5:
                $this->campos['tipo_ocio_confort_salon_compartido'] = '1';
                break;
            
        }
    }
    

    public function cleanValueTipoOcio()
    {
        $this->campos['tipo_ocio_confort_tv_pantalla_plana'] = '0';
        $this->campos['tipo_ocio_confort_aire_acondicionado'] = '0';
        $this->campos['tipo_ocio_confort_calefaccion'] = '0';
        $this->campos['tipo_ocio_confort_wifi'] = '0';
        $this->campos['tipo_ocio_confort_salon_compartido'] = '0';
    }
    
    public function getValueTipoServiciosCocina($value)
    {
        switch ($value) {
            case 1:
                $this->campos['servicios_cocina_compartida'] = '1';
                break;
            case 2:
                $this->campos['servicios_cocina_privada'] = '1';
                break;
            case 3:
                $this->campos['servicios_cocina_sin_servicio'] = '1';
                break;
            case 4:
                $this->campos['servicios_cocina_mascota'] = '1';
                break;
        }
    }
    
    public function cleanValueTipoServiciosCocina()
    {
        $this->campos['servicios_cocina_compartida'] = '0';
        $this->campos['servicios_cocina_privada'] = '0';
        $this->campos['servicios_cocina_sin_servicio'] = '0';
        $this->campos['servicios_cocina_mascota'] = '0';
    }
    
    public function getValueTipoElectrodomestico($value)
    {
        switch ($value) {
            case 1:
                $this->campos['tipo_electrodomestico_lavadora'] = '1';
                break;
            case 2:
                $this->campos['tipo_electrodomestico_frigorifico'] = '1';
                break;
            case 3:
                $this->campos['tipo_electrodomestico_encimera'] = '1';
                break;
            case 4:
                $this->campos['tipo_electrodomestico_horno'] = '1';
                break;
        }
    }
    
    public function cleanValueTipoElectrodomestico()
    {
        $this->campos['tipo_electrodomestico_lavadora'] = '0';
        $this->campos['tipo_electrodomestico_frigorifico'] = '0';
        $this->campos['tipo_electrodomestico_encimera'] = '0';
        $this->campos['tipo_electrodomestico_horno'] = '0';
        
    }
    
    
    public function editar($params)
    {

        unset($this->campos['owner_id']);
        unset($this->campos['created_date']);

        foreach( $this->campos as $key => $value ) {
            $this->campos[$key] = $params[$value];
        }

//        if(isset($params['tipo-habitaciones'])) {
//            foreach($params['tipo-habitaciones'] as $value) {
//                $this->getValueTipoHabitacion($value);
//            }
//        } elseif(!isset($params['tipo-habitaciones'])) {
//            $this->cleanValueTipoHabitacion();
//        }

//        if(isset($params['tipo-camas'])) {
//            foreach($params['tipo-camas'] as $value) {
//                $this->getValueTipoCama($value);
//            }
//        } elseif(!isset($params['tipo-camas'])) {
//            $this->cleanValueTipoCama();
//        }

        if(isset($params['tipo-aseos'])) {
            foreach($params['tipo-aseos'] as $value) {
                $this->getValueTipoAseo($value);
            }
        } elseif(!isset($params['tipo-aseos'])) {
            $this->cleanValueTipoAseo();
        }

        if(isset($params['otros-ambientes'])) {
            foreach($params['otros-ambientes'] as $value) {
                $this->getValueOtroAmbiente($value);
            }
        } elseif(!isset($params['otros-ambientes'])) {
            $this->cleanValueOtroAmbiente();
        }

        if(isset($params['tipo-ocios'])) {
            foreach($params['tipo-ocios'] as $value) {
                $this->getValueTipoOcio($value);
            }
        } elseif(!isset($params['tipo-ocios'])) {
            $this->cleanValueTipoOcio();
        }
        
        if(isset($params['servicios-cocina'])) {
            foreach($params['servicios-cocina'] as $value) {
                $this->getValueTipoServiciosCocina($value);
            }
        }elseif(!isset($params['servicios-cocina'])) {
            $this->cleanValueTipoServiciosCocina();
        }
        
        if(isset($params['tipo-electrodomesticos'])) {
            foreach($params['tipo-electrodomesticos'] as $value) {
                $this->getValueTipoElectrodomestico($value);
            }
        }elseif(!isset($params['tipo-electrodomesticos'])) {
            $this->cleanValueTipoElectrodomestico();
        }
         
        $this->campos['gasto_tramite'] = $params['gastoTramite'];
        $this->campos['fianza'] = $params['fianza'];
        $this->campos['limpieza'] = $params['limpieza'];
        
        $this->campos['file_home'] = $params['file-home'];
        $this->campos['titulo_enlace'] = $params['titulo-enlace'];
        $this->campos['titulo_imagen'] = $params['titulo-imagen'];
        $this->campos['titulo_alt'] = $params['titulo-alt'];
        $this->campos['file_gallery1'] = $params['file-gallery1'];
        $this->campos['titulo_enlace1'] = $params['titulo-enlace1'];
        $this->campos['titulo_imagen1'] = $params['titulo-imagen1'];
        $this->campos['titulo_alt1'] = $params['titulo-alt1'];
        $this->campos['file_gallery2'] = $params['file-gallery2'];
        $this->campos['titulo_enlace2'] = $params['titulo-enlace2'];
        $this->campos['titulo_imagen2'] = $params['titulo-imagen2'];
        $this->campos['titulo_alt2'] = $params['titulo-alt2'];
        $this->campos['file_gallery3'] = $params['file-gallery3'];
        $this->campos['titulo_enlace3'] = $params['titulo-enlace3'];
        $this->campos['titulo_imagen3'] = $params['titulo-imagen3'];
        $this->campos['titulo_alt3'] = $params['titulo-alt3'];
        $this->campos['file_gallery4'] = $params['file-gallery4'];
        $this->campos['titulo_enlace4'] = $params['titulo-enlace4'];
        $this->campos['titulo_imagen4'] = $params['titulo-imagen4'];
        $this->campos['titulo_alt4'] = $params['titulo-alt4'];
        $this->campos['file_gallery5'] = $params['file-gallery5'];
        $this->campos['titulo_enlace5'] = $params['titulo-enlace5'];
        $this->campos['titulo_imagen5'] = $params['titulo-imagen5'];
        $this->campos['titulo_alt5'] = $params['titulo-alt5'];
        $this->campos['file_gallery6'] = $params['file-gallery6'];
        $this->campos['titulo_enlace6'] = $params['titulo-enlace6'];
        $this->campos['titulo_imagen6'] = $params['titulo-imagen6'];
        $this->campos['titulo_alt6'] = $params['titulo-alt6'];
        $this->campos['file_gallery7'] = $params['file-gallery7'];
        $this->campos['titulo_enlace7'] = $params['titulo-enlace7'];
        $this->campos['titulo_imagen7'] = $params['titulo-imagen7'];
        $this->campos['titulo_alt7'] = $params['titulo-alt7'];
        $this->campos['file_gallery8'] = $params['file-gallery8'];
        $this->campos['titulo_enlace8'] = $params['titulo-enlace8'];
        $this->campos['titulo_imagen8'] = $params['titulo-imagen8'];
        $this->campos['titulo_alt8'] = $params['titulo-alt8'];
        $this->campos['comments_slider'] = $params['comments-slider'];
        
        $this->campos['url'] = $this->sanitize($this->campos['title_ad']);
        
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
                        '/ñ|Ñ/' => 'n');

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