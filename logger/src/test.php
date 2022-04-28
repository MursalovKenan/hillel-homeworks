<?php

use Mursalov\Logger\FileWriter;
use Mursalov\Logger\Formatter;
use Mursalov\Logger\Logger;

include __DIR__ . '/../vendor/autoload.php';

$server = "localhost";
$db_username = "root";
$db_password = "Mursalov";
$db_name = "hillel_log";


$conn = new PDO("mysql:host=$server;dbname=$db_name",$db_username,$db_password);


$sql_query = 'create table logs
                (
                    id        int auto_increment,
                    date      datetime    default null null,
                    log_level varchar(20) default null null,
                    message   text        default null null,
                    context   text        default null null,
                    constraint logs_pk
                    primary key (id)
                );';


//$dbh = $conn->prepare($sql_query);
//$stmt = $dbh->execute();
//$result_set = $stmt->fetchAll();
//var_dump($result_set);
///*Get the current error mode of PDO*/
//$current_error_mode = $conn->getAttribute(PDO::ATTR_ERRMODE);
//echo "<br>";
//echo "Value of PDO::ATTR_ERRMODE: ".$current_error_mode;




$formatter = new Formatter();
$writer = new FileWriter($formatter, __DIR__ . '/logs/', 'log.txt');
$messageFormatter = new Formatter(Formatter::LOG_MESSAGE);
$messageWriter = new FileWriter($messageFormatter, __DIR__ . '/logs/','messageLog.txt');

$logger = new Logger($writer);
$logger->setWriter($messageWriter);
$context = [
    'a' => 'aa',
    'b' => 'bbb',
    'c' => [
        'a1' => 'a1',
        'a2' => 'a2',
    ],
    'd' => $logger
];
$logger->emergency('Holy shit happened', $context);