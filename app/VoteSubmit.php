<?php
if(
	!empty($_REQUEST['Vote'])
 && !empty($_REQUEST['TopicId'])
 && !empty($_REQUEST['VoterId'])
) {
	$VoterIds = $TopicCollection->findOne(['Guid' => $_REQUEST['TopicId']])['VoterIds']->bsonSerialize();
	$ForVoterIds = $TopicCollection->findOne(['Guid' => $_REQUEST['TopicId']])['For']->bsonSerialize();
	$AgainstVoterIds = $TopicCollection->findOne(['Guid' => $_REQUEST['TopicId']])['Against']->bsonSerialize();
	$UpdatedForVoterIds = array();
	$UpdatedAgainstVoterIds = array();
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
		['Guid' => $_REQUEST['TopicId']]
	  , ['$set' => [
			'For' => $UpdatedForVoterIds
		  , 'Against' => $UpdatedAgainstVoterIds
		]]
	);
	header('Location: /Voting/Show', true, 303);
}
?>