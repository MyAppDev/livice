<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * ダミー生体データ生成クラス
 *  2016 1/10 までの　1年分　
 */
class Dummy {

    // public function __construct(){
    //     // $params を使って何かを行う
    // }
    //
    // /** インスタンス取得 */
    // public function get_Instance(){
    //
    // }

    /** テスト用メソッド */
    public function foo(){
      echo 'foo';
    }

    /** ランダム小数値生成
      * 小数第1位を支社五入*/
    private function random_float($min = 0, $max = 1) {
        return round($min + mt_rand() / mt_getrandmax() * ($max - $min), 1);
    }

    /** 心拍数(bpm)
      * 1分間の拍動の数
      *  https://ja.wikipedia.org/wiki/%E5%BF%83%E6%8B%8D%E6%95%B0　*/
  	public function heartbeat($min_bias = 0, $max_bias = 0){
      return $this->random_float((60 + $min_bias), (90 + $max_bias));
  	}

    /** 消費カロリー(kcal)
      * カロリー消費量（kcal）＝1.05×体重（kg）×METS係数×運動時間（h） */
    public function calories($min_bias = 0, $max_bias = 0){
      return $this->random_float((200 + $min_bias), (3000+ $max_bias));
    }

    /** 高度(m) */
    public function elevation($min_bias = 0, $max_bias = 0){
      return $this->random_float((0 + $min_bias), (40 + $max_bias));
    }

    /** 血中濃度(μg/mL) */
    public function blood($min_bias = 0, $max_bias = 0){
      return $this->random_float((1 + $min_bias), (20 + $max_bias));
    }

    /** スピード(km/h) */
    public function speed($min_bias = 0, $max_bias = 0){
      return $this->random_float((2 + $min_bias), (10 + $max_bias));
    }

    /** 指定された期間のデータを生成する */
    public function log_generator($pram_start, $pram_end){
      $start = $this->split_date($pram_start);
      $end = $this->split_date($pram_end);

      $start_year = $start['y'];
      $start_month = $start['m'];
      $start_day = $start['d'];
      $end_year = $end['y'];
      $end_month = $end['m'];
      $end_day = $end['d'];

      for($cnt_y=$start_year; $cnt_y<=$end_year; $cnt_y++){
        switch ($cnt_y) {
          case $start_year:// 開始年
            for($cnt_m=$start_month; $cnt_m<=12; $cnt_m++){
                // echo	date('Y-m-d', mktime(0, 0, 0, $cnt_m+1, 0, $cnt_y));
                switch ($cnt_m) {
                  case $start_month:// 開始月
                    $end_date = $this->end_of_month($cnt_y, $cnt_m);
                    // echo '[';
                    for($cnt_d=$start_day; $cnt_d<=$end_date; $cnt_d++){
                      // echo $cnt_d;
                      // echo ',';
                      $result[$cnt_y][(int)$cnt_m][] = (int)$cnt_d;
                    }
                    // echo ']';
                    break;
                  default:// 開始月以外
                    $end_date = $this->end_of_month($cnt_y, $cnt_m);
                    // echo '[';
                    for($cnt_d=1; $cnt_d<=$end_date; $cnt_d++){
                      // echo $cnt_d;
                      // echo ',';
                      $result[$cnt_y][(int)$cnt_m][] = (int)$cnt_d;
                    }
                    // echo ']';
                    break;
                }
                // echo br(1);
            }
            break;
          case $end_year:// 終了年
            for($cnt_m=1; $cnt_m<=$end_month; $cnt_m++){
                // echo	date('Y-m-d', mktime(0, 0, 0, $cnt_m+1, 0, $cnt_y));
                switch ($cnt_m) {
                  case $end_month:// 終了月
                    $end_date = $this->end_of_month($cnt_y, $cnt_m);
                    // echo '[';
                    for($cnt_d=1; $cnt_d<=$end_day; $cnt_d++){
                      // echo $cnt_d;
                      // echo ',';
                      $result[$cnt_y][(int)$cnt_m][] = (int)$cnt_d;
                    }
                    // echo ']';
                    break;
                  default:// 終了月以外
                    $end_date = $this->end_of_month($cnt_y, $cnt_m);
                    // echo '[';
                    for($cnt_d=1; $cnt_d<=$end_date; $cnt_d++){
                      // echo $cnt_d;
                      // echo ',';
                      $result[$cnt_y][(int)$cnt_m][] = (int)$cnt_d;
                    }
                    // echo ']';
                    break;
                }
                // echo br(1);
            }
            break;
          default:// 間の年
            for($cnt_m=1; $cnt_m<=12; $cnt_m++){
                // $tmp_date = date('Y-m-d', mktime(0, 0, 0, $cnt_m+1, 0, $cnt_y));
                // echo	$tmp_date;
                // 月末の日付
                $end_date = $this->end_of_month($cnt_y, $cnt_m);
                // echo '[';
                for($cnt_d=1; $cnt_d<=$end_date; $cnt_d++){
                  // echo $cnt_d;
                  // echo ',';
                  $result[$cnt_y][(int)$cnt_m][] = (int)$cnt_d;
                }
                // echo ']';
                // echo br(1);
            }
            break;
        }
        //echo br(1);
      }
      //var_dump($result);
      return $result;
    }

    /** 日付けを分割して連想配列で返す
        yyyy-MM-dd を - で分割する*/
    public function split_date($param){
      $spl_param = explode("-", $param);
      $result['y'] = $spl_param[0];
      $result['m'] = $spl_param[1];
      $result['d'] = $spl_param[2];
      return $result;
    }

    /** 指定された月の月末の日付を取得する
        ex) 2015-10 → 30 */
    public function end_of_month($year, $month){
      $tmp_date = date('Y-m-d', mktime(0, 0, 0, $month+1, 0, $year));
      $result = $this->split_date($tmp_date);
      return $result['d'];
    }

}
