<?php echo $this->element('tinymce');?>
<div class="blogs wide-margins">
<?php echo $this->Form->create('Blog', ['type'=>'file']); ?>
	<fieldset>
		<legend><?php echo __('Editer mon journal'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title', ['label'=>'Sujet']);
		echo $this->Form->input('text', ['label'=>'Texte']);
		//echo $this->Form->input('creator', ['value'=>$creator]);
		echo $this->Form->file('image');
		echo $this->Form->hidden('image_dir');
	?>
	</fieldset>
	<?php echo $this->element('keyboard_shortcuts');?>
<?php echo $this->Form->end(__('Enregistrer')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Blog.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Blog.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Blogs'), array('action' => 'index')); ?></li>
	</ul>
</div>
