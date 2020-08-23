
<div class="tuiles view">
<h2><?php echo __('Tuile'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tuile['Tuile']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($tuile['Tuile']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($tuile['Tuile']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cours'); ?></dt>
		<dd>
			<?php echo $this->Html->link($tuile['Cours']['id'], array('controller' => 'cours', 'action' => 'view', $tuile['Cours']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Professeur'); ?></dt>
		<dd>
			<?php echo $this->Html->link($tuile['Professeur']['nom'], array('controller' => 'professeurs', 'action' => 'view', $tuile['Professeur']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Index'); ?></dt>
		<dd>
			<?php echo h($tuile['Tuile']['index']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Actif'); ?></dt>
		<dd>
			<?php echo h($tuile['Tuile']['actif']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tuile'), array('action' => 'edit', $tuile['Tuile']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tuile'), array('action' => 'delete', $tuile['Tuile']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $tuile['Tuile']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Tuiles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tuile'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cours'), array('controller' => 'cours', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cours'), array('controller' => 'cours', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Professeurs'), array('controller' => 'professeurs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Professeur'), array('controller' => 'professeurs', 'action' => 'add')); ?> </li>
	</ul>
</div>
