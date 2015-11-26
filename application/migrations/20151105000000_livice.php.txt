<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**  ※注意
 * ./application/config/migration.php  も編集のこと
 * 古いバージョンのマイグレーション設定ファイルは拡張子を.txtなどの.php以外のものにすること
 */
class Migration_livice extends CI_Migration {
    public function up() {

        // dummy_logテーブル作成
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INTEGER',
                'auto_increment' => TRUE,
            ),
            'heartbeat' => array(
                'type' => 'REAL'
            ),
            'calories' => array(
                'type' => 'REAL'
            ),
            'elevation' => array(
                'type' => 'REAL'
            ),
            'blood' => array(
                'type' => 'REAL'
            ),
            'speed' => array(
                'type' => 'REAL'
            ),
            'created' => array(
                'type' => 'TEXT'
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('dummy_log');

        // daily_dummy_logテーブルの作成
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INTEGER',
                'auto_increment' => TRUE,
            ),
            'user' => array(
                'type' => 'INTEGER'
            ),
            'heartbeat' => array(
                'type' => 'REAL'
            ),
            'calories' => array(
                'type' => 'REAL'
            ),
            'elevation' => array(
                'type' => 'REAL'
            ),
            'blood' => array(
                'type' => 'REAL'
            ),
            'speed' => array(
                'type' => 'REAL'
            ),
            'created' => array(
                'type' => 'TEXT'
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('daily_dummy_log');

        // 患者テーブルの作成
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INTEGER',
                'auto_increment' => TRUE,
            ),
            'patient_number' => array(// 患者番号
                'type' => 'TEXT',
            ),
            'image' => array(// 患者画像　url
                'type' => 'TEXT',
            ),
            'age' => array(// 生年月日　: yyyyMMdd 0パディング
                'type' => 'TEXT',
            ),
            'name' => array(// 患者名  :　姓,名
                'type' => 'TEXT',
            ),
            'name_kana' => array(// 患者名カナ　:　セイ,メイ
                'type' => 'TEXT',
            ),
            'area' => array(// 地域　:　大阪府,大阪市
                'type' => 'TEXT',
            ),
            'disease' => array(// 病名　: 病名1,病名2,病名3・・・・
                'type' => 'TEXT',
            ),
            'medicine' => array(// 処方薬　: 薬名1,薬名2,薬名3・・・・
                'type' => 'TEXT',
            ),
            'caution' => array(// 注意事項　: 事項1,事項2,事項3・・・・
                'type' => 'TEXT',
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('patient');
    }
    public function down() {
        $this->dbforge->drop_table('dummy_log');
        $this->dbforge->drop_table('daily_dummy_log');
        $this->dbforge->drop_table('patient');
    }
}
