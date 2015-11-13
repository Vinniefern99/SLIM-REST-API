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
			<th>State this user has visited:</th>
		</tr>
		<?php foreach ($this->data['data'] as $item): ?>
		<tr>
			<td><?php echo $item['name'] ?></td>
		</tr>
		<?php endforeach; ?>
	</table>
</body>
</html>