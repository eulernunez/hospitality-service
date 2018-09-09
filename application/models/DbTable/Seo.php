<?php
class Application_Model_DbTable_Seo extends Zend_Db_Table_Abstract 
{

    protected $_name = 'seo';

    protected $campos =  array(
                'title' => 'page-title', 
                'description' => 'meta-description',
                'keywords' => 'meta-keywords',
                'author' => 'meta-author');

    public function listar()
    {

        return $this->fetchAll();

    }

    public function agregar($params)
    {
        
        foreach( $this->campos as $key => $value ) {

           if(empty($params[$value])) {
               return false;
           }
           $this->campos[$key] = $params[$value];

        }
        
        //$this->insert($this->campos);
        $this->update($this->campos, 'id = ' . (int)'1');
        
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