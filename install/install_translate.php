<?php


$languages = Jojo::selectQuery("SELECT * from {language} WHERE `active` = '1'");

$table = 'translate';
$query = "
    CREATE TABLE {translate} (
      `translateid` int(11) NOT NULL auto_increment,
      `tr_default` text,
      ";

foreach ($languages as $l ){    
    $query .= "`tr_" . $l['languageid']  . "` text,
    ";
}      
           
$query .= "
      PRIMARY KEY  (`translateid`)
    ) TYPE=MyISAM DEFAULT CHARSET=utf8 COLLATE utf8_general_ci ;";


/* Check table structure */
$result = Jojo::checkTable($table, $query);

/* Output result */
if (isset($result['created'])) {
    echo sprintf("jojo_translate: Table <b>%s</b> Does not exist - created empty table.<br />", $table);
}

if (isset($result['added'])) {
    foreach ($result['added'] as $col => $v) {
        echo sprintf("jojo_translate: Table <b>%s</b> column <b>%s</b> Does not exist - added.<br />", $table, $col);
    }
}

if (isset($result['different'])) Jojo::printTableDifference($table,$result['different']);
