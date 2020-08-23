<?php echo $this->element('tinymce');?>
<div class="comments form">
	<?php echo $this->Form->create('Comment');?>
		<fieldset>
			<p><legend><?php echo __('Edit Comment');?></legend></p>
		<?php
			echo $this->Form->input('id');
			echo $this->Form->hidden('model');
			echo $this->Form->hidden('foreign_key');
			echo $this->Form->input('comment');
		?>
		</fieldset>

	<?php echo $this->Form->end('Submit');?>
</div>
