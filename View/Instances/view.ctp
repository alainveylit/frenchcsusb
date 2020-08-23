<div class="instances view">
<h2><?php echo __('Instance'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($instance['Instance']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($instance['Instance']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quiz'); ?></dt>
		<dd>
			<?php echo $this->Html->link($instance['Quiz']['title'], array('controller' => 'quizzes', 'action' => 'view', $instance['Quiz']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Creator'); ?></dt>
		<dd>
			<?php echo $this->Html->link($instance['Creator']['name'], array('controller' => 'users', 'action' => 'view', $instance['Creator']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($instance['Instance']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Expires'); ?></dt>
		<dd>
			<?php echo h($instance['Instance']['expires']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($instance['Instance']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Instance'), array('action' => 'edit', $instance['Instance']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Instance'), array('action' => 'delete', $instance['Instance']['id']), array(), __('Are you sure you want to delete # %s?', $instance['Instance']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Instances'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Instance'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Quizzes'), array('controller' => 'quizzes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Quiz'), array('controller' => 'quizzes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Creator'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
