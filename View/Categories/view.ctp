<div class="fatty view">
	<?php //debug($category);?>
	<h2><?php echo 'Cat&eacute;gorie:'; ?>: <strong><?php echo h($category['Category']['title']); ?></strong></h2>
	<h3>Cr&eacute;ateur: <?php echo $this->Html->link($category['Creator']['name'], array('controller' => 'users', 'action' => 'view', $category['Creator']['id'])); ?></h3>

<?php //debug($category['Quiz']);?>
<div class="related cartouche">
	<h3><?php echo __('Exercices dans cette categorie'); ?></h3>
	<?php if (!empty($category['Quiz'])): ?>
	<table class="table table-striped">
		,<tr>
			<th><?php echo __('Cours'); ?></th>
			<th><?php echo __('Type'); ?></th>
			<th><?php echo __('Titre'); ?></th>
		</tr>
	<?php foreach ($category['Quiz'] as $quiz): ?>
		<tr>
			<td><?php echo $quiz['Cours']['titre']; ?></td>
			<td><?php echo $quiz['type']; ?></td>
			<td><?php echo $this->Html->link($quiz['title'], array('controller'=>'quizzes', 'action'=>'view', $quiz['id'])); ; ?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>


</div>
</div>
