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
          'body_temperature' => $this->bodyTemperatureAnalysis($biological_information['body_temperature']),
          'blood_pressure' => $this->bloodPressureAnalysis($biological_information['blood_pressure']),
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
    private function bodyTemperatureAnalysis($body_temperature_data){
      $body_temperature_list = explode(",", $body_temperature_data);
      $message = '';
      $out_range_cnt = 0;
      foreach ($body_temperature_list as $body_temperature) {
        // 36.6 - 37.2 以外ならカウント
        if($body_temperature > 36.6 && 37.2 < $body_temperature){
          $out_range_cnt += 1;
        }
      }
      if(5 < $out_range_cnt){
        $message = '自律神経失調症の兆候が診られます。';
      } else if(1 < $out_range_cnt && $out_range_cnt <= 5) {
        $message = '免疫力が低下しています。感染症、病気にかかりやすくなっています。';
      }
      return $message;
    }

    /**
     *  血圧分析
     */
    private function bloodPressureAnalysis($blood_pressure_data){
      $blood_pressure_list = explode(",", $blood_pressure_data);
      $message = "";
      $out_range_cnt = 0;
      foreach ($blood_pressure_list as $body_pressure) {
        // 80 - 130 以外ならカウント
        if($body_pressure > 80 && 130 < $body_pressure){
          $out_range_cnt += 1;
        }
      }
      if(5 < $out_range_cnt){
        $message = '心筋梗塞の兆候が診られます。';
      } else if(1 < $out_range_cnt && $out_range_cnt <= 5) {
        $message = '高血圧の疑いがあります。';
      }
      return $message;
    }
}

?>
