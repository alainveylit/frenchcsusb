<?php echo $this->element('tinymce');?>
<?php //debug($this->request->data);?>
<div class="projects form">
<?php echo $this->Form->create('Project'); ?>
	<fieldset>
		<legend><?php echo __('Edit Project'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('slug');
		
		echo $this->Form->input('description');
		echo $this->Form->input('synopsis');
		echo $this->Form->hidden('creator');
		echo $this->Form->input('public');
		
		echo $this->Form->input('donations_enabled');

		echo $this->Form->input('donations', array('type'=>'number'));
	?>
	<p>Created by: <?php echo $this->request->data['Creator']['name'], " - ", $this->Time->niceShort($this->request->data['Project']['created']);?></p>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
