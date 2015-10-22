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
  	public function heartbeat(){
      return $this->random_float(60, 90);
  	}

    /** 消費カロリー(kcal)
      * カロリー消費量（kcal）＝1.05×体重（kg）×METS係数×運動時間（h） */
    public function calories(){
      return $this->random_float(200, 3000);
    }

    /** 高度(m) */
    public function elevation(){
      return $this->random_float(0, 40);
    }

    /** 血中濃度(μg/mL) */
    public function blood(){
      return $this->random_float(1, 20);
    }

    /** スピード(km/h) */
    public function speed(){
      return $this->random_float(2, 10);
    }
}
