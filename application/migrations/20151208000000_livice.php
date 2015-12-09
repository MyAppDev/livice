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
        // 参考： http://www.meijiyasuda.co.jp/enjoy/ranking/best100/boy.html
        //       http://namaeranking.com/?search=%E3%83%A9%E3%83%B3%E3%82%AD%E3%83%B3%E3%82%B0&tdfk=%E5%85%A8%E5%9B%BD&namae=%E5%90%8D%E5%AD%97
        $data = array(
            'id' => null,
            'patient_number' => '123456789012',// ここを変更する場合はjavascriptの方も確認して下さい。
            'image' => 'ic_human.png',
            'age' => '19350321',
            'name' => '佐藤,蓮太朗',
            'name_kana' => 'サトウ,レンタロウ',
            'area' => '大阪府,東大阪市',
            'disease' => '肺炎',
            'medicine' => 'アストミン散10％',
            'caution' => '水分補給を心がける,かぜやインフルエンザに注意',
            'advice' => '体を動かしましょう',
            'generic_drug' => 'ニチコデ散',
            'health_food' => 'セサミンEX',
            'data_heartbeat' => '70, 69, 72, 81, 83, 82.4, 80.6, 80.8, 80.4, 92, 91, 92',
            'data_blood' => '125, 127, 130, 135, 134, 140, 143, 144, 144, 146, 145, 145',
            'data_body_temperature' => '36.4, 35.6, 34.6, 35.8, 34.7, 37.8, 38.2, 37.5, 37.6, 37.7, 38.1, 38.5',
        );
        $this->db->insert('patient', $data);
        $data = array(
            'id' => null,
            'patient_number' => '138888328882',
            'image' => 'ic_human.png',
            'age' => '19330909',
            'name' => '鈴木,一郎',
            'name_kana' => 'スズキ,イチロウ',
            'area' => '大阪府,大阪市',
            'disease' => '胆石症',
            'medicine' => 'コリオパン顆粒2%',
            'caution' => 'ビタミンCの摂取を心がける',
            'advice' => '適度に運動しましょう',
            'generic_drug' => 'ダクチラン錠50mg',
            'health_food' => 'ラクテクト',
            'data_heartbeat' => '64, 67, 59, 60, 68, 69, 55, 66, 67.9, 68.3, 62, 67',
            'data_blood' => '125, 123, 120, 123, 124, 137, 129, 124, 124, 126, 125, 145',
            'data_body_temperature' => '36.4, 35.6, 36.6, 35.8, 34.7, 35.8, 34.2, 36.5, 38.6, 37.6, 36.1, 34.5',
        );
        $this->db->insert('patient', $data);
        $data = array(
            'id' => null,
            'patient_number' => '145791357913',
            'image' => 'ic_human.png',
            'age' => '19471204',
            'name' => '高橋,健太',
            'name_kana' => 'タカハシ,ケンタ',
            'area' => '大阪市,堺市',
            'disease' => '心筋梗塞',
            'medicine' => 'ワソラン錠40mg',
            'caution' => '激しい運動は控えること',
            'advice' => '適当な運動、規則正しい生活を心がけましょう',
            'generic_drug' => 'イソピットテープ40mg',
            'health_food' => 'マルチ ビタミン&ミネラル,サンオレア',
            'data_heartbeat' => '64, 64, 59, 60, 66, 67, 63, 66.5, 67.9, 68.3, 62, 67',
            'data_blood' => '125, 137, 130, 123, 134, 133, 123, 134, 124, 126, 125, 135',
            'data_body_temperature' => '34.4, 35.6, 34.6, 35.8, 37.7, 34.8, 38.2, 35.5, 34.6, 37.6, 37.1, 34.5',
        );
        $this->db->insert('patient', $data);
        $data = array(
            'id' => null,
            'patient_number' => '152345678904',
            'image' => 'ic_human.png',
            'age' => '19240204',
            'name' => '田中,光',
            'name_kana' => 'タナカ,ヒカル',
            'area' => '大阪市,枚方市',
            'disease' => '高血圧症',
            'medicine' => 'ペルジピンLAカプセル40mg',
            'caution' => 'ストレスを避ける,入浴の仕方を考える（ぬるま湯、長湯はしない、脱衣所を温める）',
            'advice' => '睡眠をしっかりとりましょう',
            'generic_drug' => 'タツゾシン錠2mg',
            'health_food' => 'マルチ ビタミン&ミネラル,サンオレア',
            'data_heartbeat' => '64, 64, 59, 60, 66, 67, 63, 66.5, 67.9, 68.3, 62, 67',
            'data_blood' => '125, 137, 130, 123, 134, 133, 123, 134, 124, 126, 125, 135',
            'data_body_temperature' => '34.4, 35.6, 34.6, 35.8, 37.7, 34.8, 38.2, 35.5, 34.6, 37.6, 37.1, 34.5',
        );
        $this->db->insert('patient', $data);
        $data = array(
            'id' => null,
            'patient_number' => '152445678905',
            'image' => 'ic_human.png',
            'age' => '19371004',
            'name' => '林,光秀',
            'name_kana' => 'ハヤシ,ミツヒデ',
            'area' => '大阪市,八尾市',
            'disease' => '糖尿病',
            'medicine' => 'メキシチールカプセル50mg',
            'caution' => '食生活を見直す,足の手入れを欠かさない',
            'advice' => 'ウォーキングなど適度な運動をしましょう',
            'generic_drug' => 'アルプロスタジル注10μgシリンジ',
            'health_food' => 'マルチ ビタミン&ミネラル,サンオレア',
            'data_heartbeat' => '64, 64, 59, 60, 66, 67, 63, 66.5, 67.9, 68.3, 62, 67',
            'data_blood' => '125, 137, 130, 123, 134, 133, 123, 134, 124, 126, 125, 135',
            'data_body_temperature' => '34.4, 35.6, 34.6, 35.8, 37.7, 34.8, 38.2, 35.5, 34.6, 37.6, 37.1, 34.5',
        );
        $this->db->insert('patient', $data);
        $data = array(
            'id' => null,
            'patient_number' => '162345678906',
            'image' => 'ic_human.png',
            'age' => '19431214',
            'name' => '伊藤,奏',
            'name_kana' => 'イトウ,カナデ',
            'area' => '大阪市,松原市',
            'disease' => '脳出血',
            'medicine' => 'セロクラール錠20mg',
            'caution' => '飲酒、喫煙を控えること',
            'advice' => 'ウォーキングなど軽い運動をしましょう',
            'generic_drug' => 'ヨウアジール',
            'health_food' => 'マルチ ビタミン&ミネラル,サンオレア',
            'data_heartbeat' => '64, 64, 59, 60, 66, 67, 63, 66.5, 67.9, 68.3, 62, 67',
            'data_blood' => '125, 137, 130, 123, 134, 133, 123, 134, 124, 126, 125, 135',
            'data_body_temperature' => '34.4, 35.6, 34.6, 35.8, 37.7, 34.8, 38.2, 35.5, 34.6, 37.6, 37.1, 34.5',
        );
        $this->db->insert('patient', $data);
        $data = array(
            'id' => null,
            'patient_number' => '172345678907',
            'image' => 'ic_human.png',
            'age' => '19490604',
            'name' => '小林,美好',
            'name_kana' => 'コバヤシ,ミヨシ',
            'area' => '大阪市,藤井寺市',
            'disease' => 'くも膜下出血',
            'medicine' => 'キサンボンS注射液40mg',
            'caution' => '適切な運動量を守る,医師の指示を守り、激しい運動をしない,塩分を控える',
            'advice' => 'ウォーキングなど軽い運動をしましょう',
            'generic_drug' => 'オサグレン点滴静注用20mg',
            'health_food' => 'マルチ ビタミン&ミネラル,サンオレア',
            'data_heartbeat' => '64, 64, 59, 60, 66, 67, 63, 66.5, 67.9, 68.3, 62, 67',
            'data_blood' => '125, 137, 130, 123, 134, 133, 123, 134, 124, 126, 125, 135',
            'data_body_temperature' => '34.4, 35.6, 34.6, 35.8, 37.7, 34.8, 38.2, 35.5, 34.6, 37.6, 37.1, 34.5',
        );
        $this->db->insert('patient', $data);
        $data = array(
            'id' => null,
            'patient_number' => '182345678908',
            'image' => 'ic_human.png',
            'age' => '19310804',
            'name' => '池田,明正',
            'name_kana' => 'イケダ,アキマサ',
            'area' => '大阪市,泉佐野市',
            'disease' => 'パーキンソン病',
            'medicine' => 'カバサール錠0.25mg',
            'caution' => '生活を見直す,段差を無くす,冷暖房の設定に注意する',
            'advice' => 'ウォーキングなど軽い運動をしましょう',
            'generic_drug' => 'カベルゴリン錠0.25mg',
            'health_food' => 'マルチ ビタミン&ミネラル,サンオレア',
            'data_heartbeat' => '64, 64, 59, 60, 66, 67, 63, 66.5, 67.9, 68.3, 62, 67',
            'data_blood' => '125, 137, 130, 123, 134, 133, 123, 134, 124, 126, 125, 135',
            'data_body_temperature' => '34.4, 35.6, 34.6, 35.8, 37.7, 34.8, 38.2, 35.5, 34.6, 37.6, 37.1, 34.5',
        );
        $this->db->insert('patient', $data);
        $data = array(
            'id' => null,
            'patient_number' => '192345678909',
            'image' => 'ic_human.png',
            'age' => '19220204',
            'name' => '清水,竜也',
            'name_kana' => 'シミズ,タツヤ',
            'area' => '大阪市,堺市',
            'disease' => '高脂血症',
            'medicine' => 'エラスチーム錠1800',
            'caution' => '合併症に注意する,喫煙、アルコール摂取量に気をつける',
            'advice' => 'ウォーキングなど軽い運動をしましょう',
            'generic_drug' => 'プラバスタチンNa錠10',
            'health_food' => 'マルチ ビタミン&ミネラル,サンオレア',
            'data_heartbeat' => '64, 64, 59, 60, 66, 67, 63, 66.5, 67.9, 68.3, 62, 67',
            'data_blood' => '125, 137, 130, 123, 134, 133, 123, 134, 124, 126, 125, 135',
            'data_body_temperature' => '34.4, 35.6, 34.6, 35.8, 37.7, 34.8, 38.2, 35.5, 34.6, 37.6, 37.1, 34.5',
        );
        $this->db->insert('patient', $data);
        $data = array(
            'id' => null,
            'patient_number' => '202345678910',
            'image' => 'ic_human.png',
            'age' => '19190707',
            'name' => '西村,美咲',
            'name_kana' => 'ニシムラ,ミサキ',
            'area' => '大阪市,箕面市',
            'disease' => '慢性心不全',
            'medicine' => 'アカルディカプセル2.5',
            'caution' => '塩分摂取を制限する,カロリーを制限する',
            'advice' => 'ウォーキングなど軽い運動をしましょう',
            'generic_drug' => 'エナラプリル錠5MEEK',
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
            'patient_number' => '123456789012',
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
            'patient_number' => '138888328882',
            'advice' => '水泳をおすすめします',
            'doctor' => '',
            'generic_drug' => '',
            'health_food' => '',
            'checked' => 0,
            'created' => '20151125124555',
            'modified' => '20151125124555',
        );
        $this->db->insert('advice', $data);
        $data = array(
            'id' => null,
            'patient_number' => '145791357913',
            'advice' => 'ウォーキングをおすすめします',
            'doctor' => '',
            'generic_drug' => '',
            'health_food' => '',
            'checked' => 0,
            'created' => '20151125124555',
            'modified' => '20151125124555',
        );
        $this->db->insert('advice', $data);
        $data = array(
            'id' => null,
            'patient_number' => '152345678904',
            'advice' => '散歩することをおすすめします',
            'doctor' => '',
            'generic_drug' => '',
            'health_food' => '',
            'checked' => 0,
            'created' => '20151125124555',
            'modified' => '20151125124555',
        );
        $this->db->insert('advice', $data);
        $data = array(
            'id' => null,
            'patient_number' => '152445678905',
            'advice' => '軽い運動をおすすめします',
            'doctor' => '',
            'generic_drug' => '',
            'health_food' => '',
            'checked' => 0,
            'created' => '20151125124555',
            'modified' => '20151125124555',
        );
        $this->db->insert('advice', $data);
        $data = array(
            'id' => null,
            'patient_number' => '162345678906',
            'advice' => 'ウォーキングをおすすめします',
            'doctor' => '',
            'generic_drug' => '',
            'health_food' => '',
            'checked' => 0,
            'created' => '20151125124555',
            'modified' => '20151125124555',
        );
        $this->db->insert('advice', $data);
        $data = array(
            'id' => null,
            'patient_number' => '172345678907',
            'advice' => '水泳をおすすめします',
            'doctor' => '',
            'generic_drug' => '',
            'health_food' => '',
            'checked' => 0,
            'created' => '20151125124555',
            'modified' => '20151125124555',
        );
        $this->db->insert('advice', $data);
        $data = array(
            'id' => null,
            'patient_number' => '182345678908',
            'advice' => '運動することをおすすめします',
            'doctor' => '',
            'generic_drug' => '',
            'health_food' => '',
            'checked' => 0,
            'created' => '20151125124555',
            'modified' => '20151125124555',
        );
        $this->db->insert('advice', $data);
        $data = array(
            'id' => null,
            'patient_number' => '192345678909',
            'advice' => '水泳をおすすめします',
            'doctor' => '',
            'generic_drug' => '',
            'health_food' => '',
            'checked' => 0,
            'created' => '20151125124555',
            'modified' => '20151125124555',
        );
        $this->db->insert('advice', $data);
        $data = array(
            'id' => null,
            'patient_number' => '202345678910',
            'advice' => 'ウォーキングをおすすめします',
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
