<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'BaseController.php';
class Welcome extends BaseController {

	public function __construct(){

		parent::__construct();
	}

	public function index()
	{
		$this->page = 'welcome_message';
		$this->title = '首页--';
		$this->view_data['title'] = '首页--';
		$this->view_data['message'] = '网站首页';
		$this->load->view('base',$this->view_data);
	}
	public function test(){
		$array = array(
			'message' =>'exception throw'
		);
		throwMessage($array);
	}
}
