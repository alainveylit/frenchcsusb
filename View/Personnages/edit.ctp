<?php echo $this->element('tinymce');?>
<div class="fatty	 form">
<?php echo $this->Form->create('Personnage', ['type' => 'file']); ?>
	<fieldset>
		<legend><?php echo __('Edit Personnage'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nom', array('style'=>'width: 600px'));
		echo $this->Form->input('profession', array('style'=>'width: 800px'));
		echo $this->Form->input('description', array('style'=>'width: 800px'));
		echo $this->Form->input('image', ['type' => 'file']); 
		echo $this->Form->input('image_dir', ['type' => 'hidden']); 
		echo $this->Form->hidden('creator');
		echo $this->Form->input('focus');

	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Personnage.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Personnage.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Personnages'), array('action' => 'index')); ?></li>
	</ul>
</div>
