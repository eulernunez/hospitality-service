<?php
class Application_Model_DbTable_PublicationPic extends Zend_Db_Table_Abstract
{

    protected $_name = 'publication_pics';

    protected $campos = array(
                            'file_name' => 'fileName',
                            'file_ext' => 'fileExt',
                            'publication_id' => 'publicationId');

    public function listar()
    {
        return $this->fetchAll();
    }

    public function agregar($params)
    {

        foreach($this->campos as $key => $value) {
           $this->campos[$key] = $params[$value];  
        }

        $this->campos['state'] = '1';
        $this->insert($this->campos);

    }

}