<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $this->data['page_title']; ?></title>
</head>
<body>
	<button onclick="history.go(-1);">Back</button>
	<br />
	<br />
	<table>
		<tr>
			<th>Users</th>
			<th>Visits:</th>
		</tr>
		<?php foreach ($this->data['data'] as $item): ?>
		<tr>
			<td><?php echo $item['first_name'] . " " . $item['last_name']?></td>
			<td>
				<form action="user/<?php echo $item['user_id'] ?>/visits"
					method="GET">
					<input type="submit" value="Cities">
				</form>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
</body>
</html>