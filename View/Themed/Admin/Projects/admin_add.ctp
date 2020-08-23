<?php echo $this->element('tinymce');?>
<div class="fatty form">
<?php echo $this->Form->create('Project'); ?>
	<fieldset>
		<legend><?php echo __('Add Project'); ?></legend>
	<?php
		echo $this->Form->input('name', ['style'=>'width: 700px;']);
		echo $this->Form->input('slug');
		echo $this->Form->input('description');
		
		
		echo $this->Form->hidden('creator', ['value'=>$creator]);
		
		echo $this->Form->input('public');	

	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

