<?php


namespace Repetitor202;


use ClickHouseDB\Client;

class ClickhouseDraft
{
    public function test(): void
    {
        $config = [
//            'host' => '192.168.17.8',
            'host' => $_ENV['CLICKHOUSE_HOST'],
//            'port' => '8123',
            'port' => $_ENV['CLICKHOUSE_PORT'],
//            'username' => 'default',
//            'username' => '',
            'username' => $_ENV['CLICKHOUSE_USERNAME'],
            'password' => $_ENV['CLICKHOUSE_PASSWORD']
        ];
//        $db = new \ClickHouseDB\Client($config);
        $db = new Client($config);
//        $db->database('default');
        $db->database('tutorial');
//        $db->setTimeout(1.5);      // 1500 ms
//        $db->setTimeout(10);       // 10 seconds
        $db->setConnectTimeOut(5); // 5 seconds

        echo "ping\n";
        $db->ping();
        echo "OK!\n";

        $db->write('
    CREATE TABLE IF NOT EXISTS summing_url_views (
        event_date Date DEFAULT toDate(event_time),
        event_time DateTime,
        site_id Int32,
        site_key String,
        views Int32,
        v_00 Int32,
        v_55 Int32
    )
    ENGINE = SummingMergeTree(event_date, (site_id, site_key, event_time, event_date), 8192)
');

        $stat = $db->insert('summing_url_views',
            [
                [time(), 'HASH1', 2345, 22, 20, 2],
                [time(), 'HASH2', 2345, 12, 9,  3],
                [time(), 'HASH3', 5345, 33, 33, 0],
                [time(), 'HASH3', 5345, 55, 0, 55],
            ],
            ['event_time', 'site_key', 'site_id', 'views', 'v_00', 'v_55']
        );

        echo $db->showCreateTable('summing_url_views');

        print_r($db->showTables());

        $statement = $db->select('SELECT * FROM summing_url_views LIMIT 2');
        // fetch one row
        $statement->fetchOne();
        print_r($statement);

        // get extremes min
        print_r($statement->extremesMin());
    }
}