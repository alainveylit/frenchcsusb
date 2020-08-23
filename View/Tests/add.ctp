<div class="fatty form">
<?php echo $this->Form->create('Test'); ?>
	<fieldset>
		<legend><?php echo __('Ajouter un Test'); ?></legend>
	<?php
		echo $this->Form->input('title', array('style'=>'width: 700px'));
		echo $this->Form->input('document_id');
		echo $this->Form->input('category');
		echo $this->Form->input('test_date');
		echo $this->Form->input('lesson_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Tests'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Documents'), array('controller' => 'documents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Document'), array('controller' => 'documents', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lessons'), array('controller' => 'lessons', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resultats'), array('controller' => 'resultats', 'action' => 'index')); ?> </li>
	</ul>
</div>
