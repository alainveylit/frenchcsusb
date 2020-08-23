<div class="crosswords form">
<?php echo $this->Form->create('Crossword'); ?>
	<fieldset>
		<legend><?php echo __('Edit Crossword'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('cours_id');
		echo $this->Form->input('creator');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Crossword.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Crossword.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Crosswords'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Cours'), array('controller' => 'cours', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cours'), array('controller' => 'cours', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Crossword Options'), array('controller' => 'crossword_options', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Crossword Option'), array('controller' => 'crossword_options', 'action' => 'add')); ?> </li>
	</ul>
</div>
