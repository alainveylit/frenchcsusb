<div class="fatty white cartouche">
<?php
//debug($user);
?>

<div class="group">
<h2><?php echo __('User Info');?></h2>
	<dl class="dl-horizontal"><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Username'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Email'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['email']; ?>
			&nbsp;
		</dd>
				<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Role'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['role']; ?>
			&nbsp;
		</dd>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['created']; ?>
			&nbsp;
		</dd>
	</dl>
</div>

<?php //debug($user['Profile']);
?>
<div class='group'>
	<h2><?php echo $this->Html->link('Profile information', 
		array('controller'=>'profiles', 'action'=>'view', 'admin'=>false, $user['Profile']['id']));?></h2>
	<?php $i = 0; $class = ' class="altrow"';?>
	<dl class="dl-horizontal">
	<?php 
		foreach($user['Profile'] as $tag=>$text) {
			echo '<dt',   ($i % 2 == 0) ? $class : '', '>', $tag, '</dt><dd>', $text, '&nbsp;</dd>', "\n";
		} 	
	?>
	</dl>
	</div>
</div>
	
	<div class="actions">
		<ul class="list-inline">
			<li><?php echo $this->Html->link(__('Edit User'), array('action'=>'edit', $user['User']['id'])); ?> </li>
			<li><?php echo $this->Html->link(__('List Users'), array('action'=>'index')); ?> </li>
		</ul>
	</div>
