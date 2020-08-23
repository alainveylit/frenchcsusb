<div class="fatty form">
	<?php //debug($this->request->data);?>
	
<?php echo $this->Form->create('Option'); ?>
	<fieldset>
		<legend><?php echo __('Edit Option'); ?></legend>
		<p><strong>Question: </strong><?php echo $this->request->data['Question']['text'];?></p>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		//echo $this->Form->input('index');
		echo $this->Form->input('correct_answer');
		echo $this->Form->hidden('question_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

