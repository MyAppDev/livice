<?php
class Daily_dummy_log_model extends CI_Model {

    var $id   = null;       // AI用設定
    var $user = '';
    var $heartbeat = '';
    var $calories    = '';
    var $elevation = '';
    var $blood = '';
    var $speed = '';
    var $created = '';

    function __construct()
    {
        // Model クラスのコンストラクタを呼び出す
        parent::__construct();
    }

    /** 生成したデータを書き込む */
    function insert_daily_dummy_data($data){
      $this->user = $data['user'];
      $this->heartbeat = $data['heartbeat'];
      $this->calories  = $data['calories'];
      $this->elevation = $data['elevation'];
      $this->blood = $data['blood'];
      $this->speed = $data['speed'];
      $this->created = $data['created'];

      $this->db->insert('daily_dummy_log', $this);
    }

    /** 最新のデータを取得する */
    function get_latest_data(){
        //$this->db->select_max('id');

        // SELECT * FROM 'dummy_log' where id = (select MAX(id) from 'dummy_log');
        $query = $this->db->query("SELECT * FROM 'dummy_log' where id = (SELECT MAX(id) FROM 'dummy_log')");
        //$this->db->select()->from('dummy_log')->where('id', 'select MAX(id) from dummy_log');
        //$query = $this->db->query('SELECT * FROM dummy_log;');
        //$query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
    }

    /** 全件のデータを取得する */
    function get_all_data(){
        $query = $this->db->get('dummy_log');
        return $query->result();
    }
}
?>
