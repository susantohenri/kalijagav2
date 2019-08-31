<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Struks extends MY_Model {

  function __construct () {
    parent::__construct();
    $this->table = 'struk';
    $this->thead = array(
      (object) array('mData' => 'orders', 'sTitle' => 'No', 'visible' => false),
      (object) array('mData' => 'nama', 'sTitle' => 'Jamaah', 'name' => 'jamaah.nama'),
      (object) array('mData' => 'bulan', 'sTitle' => 'Bulan', 'searchable' => false),
    );
    $this->form = array (
        array (
		      'name' => 'jamaah',
		      'label'=> 'Jamaah',
		      'options' => array(),
		      'width' => 2,
		      'attributes' => array(
		        array('data-autocomplete' => 'true'),
		        array('data-model' => 'Jamaahs'),
		        array('data-field' => 'nama')
			    )),
        array (
          'name' => 'total_diterima',
          'label'=> 'Total diterima',
          'attributes' => array(
            array('data-number' => 'true'),
          )),
          array (
            'name' => 'total_dibulatkan',
            'label'=> 'Total dibulatkan',
            'attributes' => array(
              array('data-number' => 'true'),
            )),
    );
    $this->childs = array (
        array (
				      'label' => 'Detail',
				      'controller' => 'StrukDetail',
				      'model' => 'StrukDetails'
					  ),
    );
  }

  function dt () {
    $this->datatables
      ->select("{$this->table}.uuid")
      ->select("{$this->table}.orders")
      ->select('jamaah.nama')
      ->select("DATE_FORMAT(tanggal, '%b %Y') bulan", false)
      ->join('jamaah', "jamaah.uuid = {$this->table}.jamaah", 'left')
      ->join('jatahdesa', "jatahdesa.uuid = {$this->table}.jatahdesa", 'left')
      ;
    return parent::dt();
  }

  function save ($data)
  {
    unset($data['total_diterima']);
    return parent::save($data);
  }

  function findOne ($param)
  {
    $found = parent::findOne($param);
    $total = $this->db->query("
      SELECT FORMAT(SUM(diterima), 0) diterima,
      FORMAT(SUM(dibulatkan), 0) dibulatkan
      FROM strukdetail WHERE struk = '{$found['uuid']}'
    ")->row_array();
    $found['total_diterima'] = $total['diterima'];
    $found['total_dibulatkan'] = $total['dibulatkan'];
    return $found;
  }

}