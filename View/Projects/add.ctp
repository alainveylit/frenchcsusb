<?php echo $this->element('tinymce');?>
<div class="projects form">
<?php echo $this->Form->create('Project'); ?>
	<fieldset>
		<legend><?php echo __('Add Project'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('slug');
		
		echo $this->Form->input('description');
		echo $this->Form->input('synopsis');
		echo $this->Form->hidden('creator');
		echo $this->Form->input('public');
		
		echo $this->Form->input('donations_enabled');

		echo $this->Form->input('donations', array('type'=>'number'));

		echo $this->Form->input('public');
		echo $this->Form->input('creator');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

