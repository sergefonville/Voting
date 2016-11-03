 <!DOCTYPE html>
<html>
	<head>
		<title>Voting - Add Topic</title>
	</head>
	<body>
		<form method="post" action="/Voting/Add/Submit" enctype="multipart/form-data">
			<table>
				<tr>
					<td><label for="Title">Title</label></td>
					<td><input id="Title" type="text" name="Title"/></td>
				</tr>
				<tr>
					<td><label for="Description">Description</label></td>
					<td><textarea id="Description" name="Description"></textarea></td>
				</tr>
				<tr>
					<td><label for="Voters">Voters<br/>(comma separated)</label></td>
					<td><textarea id="Voters" name="Voters"></textarea></td>
				</tr>
				<tr>
					<td><label for="Attachment">Attachment</label></td>
					<td><input type="file" id="Attachment" name="Attachment"/></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" value="Add Topic"/></td>
			</table>
		</form>
	</body>
</html>