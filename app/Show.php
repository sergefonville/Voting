<!DOCTYPE html>
<html>
	<head>
		<title>Voting - Show Topics</title>
		<style type="text/css">
			table {
				border: 2px double black;
				border-collapse: collapse;
			}
			th, td {
				padding: 5px;
				vertical-align: top;
				border: 1px solid black;
			}
		</style>
	</head>
	<body>
<?php
if(empty($_GET['TopicId'])) {
	$Documents = $TopicCollection->find([], []);
?>
		<form>
			<table>
				<tr>
<?php
	if(isset($_REQUEST['admin'])) {
?>					<th>Guid</th>
<?php
	}
?>					<th>Title</th>
					<th>Description</th>
<?php
	if(isset($_REQUEST['admin'])) {
?>					<th>VoterIds</th>
<?php
	}
?>					<th>For</th>
					<th>Against</th>
<?php
	if(isset($_REQUEST['admin'])) {
?>					<th>Delete</th>
<?php
	}
?>	
				</tr>
<?php
	foreach($Documents as $Document) {
?>
				<tr>
<?php
		if(isset($_REQUEST['admin'])) {
?>					<td><nobr><?php echo $Document['_id']; ?></nobr></td>
<?php
		}
?>					<td><?php echo $Document['Title']; ?></td>
					<td><?php echo $Document['Description']; ?></td>
<?php
		if(isset($_REQUEST['admin'])) {
?>					<td><nobr><?php echo implode('<br/>', $Document['VoterIds']->bsonSerialize()); ?></nobr></td>
<?php
		}
?>					<td><?php echo count($Document['For']); ?></td>
					<td><?php echo count($Document['Against']); ?></td>
<?php
		if(isset($_REQUEST['admin'])) {
?>					<td><button name="TopicId" value="<?php echo $Document['_id']; ?>" type="submit" formaction="/Voting/DeleteSubmit?TopicId=<?php echo $Document['_id']; ?>">Delete</button></td>
<?php
		}
?>
				</tr>
<?php
	}
?>
			</table>
		</form>
	</body>
</html>
<?php
}
else {
	$TopicId = $_GET['TopicId'];
	$Documents = $TopicCollection->findOne(['' => $TopicId]);	
}
?>