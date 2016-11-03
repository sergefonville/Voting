<?php
if(
	!empty($_REQUEST['TopicId'])
 && !empty($_REQUEST['VoterId'])
 ) {
	 $Document = $TopicCollection->findOne(['Guid' => $_REQUEST['TopicId']]);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Voting - Vote Topic</title>				
		<style type="text/css">
			table {
				border: none;
				border-collapse: collapse;
				vertical-align: top;
			}
			th, td {
				padding: 5px;
				vertical-align: top;
				border: none;
				text-align: left;
			}
		</style>
	</head>
	<body>
		<form method="post" action="/Voting/VoteSubmit" enctype="multipart/form-data">
			<table>
				<tr>
					<th>Title</th>
					<th>Description</th>
					<th>Vote</th>
				<tr>
					<td><?php echo $Document['Title']; ?></td>
					<td><?php echo $Document['Description']; ?></td>
					<td>
						<label for="VoteFor">For</label>
						<input id="VoteFor" type="radio" name="Vote" value="for"/>
						<label for="VoteAgainst">Against</label>
						<input id="VoteAgainst" type="radio" name="Vote" value="Against"/>
					</td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" value="Vote"/></td>
				</tr>
			</table>
			<input type="hidden" name="TopicId" value="<?php echo $_REQUEST['TopicId']; ?>"/>
			<input type="hidden" name="VoterId" value="<?php echo $_REQUEST['VoterId']; ?>"/>
		</form>
	</body>
</html>
<?php
 }
?>