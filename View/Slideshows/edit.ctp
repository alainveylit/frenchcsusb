<div class="slideshows form">
<?php echo $this->Form->create('Slideshow'); ?>
	<fieldset>
		<legend><?php echo __('Edit Slideshow'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('lesson_id');
		echo $this->Form->input('cours_id');
		echo $this->Upload->edit('Slideshow', $this->Form->fields['Slideshow.id']);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Slideshow.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Slideshow.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Slideshows'), array('action' => 'index')); ?></li>
	</ul>
</div>
