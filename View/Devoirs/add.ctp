<?php echo $this->element('tinymce');?>
<?php //debug($lesson_id);?>
<div>
	<div class="fatty form">
	<?php echo $this->Form->create('Devoir'); ?>
		<fieldset>
			<legend><?php echo __('Ajouter des devoirs'); ?></legend>
		<?php
			echo $this->Form->input('description');
			echo $this->Form->input('lesson_id', ['value'=>$lesson_id]);
		?>
		</fieldset>
	<?php echo $this->Form->end(__('Enregistrer')); ?>
	</div>
	<div class="actions">
		<h3><?php echo __('Actions'); ?></h3>
		<ul class="list-inline">

			<li><?php echo $this->Html->link(__('Liste des Devoirs'), array('action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('Liste des Lessons'), array('controller' => 'lessons', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('Nouvelle Lesson'), array('controller' => 'lessons', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
