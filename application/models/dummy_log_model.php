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

        /* SQLiteへの高速化設定 */
        // $sql = "PRAGMA synchronous = OFF ";
        // $this->db->query($sql);
        // $sql = "PRAGMA journal_mode = WAL";
        // $this->db->query($sql);
    }

    /** 最新のデータを取得する */
    function get_latest_data(){
        //SQLite と　MySQLで同一のSQLが使用可能か検証のこと

        // SQLite用
        // $query = $this->db->query("SELECT * FROM dummy_log where id = (SELECT MAX(id) FROM dummy_log)");

        // MySQL用
        $query = $this->db->query("SELECT * FROM dummy_log ORDER BY id DESC limit 1");

        // echo $this->db->last_query();
        // var_dump($query->result());
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

      // $this->db->trans_start();
      $this->db->insert('dummy_log', $this);
      // $this->db->trans_complete();
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
