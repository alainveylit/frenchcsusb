<div class="fatty form">
	<div class="cartouche bordered">
		<?php debug($this->request->data);?>
<?php echo $this->Form->create('CrosswordOption'); ?>
	<fieldset>
		<legend><?php echo __('Edit Crossword Option'); ?></legend>
					<?php
						echo $this->Form->hidden('id');
						echo $this->Form->hidden('crossword_id');
						echo $this->Form->input('clue', ['label'=>'Question', 'style'=>['width:700px;']]);
						echo $this->Form->input('answer',  ['label'=>'Réponse', 'style'=>['width:700px;']]);
						echo $this->Form->hidden('creator', ['value'=>$User['id']]);
					?>
					<table class="table table-bordered"><tr>
						<td><?php echo $this->Form->input('position', ['label'=>'Index']);?></td>
						<td><?php echo $this->Form->input('orientation', ['label'=>'Vertical']);?></td>
						<td><?php echo $this->Form->input('startx',  ['label'=>'X']);?></td>
						<td><?php echo $this->Form->input('starty',  ['label'=>'Y']);?></td>

					</tr></table>
		
		<?php $crossword_id=$this->Form->value('crossword_id'); ?>

	</fieldset>

<?php echo $this->Form->end(__('Submit')); ?>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Effacer cette option'), array('action' => 'delete', $this->Form->value('CrosswordOption.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('CrosswordOption.id')))); ?></li>
		<li><?php echo $this->Html->link(__('Voir ce probleme'), array('controller' => 'crosswords', 'action' => 'view', $crossword_id)); ?> </li>
	</ul>
</div>
</div>
