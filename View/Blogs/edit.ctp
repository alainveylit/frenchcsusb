<div class="blogs form">
<?php echo $this->Form->create('Blog', ['type' => 'file']); ?>
	<fieldset>
		<legend><?php echo __('Edit Blog'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title', ['label'=>'Titre']);
		echo $this->Form->input('text', ['label'=>'Texte']);
		echo $this->Form->input('creator');
		echo $this->Form->input('image', ['type' => 'file']); 
		echo $this->Form->input('image_dir', ['type' => 'hidden']); 
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enregistrer')); ?>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Blog.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Blog.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Blogs'), array('action' => 'index')); ?></li>
	</ul>
</div>
