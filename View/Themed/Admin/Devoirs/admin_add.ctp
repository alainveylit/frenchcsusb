<?php echo $this->element('tinymce');?>
<?php //debug($lessons[$lesson_id]); debug($cours);?>
<div>
	<h3 class="centered"><u>Cours: <?php echo $cours['titre'];?> -- 
	Lecon: <?php echo $lessons[$lesson_id];?></u></h3>
	<div class="fatty form">
	<?php echo $this->Form->create('Devoir'); ?>
		<fieldset>
			<legend><?php echo __('Ajouter des devoirs: '); ?> 
			</legend>
		<?php
			echo $this->Form->input('description');
			echo $this->Form->input('lesson_id', ['value'=>$lesson_id]);
		?>
		</fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
	</div>
	<div class="actions">
		<h3><?php echo __('Actions'); ?></h3>
		<ul class="list-inline">

			<li><?php echo $this->Html->link(__('Liste des Devoirs'), array('action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('Liste des Leçons'), array('controller' => 'lessons', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('Nouvelle Leçon'), array('controller' => 'lessons', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
