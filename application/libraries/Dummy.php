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
}
