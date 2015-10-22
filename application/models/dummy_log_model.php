<?php
class Dummy_log_model extends CI_Model {

    var $id   = null;       // AI用設定
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

    /** 生成したデータを書き込む */
    function insert_dummy_data($data){
      date_default_timezone_set('Asia/Tokyo');
      $datestring = "%Y:%m:%d:%H:%i:%s";
  		$time = time();

      $this->load->helper('date');
      $this->heartbeat = $data['heartbeat'];
      $this->calories  = $data['calories'];
      $this->elevation = $data['elevation'];
      $this->blood = $data['blood'];
      $this->speed = $data['speed'];
      $this->created = mdate($datestring, $time);

      $this->db->insert('dummy_log', $this);
    }

    /** 初期化用データを取得(最新19件) */
    function get_init_dummy_data(){
        $this->db->order_by('id desc');
        $query = $this->db->get('dummy_log', 19);
        return $query->result();
    }

    /** 指定したデータ */
    function get_target_dummy_data($offset){
        $limit = 1;
        $query = $this->db->get('dummy_log', $limit, $offset);
        return $query->result();
    }

    /**  */

    function get_last_ten_entries()
    {
        $query = $this->db->get('entries', 10);
        return $query->result();
    }

    function insert_entry()
    {
        $this->title   = $_POST['title']; // 下の Note を参照してください
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->insert('entries', $this);
    }

    function update_entry()
    {
        $this->title   = $_POST['title'];
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }

}
?>
