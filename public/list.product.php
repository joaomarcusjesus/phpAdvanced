<table>
		<tr>
			<td>ID</td>
			<td>Name</td>
			<td>Description</td>
		</tr>
	<?php foreach($show as $product): ?>
		<tr>
			<td><?=$product['id'];?></td>
			<td><?=$product['name'];?></td>
			<td><?=$product['description'];?></td>
	<?php endforeach; ?>
</table>
