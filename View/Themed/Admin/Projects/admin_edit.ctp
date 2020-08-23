<?php echo $this->element('tinymce');?>
<?php //debug($this->request->data);?>
<div class="fatty form">
<?php echo $this->Form->create('Project'); ?>
	<fieldset>
		<legend><?php echo __('Edit Project'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name', ['style'=>'width: 700px;']);
		echo $this->Form->hidden('creator');	
		?>

		<div class="bordered wide" style="padding: 12px; margin: 1em;">
			<?php echo $this->Form->input('description');?>
		</div>
		<div ><span class="pull-right"><?php echo $this->Form->input('public');?> </span> </div>		
		
	</fieldset>

<?php echo $this->Form->end(__('Submit')); ?>

	<div>
		<small class="pull-right">Created by: <?php echo $this->request->data['Creator']['name'], " - ", $this->Time->niceShort($this->request->data['Project']['created']);?></small>
	</div>

</div>
