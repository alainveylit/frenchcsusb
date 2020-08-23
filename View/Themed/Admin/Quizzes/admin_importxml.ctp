<?php //echo $this->element('tinymce');?>
<div class="fatty form">
<?php echo $this->Form->create('Quiz', ['type' => 'file']); ?>
	<fieldset>
		<legend><?php echo __('Importer un Exercice'); ?></legend>
		<?php echo $this->Form->input('XML', ['type' => 'file']); ?>
	
	</fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
</div>
