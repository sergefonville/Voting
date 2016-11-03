<?php
if(
	!empty($_REQUEST['Vote'])
 && !empty($_REQUEST['TopicId'])
 && !empty($_REQUEST['VoterId'])
) {
	$VoterIds = $TopicCollection->findOne(['_id' => $_REQUEST['TopicId']])['VoterIds']->bsonSerialize();
	$ForVoterIds = $TopicCollection->findOne(['_id' => $_REQUEST['TopicId']])['For']->bsonSerialize();
	$AgainstVoterIds = $TopicCollection->findOne(['_id' => $_REQUEST['TopicId']])['Against']->bsonSerialize();
	$UpdatedForVoterIds = array();
	$UpdatedAgainstVoterIds = array();
	if(in_array($_REQUEST['VoterId'], $VoterIds)
		return;
	foreach($ForVoterIds as $ForVoterId)
		if($ForVoterId != $_REQUEST['VoterId'])
			$UpdatedForVoterIds[] = $ForVoterId;
	foreach($AgainstVoterIds as $AgainstVoterId)
		if($AgainstVoterId != $_REQUEST['VoterId'])
			$UpdatedAgainstVoterIds[] = $AgainstVoterId;
	if($_REQUEST['Vote'] == 'for')
		$UpdatedForVoterIds[] = $_REQUEST['VoterId'];
	else
		$UpdatedAgainstVoterIds[] = $_REQUEST['VoterId'];
	$TopicCollection->UpdateOne(
		['_id' => $_REQUEST['TopicId']]
	  , ['$set' => [
			'For' => $UpdatedForVoterIds
		  , 'Against' => $UpdatedAgainstVoterIds
		]]
	);
	header('Location: /Voting/Show', true, 303);
}
?>