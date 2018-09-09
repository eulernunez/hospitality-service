<?php
/* 
 * 
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
                ad.url,
                ad.comments_ad,
                ad.address_ad,
                ad.price_ad,
                ad.surface_type_id,
                ad.persons_number_id,
                ad.file_home,
                ad.titulo_enlace,
                ad.titulo_imagen,
                ad.titulo_alt,
                p.id AS pic,
                p.file_name,
                p.file_ext,
                p.section_id
                FROM anuncios AS ad INNER JOIN pics AS p ON ad.id = p.ad_id
                                 WHERE p.section_id=1 AND ad.active = $state ORDER BY ad.created_date DESC";
        //die('<pre>' . print_r($query, true) . '</pre>'); 
        $stmt = $this->system->getDbObject()->query($query);
        //die('<pre>' . print_r($stmt,true) . '</pre>'); 
        
        $ads = $stmt->fetchAll();
       
        return $ads;

    }

    public function fetchAllAdsWithoutOne($id)
    {

        $query = "SELECT
                ad.id,
                ad.room_type_id,
                ad.title_ad,
                ad.comments_ad,
                ad.address_ad,
                ad.price_ad,
                ad.surface_type_id,
                ad.persons_number_id,
                ad.file_home,
                ad.titulo_enlace,
                ad.titulo_imagen,
                ad.titulo_alt,
                p.id AS pic,
                p.file_name,
                p.file_ext,
                p.section_id
                FROM anuncios AS ad INNER JOIN pics AS p ON ad.id = p.ad_id
                                 WHERE p.section_id=1 AND ad.active = 1 AND ad.id<>$id ORDER BY ad.created_date DESC LIMIT 0,2 ";
        //die('<pre>' . print_r($query, true) . '</pre>'); 
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
                        ad.*,
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
        //die('$query: <pre>' . print_r($query, true) . '</pre>');
        $stmt = $this->system->getDbObject()->query($query);
        $ads = $stmt->fetchAll();

        return $ads;

    }            
    
    public function getPublications()
    {

        $publications = array();
        $query = "SELECT p.id AS publicationId, p.*, pp.* 
                        FROM publications AS p 
                        INNER JOIN publication_pics AS pp 
                        ON p.id = pp.publication_id 
                        WHERE p.active = 1";
        
        $stmt = $this->system->getDbObject()->query($query);
        $results = $stmt->fetchAll();
        
        foreach($results as $item){
            
            $publications[$item["publicationId"]] = $item;
        }
        
        return $publications;
        
        
        
    }
    
    public function getComentarios($id)
    {

        $query = "SELECT
                    c.id AS commentId, c.*,
                    b.id AS bookingId, b.*,
                    a.id AS anuncioId, a.*
                    FROM comentarios AS c 
                        INNER JOIN booking AS b ON b.id = c.cliente_id
                        INNER JOIN anuncios AS a ON a.id = c.anuncio_id
                        WHERE c.anuncio_id= '" . $id  . "' AND c.activo = '1'";
        //die('$query: <pre>' . print_r($query, true) . '</pre>');
        $stmt = $this->system->getDbObject()->query($query);
        $comments = $stmt->fetchAll();

        return $comments;

    }
    
    public function getPublication($id)
    {

        $query = "SELECT p.id AS publicationId, p.*, pp.* 
                        FROM publications AS p 
                        INNER JOIN publication_pics AS pp 
                        ON p.id = pp.publication_id 
                        WHERE p.id = '" . $id . "' AND p.active = 1";

        //die('<pre>' . print_r($query, true) . '</pre>');

        $stmt = $this->system->getDbObject()->query($query);
        $publication = $stmt->fetchAll();

        return $publication;

    }


    
    
    
    
    
    public function getAdForBooking($id)
    {
        
        $query = "SELECT
                        ad.*,
                        o.telephone,
                        o.email
                        FROM anuncios AS ad 
                        INNER JOIN owners AS o ON ad.owner_id = o.id
                                            WHERE ad.id= '" . $id  ."'";
        
        $stmt = $this->system->getDbObject()->query($query);
        $ads = $stmt->fetchAll();

        return $ads;

    }            
    
    public function getBooking($id)
    {
        
        $query = "SELECT
                        b.*
                        FROM booking AS b 
                        WHERE b.id= '" . $id  ."'";
        
        $stmt = $this->system->getDbObject()->query($query);
        $book = $stmt->fetchAll();

        return $book;

    }            
    
    public function getBilling($id)
    {
        
        $query = "SELECT
                        b.*
                        FROM billing AS b 
                        WHERE b.id= '" . $id  ."'";
        
        $stmt = $this->system->getDbObject()->query($query);
        $book = $stmt->fetchAll();

        return $book;

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

    public function getAllGalleryPics($adId)
    {

        $query = "SELECT
            p.id,
            p.file_name FROM pics AS p WHERE p.ad_id=". $adId . " AND p.section_id=2";

        $stmt = $this->system->getDbObject()->query($query);
        $owners = $stmt->fetchAll();        

        return $owners;
 
    }

    
    
    

    public function delete($id)
    {
         $query = "DELETE FROM pics WHERE ad_id = '" . $id . "' AND section_id = '1'";
         $this->system->getDbObject( )->query( $query );
         
         return true;
    }

    public function deleteGallery($id)
    {
         $query = "DELETE FROM pics WHERE id = '" . $id . "'" ;
         $this->system->getDbObject( )->query( $query );
         
         return true;
    }
    
    public function actualizarFileHome($id)
    {
        $query = "UPDATE anuncios SET file_home= '' WHERE id = '" . $id . "'";
        $this->system->getDbObject( )->query( $query );
        
        return true;

    }
    
    
    
    public function desactivarAd($id)
    {
        $query = "UPDATE anuncios SET active='0' WHERE id = '" . $id . "'";
        $this->system->getDbObject( )->query( $query );
        
        return true;
    }

    public function getPicByAdId($id)
    {

        $query = "SELECT
            p.*
            FROM pics AS p 
            WHERE p.ad_id= '" . $id  ."' AND p.section_id='1'";

        $stmt = $this->system->getDbObject()->query($query);
        $pic = $stmt->fetchAll();

        return $pic;

    }

    public function getSections($id)
    {

        $query = "SELECT
            s.*,
            sc.*,
            c.*
            FROM settings AS s
            INNER JOIN sections AS sc ON s.section_id = sc.id
            INNER JOIN comerciales AS c ON s.comercial_id = c.id
            WHERE s.comercial_id= '" . $id  ."' AND s.active = '1'";

        $stmt = $this->system->getDbObject()->query($query);
        $sections = $stmt->fetchAll();

        return $sections;

    }

    public function getPlaces($id)
    {

        $query = "SELECT
            s.*,
            p.*,
            c.*
            FROM settings AS s
            INNER JOIN places AS p ON s.place_id = p.id
            INNER JOIN comerciales AS c ON s.comercial_id = c.id
            WHERE s.comercial_id= '" . $id  ."' AND s.active = '1'";

        //die('<pre>' . print_r($query, true) . '</pre>');
        
        $stmt = $this->system->getDbObject()->query($query);
        $sections = $stmt->fetchAll();

        return $sections;

    }
    
    
    
    public function getSeoConfig()
    {

        $query = "SELECT 
            s.*
            FROM seo AS s WHERE s.id = '1'";

        $stmt = $this->system->getDbObject()->query($query);
        $config = $stmt->fetchAll();

        return $config;

    }    
    
     public function getCleanUrls()
     {

        $query = "SELECT id, url FROM anuncios";
        $stmt = $this->system->getDbObject( )->query( $query );
        $resultados = $stmt->fetchAll( );
         
        return $resultados;

     }
    
    
}

