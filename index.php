<?php
$ConnectFile = __DIR__ . '/lib/connect.php';
if(file_exists($ConnectFile))
	require_once $ConnectFile;
else
	return;
if(!empty($_GET['action'])) {
	$Actions = preg_split('/\//', $_GET['action']);	
	$Action = $Actions[0];
	$ActionFile = __DIR__ . '/app/' . $Action;
	if(count($Actions) == 2) {
		$SubAction = $Actions[1];
		$ActionFile .= $SubAction;
	}
	$ActionFile .= '.php';
	if(file_exists($ActionFile)) {
		require_once $ActionFile;
	}
}
?>