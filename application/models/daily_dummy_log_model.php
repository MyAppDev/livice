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

    /** 指定した日数分のデータを取得する
        // SELECT * FROM `daily_dummy_log` WHERE 1
        // AND user=1
        // AND created BETWEEN '2015:01:10' AND '2015:04:22';    */
    function get_yearly_transition($user, $start, $end){
      $sql = "SELECT * "
           . "FROM daily_dummy_log "
           . "WHERE 1 "
           . "AND user=? "
           . "AND created BETWEEN ? AND ? ;";
      $query = $this->db->query($sql, array($user, $start, $end));

      return $query->result();
    }

    /** 全件のデータを取得する */
    function get_all_data(){
        $query = $this->db->get('dummy_log');
        return $query->result();
    }
}
?>
