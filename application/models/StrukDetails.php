<?php defined('BASEPATH') OR exit('No direct script access allowed');

class StrukDetails extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'strukdetail';
    $this->thead = array(
      (object) array('mData' => 'orders', 'sTitle' => 'No', 'visible' => false),
      (object) array('mData' => 'struk', 'sTitle' => 'Struk'),

    );
    $this->form = array (
        array (
        'name' => 'infaq',
        'label'=> 'Infaq',
        'options' => array(),
        'width' => 3,
        'attributes' => array(
          array('data-autocomplete' => 'true'),
          array('data-model' => 'Infaqs'),
          array('data-field' => 'nama')
        )),

        array (
		      'name' => 'dijatah',
		      'label'=> 'Dijatah',
		      'width' => 2,
		      'attributes' => array(
		        array('data-number' => 'true')
			    )),
        array (
		      'name' => 'dibulatkan',
		      'label'=> 'Dibulatkan',
		      'width' => 2,
		      'attributes' => array(
		        array('data-number' => 'true')
			    )),
        array (
		      'name' => 'diterima',
		      'label'=> 'Diterima',
		      'width' => 2,
		      'attributes' => array(
		        array('data-number' => 'true')
			    )),
    );
    $this->childs = array (
    );
  }

  function save ($data)
  {
    unset($data['infaq']);
    return parent::save($data);
  }

  function findOne ($param)
  {
    $found = parent::findOne($param);
    if ($found)
    {
      $infaq = $this->db->query("
        SELECT infaq.uuid FROM infaq RIGHT JOIN jatahdesadetail ON infaq.uuid = jatahdesadetail.infaq WHERE jatahdesadetail.uuid = '{$found['jatahDesaDetail']}'
      ")->row_array();
      $found['infaq'] = $infaq['uuid'];
    }
    return $found;
  }

  function dt () {
    $this->datatables
      ->select("{$this->table}.uuid")
      ->select("{$this->table}.orders")
      ->select('strukdetail.struk');
    return parent::dt();
  }

}