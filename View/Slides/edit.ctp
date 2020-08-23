<div class="fatty form">
<?php echo $this->Form->create('Slide'); ?>
	<fieldset>
		<legend><?php echo __('Editer cette diapo'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title', ['style'=>'width: 600px']);
?>
	</fieldset>
<?php echo $this->Form->end(__('Enregistrer')); ?>
</div>
<?php echo $this->element('keyboard');?>
