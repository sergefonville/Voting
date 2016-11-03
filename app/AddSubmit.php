<?php
if(
	!empty($_REQUEST['Title'])
 && !empty($_REQUEST['Description'])
 && !empty($_REQUEST['Voters'])
) {
	$Title = $_REQUEST['Title'];
	$Description = $_REQUEST['Description'];
	$Voters = preg_split('/,/', $_REQUEST['Voters']);
	if(!empty($_REQUEST['Attachment'])) {
		$Attachment = file_get_contents($_FILES["Attachment"]["tmp_name"]);
		$AttachmentName = $_FILES['Attachment']['name'];
	}
	function newGuid() {
		$data = openssl_random_pseudo_bytes(16);
		$data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
		$data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10
		return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
	}
	$Guid = newGuid();
	$VoterIds = array();
	foreach($Voters as $Voter) {
		$VoterIds[] = newGuid();
	}
	$Result = $TopicCollection->insertOne(
		[
			'Guid' => $Guid
		  , 'Title' => $Title
		  , 'Description' => $Description
		  , 'VoterIds' => $VoterIds
		  , 'For' => []
		  , 'Against' => []
		]
	);
	header('Location: /Voting/Show', true, 303);
}
?>