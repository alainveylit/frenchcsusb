<div class="crosswordOptions form">
<?php echo $this->Form->create('CrosswordOption'); ?>
	<fieldset>
		<legend><?php echo __('Add Crossword Option'); ?></legend>
	<?php
		echo $this->Form->input('clue');
		echo $this->Form->input('crossword_id');
		echo $this->Form->input('answer');
		echo $this->Form->input('position');
		echo $this->Form->input('orientation');
		echo $this->Form->input('startx');
		echo $this->Form->input('starty');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Crossword Options'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Crosswords'), array('controller' => 'crosswords', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Crossword'), array('controller' => 'crosswords', 'action' => 'add')); ?> </li>
	</ul>
</div>
