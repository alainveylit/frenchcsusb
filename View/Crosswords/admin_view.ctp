<div class="fatty view">
<h2><?php echo __('Crossword'); ?></h2>
<?php //debug($definitions);?>
	<dl class="dl-horizontal">
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($crossword['Crossword']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Titre'); ?></dt>
		<dd>
			<?php echo $crossword['Crossword']['title']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo $crossword['Crossword']['description']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cours'); ?></dt>
		<dd>
			<?php echo $this->Html->link($crossword['Cour']['titre'], array('controller' => 'cours', 'action' => 'view', $crossword['Cour']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Creator'); ?></dt>
		<dd>
			<?php echo h($crossword['Creator']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo $this->Time->niceShort($crossword['Crossword']['created']); ?>
			&nbsp;
		</dd>
	</dl>

<div class="row">
		<p><span class="glyphicon glyphicon-plus"> </span><a href="javascript:" id="<?php echo $crossword['Crossword']['id'];?>" class="add-option">Ajouter une option</a></p>
		<div id="add-form" class="fatty bordered" style="display: none; background: lavender;">
		
				<?php echo $this->Form->create('CrosswordOption', array('url'=>'/crossword_options/add')); ?>
					<fieldset>
					<?php
						echo $this->Form->hidden('crossword_id', ['type'=>'text', 'value'=>$crossword['Crossword']['id']]);
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
					</fieldset>
				<?php echo $this->Form->end(__('Submit')); ?>
		</div>
		
				<div id="crossword" style="width:100%">

</div>

<div class="row">

<hr style="margin-top: 2em">
		<div class="actions">
			<h3><?php echo __('Actions'); ?></h3>
			<ul class="list-inline">
				<li><?php echo $this->Html->link(__('Editer ce probleme'), array('action' => 'edit', $crossword['Crossword']['id'])); ?> </li>
				<li><?php echo $this->Form->postLink(__('Effacer ce probleme'), array('action' => 'delete', $crossword['Crossword']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $crossword['Crossword']['id']))); ?> </li>
				<li><?php echo $this->Html->link(__('Liste des mots-croises'), array('action' => 'index')); ?> </li>
			</ul>
		</div>

	</div>
	
</div>


<div class="related">
	<h3><?php echo __('Related Crossword Options'); ?>
	
	<small class="pull-right">			
		<a href="javascript:" id="save-order" class=" green-gradient">Reindexer</a>
</small>
	</h3>
	<?php if (!empty($crossword['CrosswordOption'])): ?>
	<table class="table table-striped table-bordered" id="sort">
	<tr>
		<th><?php echo __('Index'); ?></th>
		<th><?php echo __('Orientation'); ?></th>
		<th><?php echo __('Question'); ?></th>
		<th><?php echo __('Reponse'); ?></th>
		<th><?php echo __('x-position'); ?></th>
		<th><?php echo __('y-position'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($crossword['CrosswordOption'] as $crosswordOption): ?>
		<tr  id="<?php echo $crosswordOption['id'];?>">
			<td><?php echo $crosswordOption['position']; ?></td>
			<td><?php echo ($crosswordOption['orientation']) ? 'Vertical' : 'Horizontal'; ?></td>
			<td><?php echo $crosswordOption['clue']; ?></td>
			<td><?php echo $crosswordOption['answer']; ?></td>
			<td><?php echo $crosswordOption['startx']; ?></td>
			<td><?php echo $crosswordOption['starty']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'crossword_options', 'action' => 'edit', $crosswordOption['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'crossword_options', 'action' => 'delete', $crosswordOption['id']), array('confirm' => __('Are you sure you want to delete # %s?', $crosswordOption['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
<div class="row">
		<p><span class="glyphicon glyphicon-plus"> </span><a href="javascript:" id="<?php echo $crossword['Crossword']['id'];?>" class="add-option">Ajouter une option</a></p>
		<div id="add-form" class="fatty bordered" style="display: none; background: lavender;">
		
				<?php echo $this->Form->create('CrosswordOption', array('url'=>'/crossword_options/add')); ?>
					<fieldset>
					<?php
						echo $this->Form->hidden('crossword_id', ['type'=>'text', 'value'=>$crossword['Crossword']['id']]);
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
					</fieldset>
				<?php echo $this->Form->end(__('Submit')); ?>
		</div>
		
				<div id="crossword" style="width:100%">

</div>

<div class="row">

<hr style="margin-top: 2em">
		<div class="actions">
			<h3><?php echo __('Actions'); ?></h3>
			<ul class="list-inline">
				<li><?php echo $this->Html->link(__('Editer ce probleme'), array('action' => 'edit', $crossword['Crossword']['id'])); ?> </li>
				<li><?php echo $this->Form->postLink(__('Effacer ce probleme'), array('action' => 'delete', $crossword['Crossword']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $crossword['Crossword']['id']))); ?> </li>
				<li><?php echo $this->Html->link(__('Liste des mots-croises'), array('action' => 'index')); ?> </li>
			</ul>
		</div>

	</div>
	
</div>

</div>

<script>	
	
	var definitions=<?php echo $definitions;?>;
	var solve_puzzle=true;
	
		$('document').ready( function() {				
	
			$('.add-option').click( function() {
				$("#add-form").toggle('slow');
			});
						
			$("#crossword").load('/crosswords/play/' + <?php echo $crossword['Crossword']['id']; ?>);

			<?php echo $this->element('sort_js', array('controller'=>'crossword_options'));?>

		});

</script>
