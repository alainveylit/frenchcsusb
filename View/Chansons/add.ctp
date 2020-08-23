<?php echo $this->element('tinymce');?>
<div class="fatty form">
	<div>
		<?php echo $this->Form->create('Chanson', ['type' => 'file']); ?>
			<fieldset>
				<legend><?php echo __('Add Chanson'); ?></legend>
			<?php
				echo $this->Form->input('titre');
				echo $this->Form->input('auteur');
				echo $this->Form->input('description');
				echo $this->Form->input('video');
				echo $this->Form->input('paroles');
				echo $this->Form->input('image', ['type' => 'file']); 
				echo $this->Form->input('image_dir', ['type' => 'hidden']); 

			?>
			</fieldset>
		<?php echo $this->Form->end(__('Submit')); ?>
	</div>
	<div class="actions">
		<h3><?php echo __('Actions'); ?></h3>
		<ul>

			<li><?php echo $this->Html->link(__('List Chansons'), array('action' => 'index')); ?></li>
		</ul>
	</div>
</div>
