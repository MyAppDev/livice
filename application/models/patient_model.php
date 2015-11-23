<?php
class Patient_model extends CI_Model {

    var $id   = null;               // AI用設定
    var $patient_number = '';       // 患者番号
    var $image    = '';             // 患者画像　url
    var $age = '';                  // 生年月日　: yyyyMMdd 0パディング
    var $name = '';                 // 患者名  :　姓,名
    var $name_kana = '';            // 患者名カナ　:　セイ,メイ
    var $area = '';                 // 地域　:　大阪府,大阪市
    var $disease = '';              // 病名　: 病名1,病名2,病名3・・・・
    var $medicine = '';             // 処方薬　: 薬名1,薬名2,薬名3・・・・
    var $caution = '';              // 注意事項　: 事項1,事項2,事項3・・・・
    var $advice = '';               // アドバイス　: アドバイス
    var $generic_drug = '';         // ジェネリック医薬品　: 薬名1,薬名2,薬名3・・・・
    var $health_food = '';          // 健康食品　:　食品1,食品2,食品3・・・・
    var $data_heartbeat = '';       // 1年間の心拍データ　:　値1,値2,値3・・・・,値12
    var $data_blood = '';           // 1年間の血圧データ　:　値1,値2,値3・・・・,値12
    var $data_body_temperature = '';// 1年間の体温データ　:　値1,値2,値3・・・・,値12

    function __construct()
    {
        // Model クラスのコンストラクタを呼び出す
        parent::__construct();
    }

    /** 全件のデータを取得する */
    function get_all_data(){
        $query = $this->db->get('patient');
        return $query->result();
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

    /** 生成したデータを書き込む */
    function insert_data($data){

      $this->patient_number = $data['patient_number'];
      $this->image  = $data['image'];
      $this->age = $data['age'];
      $this->name = $data['name'];
      $this->name_kana = $data['name_kana'];
      $this->area = $data['area'];
      $this->disease = $data['disease'];
      $this->medicine = $data['medicine'];
      $this->caution = $data['caution'];

      $this->db->insert('patient', $this);
    }

    /** 指定したidでデータを取得 */
    function get_target_data($id){
        $limit = 1;
        $offset = 0;
        $query = $this->db->get_where('patient', array('id' => $id), $limit, $offset);
        return $query->result();
    }
}
?>
