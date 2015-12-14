<?php
class Advice_model extends CI_Model {

    var $id   = null;                // AI用設定
    var $patient_number = '';        // 患者番号
    var $doctor    = '';             // 患者画像　url
    var $generic_drug = '';          // ジェネリック医薬品　: 薬名1,薬名2,薬名3・・・・　未使用
    var $health_food = '';           // 健康食品　:　食品1,食品2,食品3・・・・　未使用
    var $checked = 0;                // 患者が確認したか　:　0(未確認) or 1(確認済み)
    var $created = '';               // 登録日 : yyyyMMddHHmmss　0パディング
    var $modified = '';              // 更新日 : yyyyMMddHHmmss　0パディング

    function __construct()
    {
        // Model クラスのコンストラクタを呼び出す
        parent::__construct();
    }

    /** 全件のデータを取得する */
    function get_all_data(){
        $query = $this->db->get('advice');
        return $query->result();
    }

    /** 指定したidでデータを取得 */
    function get_target_data($id){
        $limit = 1;
        $offset = 0;
        $query = $this->db->get_where('advice', array('id' => $id), $limit, $offset);
        return $query->result();
    }

    /** 患者番号で抽出 */
    function find_by_patient_number($patient_number){
        $this->db->select('*')->from('advice')->where('patient_number', $patient_number)->order_by("id", "desc");
        $query = $this->db->get();
        // $query = $this->db->get('advice');
        // $query = $this->db->where('patient_number', $patient_number);
        return $query->result();
    }

    /** 最新のデータを取得する */
    function get_latest_data($patient_number){
        $sql = "SELECT * FROM advice "
              ."WHERE 1 "
              ."AND patient_number = ? "
              ."AND id = (SELECT MAX(id) FROM advice WHERE patient_number = ?) ";
        $bind_var[] = "{$patient_number}";
        $bind_var[] = "{$patient_number}";
        // $query = $this->db->query("SELECT * FROM 'advice' where id = (SELECT MAX(id) FROM 'advice')");
        $query = $this->db->query($sql, $bind_var);
        // echo $this->db->last_query();
        return $query->result();
    }

    /** データを書き込む */
    function insert_data($data){
      $this->patient_number = $data['patient_number'];
      $this->advice  = $data['advice'];
      $this->doctor = $data['doctor'];
      $this->generic_drug = $data['generic_drug'];
      $this->health_food = $data['health_food'];
      $this->checked = $data['checked'];
      $this->created = $data['created'];
      $this->modified = $data['modified'];

      $this->db->insert('advice', $this);
    }

    /** 指定した条件で検索 */
    function get_conditions_data($conditions){
      $sql = "SELECT * FROM patient WHERE ? ";
      $bind_var[] = "1";
      if(isset($conditions['search_patient']) && !empty($conditions['search_patient'])){// 患者名
        $sql .= "AND name LIKE ? OR name_kana LIKE ? ";
        $bind_var[] = "%{$conditions['search_patient']}%";
        $bind_var[] = "%{$conditions['search_patient']}%";
      }
      if(isset($conditions['search_disease']) && !empty($conditions['search_disease'])){// 病名
        $sql .= "AND disease LIKE ? ";
        $bind_var[] = "%{$conditions['search_disease']}%";
      }
      if(isset($conditions['search_medicine']) && !empty($conditions['search_medicine'])){// 薬剤名
        $sql .= "AND medicine LIKE ? ";
        $bind_var[] = "%{$conditions['search_medicine']}%";
      }
      if(isset($conditions['search_area']) && !empty($conditions['search_area'])){// 地域
        $sql .= "AND area LIKE ? ";
        $bind_var[] = "%{$conditions['search_area']}%";
      }
      if(isset($conditions['search_age']) && !empty($conditions['search_age'])){// 年齢
        $sql .= "AND age LIKE ? ";
        $bind_var[] = "%{$conditions['search_age']}%";
      }
      $query = $this->db->query($sql, $bind_var);
      // echo $this->db->last_query();
      // var_dump($query->result());
      return $query->result();
    }


    /** idを指定してデータ更新する */
    // function update_data($data){
    //   $data = array(
    //            'title' => $title,
    //            'name' => $name,
    //            'date' => $date
    //         );
    //   $this->db->where('id', $id);
    //   $this->db->update('mytable', $data);
    // }
}
?>
