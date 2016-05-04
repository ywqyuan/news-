<?php
/**
 * controller 基类 其他controller 都需要继承该类
 * Created by PhpStorm.
 * User: xm001
 * Date: 2016/5/4
 * Time: 10:02
 */

class AccountBaseController extends  CI_Controller{

    protected $pagesize = 10;
    protected $view_data = null;    //视图数据
    protected $mod = null;
    protected $act = null;
    protected $content = null;     //视图页面

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
        //检查登录状态, 开发时可先注释关掉
        $this->user_name = $this->checkLoginStatus();

        $this->view_data = array(
            'js' => array(),    //加载JS
            'css' => array(),    //加载CSS
            'mod' => $this->mod,
        );
    }

    /**
     * 检查登录状态
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