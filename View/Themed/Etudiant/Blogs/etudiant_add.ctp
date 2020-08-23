<?php echo $this->element('tinymce');?>
<div class="blogs wide-margins">
	<?php //debug($cours_id);?>
<?php echo $this->Form->create('Blog', ['type'=>'file']); ?>
	<fieldset class="fixed-field">
		<legend><?php echo __('Ajouter un épisode de ma vie en France'); ?></legend>
	<?php
		echo $this->Form->input('title', ['label'=>'Sujet', 'style'=>'width: 600px']);
		echo $this->Form->input('text', ['label'=>'Texte']);
		echo $this->Form->hidden('creator', ['value'=>$creator]);
		echo 'Vignette / Image miniature: ', $this->Form->file('image', ['type'=>'file', 'label'=>'Thumbnail Image']);
		echo $this->Form->hidden('image_dir');
		echo $this->Form->hidden('cours_id',  ['value'=>$cours_id]);
	?>
	</fieldset>
		<?php echo $this->Form->end(__('Enregistrer')); ?>
		
	<?php echo $this->element('keyboard_shortcuts');?>

</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Mon journal'), array('action' => 'index'), array('class'=>'list')); ?></li>
	</ul>
</div>
