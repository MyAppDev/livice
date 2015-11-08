<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Migration_Dummy_Log extends CI_Migration {
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
    }
    public function down() {
        $this->dbforge->drop_table('dummy_log');
        $this->dbforge->drop_table('daily_dummy_log');
    }
}
