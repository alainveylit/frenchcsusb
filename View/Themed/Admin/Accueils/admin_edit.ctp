<?php echo $this->element('tinymce');?>
<div class="accueils form">
<?php echo $this->Form->create('Accueil', ['type' => 'file']); ?>
		<fieldset>
		<legend><?php echo __('Editer la page d\'accueil de ce site de Francais'); ?></legend>
			<?php
				echo $this->Form->input('id');
				echo $this->Form->input('title');
				echo $this->Form->textarea('description');
				echo $this->Form->input('image', ['type' => 'file', 'label'=>'Banner']);
				echo $this->Form->hidden('image_dir');
				echo $this->Form->hidden('image_size');
				echo $this->Form->hidden('creator');
			?>
		</fieldset>
	<?php echo $this->Form->end(__('Enregistrer')); ?>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Form->postLink(__('Effacer'), array('action' => 'delete', $this->Form->value('Accueil.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Accueil.id')))); ?></li>
	</ul>
</div>
