<?php
class Application_Model_DbTable_Ibi extends Zend_Db_Table_Abstract
{

    protected $_name = 'ibis';

    protected $campos = array(
                            'file_name' => 'fileName',
                            'file_ext' => 'fileExt',
                            'ad_id' => 'adId');

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