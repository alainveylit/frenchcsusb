<div>
<div class="fatty">

<h2>			
	<?php echo $vocabulaire['Vocabulaire']['title']; ?>
	<small class="pull-right">
	<?php echo $this->Crud->Professor_view($vocabulaire['Professeur']);?>
	</small>
</h2>
<h3>Cours: 
			<?php echo $this->Html->link($vocabulaire['Cours']['titre'], array('controller' => 'cours', 'action' => 'view', $vocabulaire['Cours']['id'])); ?>

</h3>
<div>
			<div class="cartouche">
				<?php if(!empty($vocabulaire['Vocabulaire']['image'])) {
					//echo $this->Crud->show_quiz_image('quiz', $quiz['Quiz']['image'], $quiz['Quiz']['image_dir']);
					echo $this->Crud->show_upload_image('vocabulaire', $vocabulaire['Vocabulaire']);
				}?>
			</div>

	<?php echo $vocabulaire['Vocabulaire']['vocables']; ?>
</div>

<h5>
	Last modified: <?php echo $this->Time->niceShort($vocabulaire['Vocabulaire']['modified']); ?>
</h5>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-inline">
		<li><?php echo $this->Html->link(__('Edit Vocabulaire'), array('action' => 'edit', $vocabulaire['Vocabulaire']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Vocabulaire'), array('action' => 'delete', $vocabulaire['Vocabulaire']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $vocabulaire['Vocabulaire']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Vocabulaires'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vocabulaire'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cours'), array('controller' => 'cours', 'action' => 'index')); ?> </li>
	</ul>
</div>
</div>
