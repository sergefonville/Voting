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
					<th>Guid</th>
					<th>Title</th>
					<th>Description</th>
					<th>VoterIds</th>
					<th>For</th>
					<th>Against</th>
					<th>Delete</th>
				</tr>
<?php
	foreach($Documents as $Document) {
?>
				<tr>
					<td><?php echo $Document['Guid']; ?></td>
					<td><?php echo $Document['Title']; ?></td>
					<td><?php echo $Document['Description']; ?></td>
					<td><?php echo implode('<br/>', $Document['VoterIds']->bsonSerialize()); ?></td>
					<td><?php echo count($Document['For']); ?></td>
					<td><?php echo count($Document['Against']); ?></td>
					<td><button name="TopicId" value="<?php echo $Document['Guid']; ?>" type="submit" formaction="/Voting/DeleteSubmit?TopicId=<?php echo $Document['Guid']; ?>">Delete</button></td>
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