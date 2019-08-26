<?php defined('BASEPATH') OR exit('No direct script access allowed');

class StrukDetail extends MY_Controller {

	function __construct ()
	{
		$this->model = 'StrukDetails';
		parent::__construct();
	}

  function subformread ($uuid) {
    $data = array();
    $model = $this->model;
    $data['form'] = $this->$model->getForm($uuid, true);
    $data['subformlabel'] = $this->subformlabel;
    $data['controller'] = $this->controller;
    $data['uuid'] = $uuid;
    $data['item'] = $this->{$this->model}->findOne($uuid);
    $this->loadview('subform-strukdetail', $data);
  }

}