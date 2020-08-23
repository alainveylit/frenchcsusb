<div class="options view">
<h2><?php echo __('Option'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($option['Option']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($option['Option']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Index'); ?></dt>
		<dd>
			<?php echo h($option['Option']['index']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Correct Answer'); ?></dt>
		<dd>
			<?php echo h($option['Option']['correct_answer']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo h($option['Option']['category']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quiz'); ?></dt>
		<dd>
			<?php echo $this->Html->link($option['Quiz']['title'], array('controller' => 'quizzes', 'action' => 'view', $option['Quiz']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question'); ?></dt>
		<dd>
			<?php echo $this->Html->link($option['Question']['text'], array('controller' => 'questions', 'action' => 'view', $option['Question']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image Id'); ?></dt>
		<dd>
			<?php echo h($option['Option']['image_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Audio Id'); ?></dt>
		<dd>
			<?php echo h($option['Option']['audio_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Option'), array('action' => 'edit', $option['Option']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Option'), array('action' => 'delete', $option['Option']['id']), array(), __('Are you sure you want to delete # %s?', $option['Option']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Options'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Option'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Quizzes'), array('controller' => 'quizzes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Quiz'), array('controller' => 'quizzes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
	</ul>
</div>
