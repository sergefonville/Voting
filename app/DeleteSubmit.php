<?php
echo $_REQUEST['TopicId'];
if(!empty($_REQUEST['TopicId']))
	$TopicCollection->deleteOne(['_id' => $_REQUEST['TopicId']]);
header('Location: /Voting/Show', true, 303);
?>