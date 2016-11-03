<?php
require_once __DIR__ . '/autoload.php';
$Client = new MongoDB\Client;
$VotingDatabase = $Client->selectDatabase('Voting');
$TopicCollection = $VotingDatabase->selectCollection('Topics');
?>