	<div class="row panel-body">
		<div class="panel-heading">
			<h2 style="border-bottom: 1px solid gray; padding-bottom: 8px;" ><span class="fleuron small-flower"> </span><?php echo __('Available current projects'); ?>
			</h2>
		</div>
	<div class="panel-body">
		<div class="long-text">
		<p>Here is a list of projects available on this site. Each project represents an effort to highlight a specific set of 
		 music pieces, either by the same composer, from the same manuscript or with a common theme: Susanna and the elders, 
		 for instance or a common melody or rhythm. The first project is a transcription and intabulation 
		 of the Filippo Dalla Casa Bologna manuscript, that presents a number of specific challenges. 
		</p>
		<p></p>
		</div>
	<table class="table table-striped">
		<thead>
			<tr>
				<th><?php echo $this->Paginator->sort('name'); ?></th>
				<th>Description</th>
				<th><?php echo $this->Paginator->sort('creator'); ?></th>
			</tr>
		</thead>
	<tbody>
	<?php foreach ($projects as $project): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($project['Project']['name'], array('action' => 'view', $project['Project']['id']));?>
			</td>
		<td>
			<div class="long-text"><?php echo $project['Project']['description']; ?></div>
		</td>
		<td><?php echo $project['Creator']['name']; ?></td>
		
	</tr>
<?php endforeach; ?>
	</tbody>
</table>

<?php /*
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
	* */?>
	
</div>
		<?php //debug($projects);?>


</div>
