<?php

/*
 * 
 */
class Application_Model_Repository_Statement
{

    protected $system;

    public function __construct()
    {
        $this->system = Application_Model_System_System::getInstance( );
    }

    public function fetchServiceDirectorySubCategory($categorySystemName) 
    {

        $select = $this->system->getDbObject( )
                ->select(array(''))
                ->from(array('service_category_2' => 'service_category'))
                ->joinLeft(array('service_category' => 'service_category'), 'service_category_2.parent = service_category.id ', array())
                ->where('service_category.system_name = ?', $categorySystemName);

        $stmt = $select->query( );

        $results = $stmt->fetchAll( );

        return $results;
    }

    public function fetchDateAnuncio()
    {
        $query = "SELECT rent_date FROM anuncios WHERE NOT ISNULL(rent_date)";
        $stmt = $this->system->getDbObject( )->query( $query );
        $results = $stmt->fetchAll( );
        $dates = array();
        foreach($results as $date){
            //$dates = array('rentDate' => date("d m Y",strtotime($date['rent_date'])));
            $dates[] = date("d m Y",strtotime($date['rent_date']));
        }
        
        return $dates;
    }        
    
    public function fetchAllUser( )
    {
        $query = "SELECT u.id,
                         u.cif,
                         u.nombre_comercial, 
                         u.contacto, 
                         u.contacto_apellidos,
                         u.correo_electronico,
                         u.codigo_postal, 
                         u.direccion,
                         m.nombre As municipio,
                         p.nombre As provincia,
                         u.telefono,
                         u.movil, 
                         u.web, u.fecha_alta, u.estado, u.tipo_usuario_id
                  FROM usuarios AS u
                            LEFT JOIN municipio AS m ON u.municipio_id = m.id  
                            LEFT JOIN provincia AS p ON u.provincia_id = p.id";

        $this->system->getDbObject( )->setFetchMode(Zend_Db::FETCH_NUM); // Zend_Db::FETCH_ASSOC
        $stmt = $this->system->getDbObject( )->query( $query );
        
        return $stmt->fetchAll( );
    }
    
    public function fetchAllAds($state)
    {

        $query = "SELECT
                        ad.id,
                        ad.room_type_id,
                        ad.title_ad,
                        ad.comments_ad,
                        ad.address_ad,
                        ad.price_ad,
                        ad.bed_type_id,
                        ad.surface_type_id,
                        ad.persons_number_id,
                        ad.free_service_internet,
                        ad.free_service_wifi,
                        ad.free_service_newspaper,
                        ad.free_service_breakfast_include,
                        ad.other_service_full_ac,
                        ad.other_service_private_balcony,
                        ad.other_service_flat_screen_tv,
                        ad.other_service_room_service,
                        ad.other_service_beach_view,
                        p.id AS pic,
                        p.file_name,
                        p.file_ext,
                        p.section_id
                        FROM anuncios AS ad INNER JOIN pics AS p ON ad.id = p.ad_id
                                         WHERE p.section_id=1 AND ad.active = $state";
        
        
        
        $stmt = $this->system->getDbObject()->query($query);
        //die('<pre>' . print_r($stmt,true) . '</pre>'); 
        
        $ads = $stmt->fetchAll();
       
        return $ads;

    }

    
    /* ENLAZAR el archivo PDF IBI*/
    
    public function getAd($id, $filter = null)
    {
        if(null == $filter) {
            $filter = 'p.section_id=2 AND';
        } else {
            $filter = '';
        }

        
        $query = "SELECT
                        ad.id,
                        ad.owner_id,
                        ad.room_type_id,
                        ad.title_ad,
                        ad.comments_ad,
                        ad.address_ad,
                        ad.price_ad,
                        ad.bed_type_id,
                        ad.surface_type_id,
                        ad.persons_number_id,
                        ad.free_service_internet,
                        ad.free_service_wifi,
                        ad.free_service_newspaper,
                        ad.free_service_breakfast_include,
                        ad.other_service_full_ac,
                        ad.other_service_private_balcony,
                        ad.other_service_flat_screen_tv,
                        ad.other_service_room_service,
                        ad.other_service_beach_view,
                        ad.zip,
                        ad.city,
                        ad.country,
                        p.id AS pic,
                        p.file_name,
                        p.file_ext,
                        p.section_id,
                        o.telephone,
                        o.email,
                        i.id AS ibi,
                        i.file_name AS pdf_name,
                        i.file_ext AS pdf_ext
                        FROM anuncios AS ad INNER JOIN pics AS p ON ad.id = p.ad_id
                                            INNER JOIN ibis AS i ON ad.id = i.ad_id    
                                            INNER JOIN owners AS o ON ad.owner_id = o.id
                                            WHERE $filter ad.id= '" . $id  ."'";
        
        $stmt = $this->system->getDbObject()->query($query);
        $ads = $stmt->fetchAll();

        return $ads;

    }            
    
    public function getAdForBooking($id)
    {
        
        $query = "SELECT
                        ad.id,
                        ad.owner_id,
                        ad.room_type_id,
                        ad.title_ad,
                        ad.comments_ad,
                        ad.address_ad,
                        ad.price_ad,
                        ad.bed_type_id,
                        ad.surface_type_id,
                        ad.persons_number_id,
                        ad.free_service_internet,
                        ad.free_service_wifi,
                        ad.free_service_newspaper,
                        ad.free_service_breakfast_include,
                        ad.other_service_full_ac,
                        ad.other_service_private_balcony,
                        ad.other_service_flat_screen_tv,
                        ad.other_service_room_service,
                        ad.other_service_beach_view,
                        ad.zip,
                        ad.city,
                        ad.country,
                        ad.gasto_tramite,
                        ad.fianza,
                        o.telephone,
                        o.email
                        FROM anuncios AS ad INNER JOIN owners AS o ON ad.owner_id = o.id
                                            WHERE ad.id= '" . $id  ."'";
        
        $stmt = $this->system->getDbObject()->query($query);
        $ads = $stmt->fetchAll();

        return $ads;

    }            
    
    
    
    
    
    
    
    
    
    
    public function fetchOwners()
    {
        
        $query = "SELECT
            ow.id,
            ow.name FROM owners AS ow WHERE ow.active=1";
        
        $stmt = $this->system->getDbObject()->query($query);
        $owners = $stmt->fetchAll();        
        
        return $owners;
        
    }

}

