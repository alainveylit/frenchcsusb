<?php echo $this->element('tinymce');?>
<div class="fatty form">
<?php echo $this->Form->create('Setting'); ?>
	<fieldset>
		<legend><?php echo __('Add Setting'); ?></legend>
	<?php
		echo $this->Form->input('titre', array('style'=>'width: 600px;'));
		echo $this->Form->input('horaire', array('style'=>'width: 600px;'));
		echo $this->Form->input('banniere', array('style'=>'width: 600px;'));
		?>
</fieldset><fieldset>
	<?php 
		echo $this->Form->input('professeur', array('style'=>'width: 600px;'));
		echo $this->Form->input('courriel', array('style'=>'width: 600px;'));
		echo $this->Form->input('description');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Settings'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
