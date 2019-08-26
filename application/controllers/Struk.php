<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Struk extends MY_Controller {

	function __construct ()
	{
		$this->model = 'Struks';
		parent::__construct();
	}

  function create () {
    $model= $this->model;
    $vars = array();
    $vars['page_name'] = 'form';
    $vars['form']     = $this->$model->getForm();
    $vars['subform'] = $this->$model->getFormChild();
    $vars['uuid'] = '';
    $vars['js'] = array(
      'moment.min.js',
      'bootstrap-datepicker.js',
      'daterangepicker.min.js',
      'select2.full.min.js',
      'form-struk.js'
    );
    $this->loadview('index', $vars);
  }

  function read ($id) {
    $vars = array();
    $vars['page_name'] = 'form';
    $model = $this->model;
    $vars['form'] = $this->$model->getForm($id);
    $vars['subform'] = $this->$model->getFormChild($id);
    $vars['uuid'] = $id;
    $vars['js'] = array(
      'moment.min.js',
      'bootstrap-datepicker.js',
      'daterangepicker.min.js',
      'select2.full.min.js',
      'form-struk.js'
    );
    $this->loadview('index', $vars);
  }

}