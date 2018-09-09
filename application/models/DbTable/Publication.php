<?php
class Application_Model_DbTable_Publication extends Zend_Db_Table_Abstract 
{

    protected $_name = 'publications';

    protected $campos =  array(
                'category_id' => 'category-id', 
                'title_publication' => 'title-publication',
                'contenido_publication' => 'contenido-publication',
                'contenido_publication_2' => 'contenido-publication-2',
                'blockquote' => 'blockquote',
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
        
        foreach($params['tags-publication'] as $value) {

            $this->getValueTagsPublication($value);

        }
        
       
        $this->insert($this->campos);

        return $this->getAdapter()->lastInsertId();

    }

    public function getValueTagsPublication($value)
    {

        switch ($value) {
            case 1:
                $this->campos['tag_vacaciones'] = '1';
                break;
            case 2:
                $this->campos['tag_playas'] = '1';
                break;
            case 3:
                $this->campos['tag_resort_caribenyos'] = '1';
                break;
            case 4:
                $this->campos['tag_hoteles'] = '1';
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