<div class="accueils view">
<h2><?php echo __('Accueil'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($accueil['Accueil']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($accueil['Accueil']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($accueil['Accueil']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($accueil['Accueil']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image Dir'); ?></dt>
		<dd>
			<?php echo h($accueil['Accueil']['image_dir']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image Size'); ?></dt>
		<dd>
			<?php echo h($accueil['Accueil']['image_size']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Creator'); ?></dt>
		<dd>
			<?php echo h($accueil['Accueil']['creator']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($accueil['Accueil']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Accueil'), array('action' => 'edit', $accueil['Accueil']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Accueil'), array('action' => 'delete', $accueil['Accueil']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $accueil['Accueil']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Accueils'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Accueil'), array('action' => 'add')); ?> </li>
	</ul>
</div>
