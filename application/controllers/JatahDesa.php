<?php defined('BASEPATH') OR exit('No direct script access allowed');

class JatahDesa extends MY_Controller {

	function __construct ()
	{
		$this->model = 'JatahDesas';
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
		  'form-jatahdesa.js'
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
		  'form-jatahdesa.js'
		);
		$this->loadview('index', $vars);
	  }

}