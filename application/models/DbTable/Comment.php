<?php
class Application_Model_DbTable_Comment extends Zend_Db_Table_Abstract
{

    protected $_name = 'comentarios';
    //bbdd => form
    protected $campos =  array(

        'tipo_turismo' => 'travel-type',
        'puntaje' => 'point',
        'cliente_id' => 'client-id',
        'anuncio_id' => 'anuncio-id',
        'comentario' => 'comment',
        'fecha' => 'fecha',
        'activo' => 'activo',
        

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