--TEST--
MongoDB\BSON\Timestamp unserialization requires "increment" and "timestamp" integer fields
--FILE--
<?php

require_once __DIR__ . '/../utils/tools.php';

echo throws(function() {
    unserialize('O:22:"MongoDB\BSON\Timestamp":1:{s:9:"increment";i:1234;}');
}, 'MongoDB\Driver\Exception\InvalidArgumentException'), "\n";

echo throws(function() {
    unserialize('O:22:"MongoDB\BSON\Timestamp":1:{s:9:"timestamp";i:5678;}');
}, 'MongoDB\Driver\Exception\InvalidArgumentException'), "\n";

echo throws(function() {
    unserialize('O:22:"MongoDB\BSON\Timestamp":2:{s:9:"increment";s:4:"1234";s:9:"timestamp";s:4:"5678";}');
}, 'MongoDB\Driver\Exception\InvalidArgumentException'), "\n";

?>
===DONE===
<?php exit(0); ?>
--EXPECT--
OK: Got MongoDB\Driver\Exception\InvalidArgumentException
MongoDB\BSON\Timestamp initialization requires "increment" and "timestamp" integer fields
OK: Got MongoDB\Driver\Exception\InvalidArgumentException
MongoDB\BSON\Timestamp initialization requires "increment" and "timestamp" integer fields
OK: Got MongoDB\Driver\Exception\InvalidArgumentException
MongoDB\BSON\Timestamp initialization requires "increment" and "timestamp" integer fields
===DONE===
