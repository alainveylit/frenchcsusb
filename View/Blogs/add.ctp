<?php echo $this->element('tinymce');?>
<div class="blogs wide-margins">
<?php echo $this->Form->create('Blog', ['type'=>'file']); ?>
	<fieldset class="fixed-field">
		<legend><?php echo __('Ajouter un episode de ma vie en France'); ?></legend>
	<?php
		echo $this->Form->input('title', ['label'=>'Titre']);
		echo $this->Form->input('text', ['label'=>'Texte']);
		echo $this->Form->hidden('creator', ['value'=>$creator]);
		echo $this->Form->input('image', ['type'=>'file']);
		echo $this->Form->hidden('image_dir');
		echo $this->Form->input('image_dir');
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Soumettre')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Liste des Blogs'), array('action' => 'index')); ?></li>
	</ul>
</div>
