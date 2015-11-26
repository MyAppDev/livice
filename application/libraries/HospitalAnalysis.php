<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 病院側　データ分析クラス　
 */
class HospitalAnalysis {

    /** コンストラクタ */
    public function __construct(){
        // $params を使って何かを行う
    }

    /**
     *　病気の兆候を予測する
     *  患者のグラフを分析して医師へのメッセージを返す
     */
    public function diseaseSignsPrediction($biological_information){
        $result = array(
          'heartbeat' => $this->heartbeatAnalysis($biological_information['heartbeat']),
          'body_temperature' => '',
          'blood_pressure' => '',
        );
        return $result;
    }

    /**
     * 心拍数を分析
     */
    private function heartbeatAnalysis($heartbeat_data){
      // var_dump($heartbeat_data);
      // $heartbeat_list = split(",", $heartbeat_data);
      $heartbeat_list = explode(",", $heartbeat_data);
      $message = '心拍数に問題はありません。';
      $out_range_cnt = 0;
      foreach ($heartbeat_list as $heartbeat) {
        // 60 - 80 以外ならカウント
        if($heartbeat > 60 && 80 < $heartbeat){
          $out_range_cnt += 1;
        }
      }
      if(5 < $out_range_cnt){
        $message = '貧血や不整脈、心不全の兆候が診られます。';
      } else if(1 < $out_range_cnt && $out_range_cnt <= 5) {
        $message = '貧血や不整脈の疑いがあります。';
      }
      return $message;
    }

    /**
     *  体温分析
     */
    private function bodyTemperatureAnalysis(){

    }

    /**
     *  血圧分析
     */
    private function bloodPressureAnalysis(){

    }
}

?>
