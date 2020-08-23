<?php echo $this->element('tinymce');?>
<div class="blogs wide-margins">
	<div>
	<?php echo $this->Form->create('Blog', ['type'=>'file']); ?>
		<fieldset>
			<legend><?php echo __('Editer mon journal'); ?>
				<small class="pull-right">
					<ul class="list-inline">
						<li><?php echo $this->Form->postLink(__('Effacer'), array('action' => 'delete', $this->Form->value('Blog.id')), array('class'=>'erase', 'confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Blog.id')))); ?></li>
						<li><?php echo $this->Html->link(__('Mon journal'), array('action' => 'index'), array('class'=>'list')); ?></li>
					</ul>
				</small>
			</legend>
			
		<?php
			echo $this->Form->input('id');
			echo $this->Form->input('title', ['label'=>'Sujet', 'style'=>'width: 600px']);
			echo $this->Form->input('text', ['label'=>'Texte']);
			//echo $this->Form->input('creator', ['value'=>$creator]);
			echo $this->Form->file('image');
			echo $this->Form->hidden('image_dir');
		?>
		<?php echo $this->Form->end(__('Enregistrer')); ?>
		
		</fieldset>
		
	</div>
	<div class="actions">
		<?php echo $this->element('keyboard_shortcuts');?>
		<h3><?php echo __('Actions'); ?></h3>
			<ul class="list-inline">
				<li><?php echo $this->Form->postLink(__('Effacer'), array('action' => 'delete', $this->Form->value('Blog.id')), array('class'=>'erase', 'confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Blog.id')))); ?></li>
				<li><?php echo $this->Html->link(__('Mon journal'), array('action' => 'index'), array('class'=>'list')); ?></li>
			</ul>
	</div>
</div>
