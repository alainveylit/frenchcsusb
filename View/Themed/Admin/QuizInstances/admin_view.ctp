<div class="quizInstances view">
<h2><?php echo __('Quiz Instance'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($quizInstance['QuizInstance']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Points'); ?></dt>
		<dd>
			<?php echo h($quizInstance['QuizInstance']['points']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quiz'); ?></dt>
		<dd>
			<?php echo $this->Html->link($quizInstance['Quiz']['title'], array('controller' => 'quizzes', 'action' => 'view', $quizInstance['Quiz']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($quizInstance['User']['name'], array('controller' => 'users', 'action' => 'view', $quizInstance['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Score'); ?></dt>
		<dd>
			<?php echo h($quizInstance['QuizInstance']['score']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($quizInstance['QuizInstance']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Quiz Instance'), array('action' => 'edit', $quizInstance['QuizInstance']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Quiz Instance'), array('action' => 'delete', $quizInstance['QuizInstance']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $quizInstance['QuizInstance']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Quiz Instances'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Quiz Instance'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Quizzes'), array('controller' => 'quizzes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Quiz'), array('controller' => 'quizzes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
