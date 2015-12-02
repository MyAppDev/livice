<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**  ※注意
 * ./application/config/migration.php  も編集のこと
 * 古いバージョンのマイグレーション設定ファイルは拡張子を.txtなどの.php以外のものにすること
 */
class Migration_livice extends CI_Migration {
    public function up() {

        // dummy_logテーブル作成
        // リアルタイムのデータ
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
        // 未使用
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
        // 患者のプロフィールなど
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
            'advice' => array(// アドバイス　: アドバイス
                'type' => 'TEXT',
            ),
            'generic_drug' => array(// ジェネリック医薬品　: 薬名1,薬名2,薬名3・・・・
                'type' => 'TEXT',
            ),
            'health_food' => array(// 健康食品　:　食品1,食品2,食品3・・・・
                'type' => 'TEXT',
            ),
            'data_heartbeat' => array(// 1年間の心拍データ　:　値1,値2,値3・・・・,値12
                'type' => 'TEXT',
            ),
            'data_blood' => array(// 1年間の血圧データ　:　値1,値2,値3・・・・,値12
                'type' => 'TEXT',
            ),
            'data_body_temperature' => array(// 1年間の体温データ　:　値1,値2,値3・・・・,値12
                'type' => 'TEXT',
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('patient');
        // patinetへ初期データを登録
        $data = array(
            'id' => null,
            'patient_number' => '123456789012',
            'image' => 'ic_human.png',
            'age' => '20040321',
            'name' => '人間,人',
            'name_kana' => 'ニンゲン,ヒト',
            'area' => '大阪府,東大阪市',
            'disease' => 'ノイローゼ',
            'medicine' => 'パンセダン',
            'caution' => 'ストレスに注意',
            'advice' => '体を動かしましょう',
            'generic_drug' => '	アモバンテス',
            'health_food' => 'セサミンEX',
            'data_heartbeat' => '64, 67, 59, 60, 68, 67, 60, 66, 67.9, 68.3, 62, 67',
            'data_blood' => '125, 127, 130, 123, 134, 127, 129, 124, 124, 126, 125, 135',
            'data_body_temperature' => '36.4, 35.6, 34.6, 35.8, 34.7, 35.8, 38.2, 36.5, 34.6, 37.6, 36.1, 34.5',
        );
        $this->db->insert('patient', $data);
        $data = array(
            'id' => null,
            'patient_number' => '888888888888',
            'image' => 'ic_github.png',
            'age' => '19990909',
            'name' => '技徒,刃武',
            'name_kana' => 'ギト,ハブ',
            'area' => '大阪府,大阪市',
            'disease' => '鬱病,心臓病',
            'medicine' => 'ジェイゾロフト,レキソタン',
            'caution' => '働きすぎに注意,閉鎖空間を避ける事',
            'advice' => '適度に運動しましょう',
            'generic_drug' => 'セラニン',
            'health_food' => 'ラクテクト',
            'data_heartbeat' => '64, 67, 59, 60, 68, 69, 55, 66, 67.9, 68.3, 62, 67',
            'data_blood' => '125, 123, 120, 123, 124, 137, 129, 124, 124, 126, 125, 145',
            'data_body_temperature' => '36.4, 35.6, 36.6, 35.8, 34.7, 35.8, 34.2, 36.5, 38.6, 37.6, 36.1, 34.5',
        );
        $this->db->insert('patient', $data);
        $data = array(
            'id' => null,
            'patient_number' => '912345678901',
            'image' => 'ic_evernote.png',
            'age' => '18781204',
            'name' => '永波,能徒',
            'name_kana' => 'エバ,ノト',
            'area' => '大阪市,堺市',
            'disease' => '血管心臓炎,肩関節亜脱臼,高コレステロール血症',
            'medicine' => 'ガスターＤ錠,ニスタジール散,ニュートライド錠',
            'caution' => '急激な温度変化に注意,激しい運動は控えること',
            'advice' => 'ウォーキングなど軽い運動をしましょう',
            'generic_drug' => '	ヨウ化カリウム',
            'health_food' => 'マルチ ビタミン&ミネラル,サンオレア',
            'data_heartbeat' => '64, 64, 59, 60, 66, 67, 63, 66.5, 67.9, 68.3, 62, 67',
            'data_blood' => '125, 137, 130, 123, 134, 133, 123, 134, 124, 126, 125, 135',
            'data_body_temperature' => '34.4, 35.6, 34.6, 35.8, 37.7, 34.8, 38.2, 35.5, 34.6, 37.6, 37.1, 34.5',
        );
        $this->db->insert('patient', $data);

        // アドバイステーブルの作成
        // 医師から患者へのアドバイス
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INTEGER',
                'auto_increment' => TRUE,
            ),
            'patient_number' => array(// 患者番号
                'type' => 'TEXT',
            ),
            'advice' => array(// アドバイス　: アドバイス
                'type' => 'TEXT',
            ),
            'doctor' => array(// 記入者　: 医師ID　未使用
                'type' => 'TEXT',
            ),
            'generic_drug' => array(// ジェネリック医薬品　: 薬名1,薬名2,薬名3・・・・　未使用
                'type' => 'TEXT',
            ),
            'health_food' => array(// 健康食品　:　食品1,食品2,食品3・・・・　未使用
                'type' => 'TEXT',
            ),
            'checked' => array(// 患者が確認したか　:　0(未確認) or 1(確認済み)
                'type' => 'INTEGER',
            ),
            'created' => array(// 登録日 : yyyyMMddHHmmss　0パディング
                'type' => 'TEXT',
            ),
            'modified' => array(// 更新日 : yyyyMMddHHmmss　0パディング
                'type' => 'TEXT',
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('advice');
        // adviceへ初期データを登録
        $data = array(
            'id' => null,
            'patient_number' => '912345678901',
            'advice' => '運動したほうがいいですよ',
            'doctor' => '',
            'generic_drug' => '',
            'health_food' => '',
            'checked' => 0,
            'created' => '20151125124545',
            'modified' => '20151125124545',
        );
        $this->db->insert('advice', $data);
        $data = array(
            'id' => null,
            'patient_number' => '912345678901',
            'advice' => '水泳をおすすめします',
            'doctor' => '',
            'generic_drug' => '',
            'health_food' => '',
            'checked' => 0,
            'created' => '20151125124555',
            'modified' => '20151125124555',
        );
        $this->db->insert('advice', $data);
    }
    public function down() {
        $this->dbforge->drop_table('dummy_log');
        $this->dbforge->drop_table('daily_dummy_log');
        $this->dbforge->drop_table('patient');
        $this->dbforge->drop_table('advice');
    }
}
