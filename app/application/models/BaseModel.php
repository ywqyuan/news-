<?php
/**
 * model 基类
 * Created by PhpStorm.
 * User: xm001
 * Date: 2016/5/4
 * Time: 14:01
 */
class BaseModel extends CI_Model{

    protected $tableName = null;

    protected $primaryKey = 'id';


    public function __construct(){
        if(empty($this->tableName)){
            echo "don't set tableName";
            exit;
        }
        $this->load->helper(array('BaseException'));
        parent::__construct();
    }

    /**
     * 插入指定数据表
     * @param $data
     * @return bool
     */
    protected function insert($data){
        if(!is_array($data) || empty($data)){
            $message = array(
                'message' =>'argument must an array or not empty'
            );
            throwMessage($message);
        }
        $this->db->trans_start();
        $this->db->insert($this->tableName,$data);
        if ($this->db->trans_status() === FALSE)
        {
            log_message('error',$this->tableName.' 添加失败！');
            $this->db->trans_rollback();
            return false;
        }else{
            $this->db->trans_commit();
            return true;
        }
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id){
        if(empty($id)){
            $message = array(
                'message' =>'argument is empty'
            );
            throwMessage($message);
        }
        $this->db->trans_start();
        $this->db->where('id',$id);
        $this->db->delete($this->tableName);
        if ($this->db->trans_status() === FALSE)
        {
            log_message('error',$this->tableName.' id='.$id.' 删除失败！');
            $this->db->trans_rollback();
            return false;
        }else{
            $this->db->trans_commit();
            return true;
        }
    }
}