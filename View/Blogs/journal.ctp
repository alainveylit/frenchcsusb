<div class="panel wide-margins">
<h2>Mon journal</h2>
<?php debug($blogs); ?>
<table class="table table-striped">
	<tbody>
	<?php foreach ($blogs as $blog): ?>
	<tr>
		<td><?php echo $blog['Blog']['title']; ?>&nbsp;</td>
		<td><?php echo $blog['Blog']['creator']; ?>&nbsp;</td>
		<td><?php echo $blog['Blog']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $blog['Blog']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>

</div>
