<?php
class Patient_model extends CI_Model {

    var $id   = null;         // AI用設定
    var $patient_number = ''; // 患者番号
    var $image    = '';       // 患者画像　url
    var $age = '';            // 生年月日　: yyyyMMdd 0パディング
    var $name = '';           // 患者名  :　姓,名
    var $name_kana = '';      // 患者名カナ　:　セイ,メイ
    var $area = '';           // 地域　:　大阪府,大阪市
    var $disease = '';        // 病名　: 病名1,病名2,病名3・・・・
    var $medicine = '';       // 処方薬　: 薬名1,薬名2,薬名3・・・・
    var $caution = '';        // 注意事項　: 事項1,事項2,事項3・・・・

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

    /** 指定したデータを取得 */
    function get_target_data($id){
        $limit = 1;
        $offset = 0;
        $query = $this->db->get_where('patient', array('id' => $id), $limit, $offset);
        return $query->result();
    }
}
?>
