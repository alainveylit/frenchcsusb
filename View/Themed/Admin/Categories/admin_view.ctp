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
			<th><?php echo __('Titre'); ?></th>
			<th><?php echo __('Type'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
	<?php foreach ($category['Quiz'] as $quiz): ?>
		<tr>
			<td><?php echo $this->Html->link($quiz['title'], array('controller'=>'quizzes', 'action'=>'view', $quiz['id'])); ; ?></td>
			<td><?php echo $quiz['type']; ?></td>
			<?php /*<td><?php echo $this->Html->link(html_entity_decode($quiz['Lesson']['titre']), array('controller'=>'lessons', 'action'=>'view', $quiz['Lesson']['id'])); ?></td>
			
			<td><?php echo $quiz['Lesson']['jour']; ?></td>
			* */?>
			<td class="actions">
				<?php echo $this->Html->link(__('Lire'), array('controller' => 'quizzes', 'action' => 'view', $quiz['id'])); ?>
					<?php echo $this->Html->link(__('Editer'), array('controller' => 'quizzes', 'action' => 'edit', $quiz['id'])); ?>
					<?php echo $this->Form->postLink(__('Effacer'), array('controller' => 'quizzes', 'action' => 'delete', $quiz['id']), array(), __('Are you sure you want to delete # %s?', $quiz['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

<?php if($User['role']=='Admin'):?>
	<div class="actions">
		<h3><?php echo __('Actions'); ?></h3>
		<ul class="list-inline">
			<li><?php echo $this->Html->link(__('Editer cette Categorie'), array('action' => 'edit', $category['Category']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Effacer cette  Categorie'), array('action' => 'delete', $category['Category']['id']), array(), __('Are you sure you want to delete # %s?', $category['Category']['id'])); ?> </li>
			<li><?php echo $this->Html->link(__('Liste des Categories'), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('Nouvelle Categorie'), array('action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('Liste des exercices'), array('controller' => 'quizzes', 'action' => 'index')); ?> </li>
		</ul>
	</div>
	<?php endif;?>
</div>
</div>
