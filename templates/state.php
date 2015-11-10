<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $this->data['page_title']; ?></title>
</head>
<body>
	<table>
		<tr>
			<th>State</th>
			<th>Abbreviation</th>
			<th>Date Added</th>
			<th>DateTime Added</th>
			<th>Last Updated</th>
		</tr>
		<?php foreach ($this->data['data'] as $item): ?>
		<tr>
			<td><?php echo $item['name'] ?></td>
			<td><?php echo $item['abbreviation'] ?></td>
			<td><?php echo $item['date_added'] ?></td>
			<td><?php echo $item['datetime_added'] ?></td>
			<td><?php echo $item['last_updated'] ?></td>
		</tr>
		<?php endforeach; ?>
	</table>

</body>
</html>