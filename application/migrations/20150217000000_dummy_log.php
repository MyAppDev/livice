<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Migration_Dummy_Log extends CI_Migration {
    public function up() {

        // テーブル作成
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

        // 初期データを登録
        $data = array(
            'heartbeat' => '10',
            'calories' => '20',
            'elevation' => '5',
            'blood' => '10',
            'speed' => '5',
            'created' => 'datetime()',
        );
        $this->db->insert('dummy_log', $data);
    }
    public function down() {
        $this->dbforge->drop_table('dummy_log');
    }
}
