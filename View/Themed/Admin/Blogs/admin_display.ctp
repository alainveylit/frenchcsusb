<div class="blogs wide-margins">
	<h2><?php echo $this->Html->link( __('Ma vie en France'), array('action'=>'index')); ?></h2>
	<div class="long-text">
	<?php foreach ($blogs as $blog): ?>
	<div class="row-fluid" style="overflow: auto;">
		<h4><?php echo h($blog['Blog']['title']); ?></h4>
			<?php 
			if(!empty($blog['Blog']['image'])):?> 
			<?php
				debug($blog['Blog']);
				$path = '/files/blog/image/' . $blog['Blog']['image_dir'] . DS . $blog['Blog']['image'];
			?>
				<img class="inset" src="<?php echo $path;?>" alt="mon image" style="max-width: 150px;">
			<?php endif;?>
			<?php echo $blog['Blog']['text']; ?>
			</div>
			<hr>
	<?php endforeach;?>
	</div>
	
	<table class="table table-striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('title', 'Sujets'); ?></th>
			<th><?php echo $this->Paginator->sort('modified', 'Date'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($blogs as $blog): ?>
	<tr>
		<td><?php echo h($blog['Blog']['title']); ?>&nbsp;</td>
		<td>
		 <?php 
			$englishdate = $this->Time->format($blog['Blog']['created'],  '%A %e %B %Y à %H:%M');
			echo $this->Crud->display_french_date($englishdate);
		 ?>
		 </td>
		<td class="actions">
			<?php echo $this->Html->link(__('Lire'), array('action' => 'view', $blog['Blog']['id'])); ?>
			<?php echo $this->Html->link(__('Editer'), array('action' => 'edit', $blog['Blog']['id'])); ?>
			<?php echo $this->Form->postLink(__('Effacer'), array('action' => 'delete', $blog['Blog']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $blog['Blog']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php /*
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));*/
	?>	</p>
	<div class="pager">
	<?php /*
		echo $this->Paginator->prev('< ' . __('precedent'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ' | '));
		echo $this->Paginator->next(__('suivant') . ' >', array(), null, array('class' => 'next disabled'));
	*/?>
	</div>
</div>

<div id="comment"></div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Ajouter une entrée dans mon journal'), array('action' => 'add')); ?></li>
	</ul>
</div>


<script>
	
	$('document').ready( function() {
				
		// Add a comment feature
		$('.add-comment').click( function() {			
				var fkey = $(this).attr('id');
				var model= '<?php echo Inflector::classify( $this->request->params['controller']);?>';
				//alert('commenting: ' + model + ' key: ' + fkey);
				$("#comment").load(router + 'comments/add_comment', { foreign_key: fkey, model: model } );
				$("#comment").bPopup({
					easing: 'easeOutBack', //uses jQuery easing plugin
					speed: 450,
					transition: 'slideDown'
				});
		});
			
	});

</script>

