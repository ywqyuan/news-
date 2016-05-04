<?php
/**
 * controller ���� ����controller ����Ҫ�̳и���
 * Created by PhpStorm.
 * User: xm001
 * Date: 2016/5/4
 * Time: 10:02
 */

class BaseController extends  CI_Controller{

    protected $pagesize = 10;
    protected $view_data = null;    //��ͼ����
    protected $mod = null;
    protected $act = null;
    protected $page = null;
    protected $title = '';

    public function __construct(){

        parent::__construct();

        $this->load->helper(array('url','BaseException'));
        $this->load->library('session');
        $this->mod = strtolower($this->uri->rsegment(1));
        $this->act = strtolower($this->uri->rsegment(2));
        //replace 'action', 'do'
        $action = preg_replace('/(.*)action$/', '$1', $this->act);
        $this->act = $action;
        $action = preg_replace('/^do(.*)/', '$1', $action);
        $this->optKey = $this->mod . "." . $action;
        $this->view_data = array(
            'js' => array(),    //����JS
            'css' => array(),    //
            'mod' => $this->mod,
        );
    }

}