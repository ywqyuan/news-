<?php
/**
 * controller ���� ����controller ����Ҫ�̳и���
 * Created by PhpStorm.
 * User: xm001
 * Date: 2016/5/4
 * Time: 10:02
 */

class AccountBaseController extends  CI_Controller{

    protected $pagesize = 10;
    protected $view_data = null;    //��ͼ����
    protected $mod = null;
    protected $act = null;
    protected $content = null;     //��ͼҳ��

    public function __construct(){

        parent::__construct();

        $this->load->helper('url');
        $this->load->library('session');
        $this->mod = strtolower($this->uri->rsegment(1));
        $this->act = strtolower($this->uri->rsegment(2));
        //replace 'action', 'do'
        $action = preg_replace('/(.*)action$/', '$1', $this->act);
        $this->act = $action;
        $action = preg_replace('/^do(.*)/', '$1', $action);
        $this->optKey = $this->mod . "." . $action;
        //����¼״̬, ����ʱ����ע�͹ص�
        $this->user_name = $this->checkLoginStatus();

        $this->view_data = array(
            'js' => array(),    //����JS
            'css' => array(),    //����CSS
            'mod' => $this->mod,
        );
    }

    /**
     * ����¼״̬
     */
    private function checkLoginStatus()
    {

        if (empty($_SESSION['user_name'])) {
            header('Location:/Welcome');
            die();
        }
        return $_SESSION;
    }

}