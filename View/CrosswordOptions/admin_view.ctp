<div class="crosswordOptions view">
<h2><?php echo __('Crossword Option'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($crosswordOption['CrosswordOption']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Clue'); ?></dt>
		<dd>
			<?php echo h($crosswordOption['CrosswordOption']['clue']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Crossword'); ?></dt>
		<dd>
			<?php echo $this->Html->link($crosswordOption['Crossword']['title'], array('controller' => 'crosswords', 'action' => 'view', $crosswordOption['Crossword']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Answer'); ?></dt>
		<dd>
			<?php echo h($crosswordOption['CrosswordOption']['answer']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Position'); ?></dt>
		<dd>
			<?php echo h($crosswordOption['CrosswordOption']['position']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Orientation'); ?></dt>
		<dd>
			<?php echo h($crosswordOption['CrosswordOption']['orientation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Startx'); ?></dt>
		<dd>
			<?php echo h($crosswordOption['CrosswordOption']['startx']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Starty'); ?></dt>
		<dd>
			<?php echo h($crosswordOption['CrosswordOption']['starty']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Crossword Option'), array('action' => 'edit', $crosswordOption['CrosswordOption']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Crossword Option'), array('action' => 'delete', $crosswordOption['CrosswordOption']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $crosswordOption['CrosswordOption']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Crossword Options'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Crossword Option'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Crosswords'), array('controller' => 'crosswords', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Crossword'), array('controller' => 'crosswords', 'action' => 'add')); ?> </li>
	</ul>
</div>
