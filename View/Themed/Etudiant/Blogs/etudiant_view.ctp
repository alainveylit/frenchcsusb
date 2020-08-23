<style>
.long-text { min-height: 350px; }
.actions { margin-top: 2em; border-top: 1px gray solid; }
.comments { background: #efefef;  border-top: 1px gray solid; margin-top: 1em; }
</style>
<div class="wide-margins white">
	
<h2><?php echo $this->Html->link( __('Mon cahier'), array('action'=>'index'));  ?>
	<small class="pull-right">
		Date: 		 <?php 
			$englishdate = $this->Time->format($blog['Blog']['created'],  '%A %e %B %Y à %H:%M');
			echo $this->Crud->display_french_date($englishdate);
		 ?>
	</small>
</h2>
<hr>
<h3>Sujet: <?php echo h($blog['Blog']['title']); ?></h3>

<div class="long-text">
	
	<?php 
	if(!empty($blog['Blog']['image'])):?> 
	<?php
		//debug($blog['Blog']);
		$path = '/files/blog/image/' . $blog['Blog']['image_dir'] . DS . $blog['Blog']['image'];
	?>
		<img class="inset" src="<?php echo $path;?>" alt="mon image">
	<?php endif;?>
	
	<?php echo $blog['Blog']['text']; ?>

</div>
<p>Dernière modification: <?php 
			$englishdate = $this->Time->format($blog['Blog']['modified'],  '%A %e %B %Y à %H:%M');
			echo $this->Crud->display_french_date($englishdate);
		 ?>
</p>

	<div class="actions">
		<h3><?php echo __('Actions'); ?></h3>
		<ul class="list-inline">
			<li><?php echo $this->Html->link(__('Mon journal'), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('Editer cette entrée'), array('action' => 'edit', $blog['Blog']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Effacer cette entrée'), array('action' => 'delete', $blog['Blog']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $blog['Blog']['id']))); ?> </li>
			<li><?php echo $this->Html->link(__('Ajouter une entrée'), array('action' => 'add')); ?> </li>
		</ul>
	</div>

<div>
	

			<?php if(!empty($blog['Comment'])):?>
				<div class="comments"><strong>Commentaires du prof: </strong>
					<?php foreach($blog['Comment'] as $comment) :?>
						<p><?php echo $comment['comment'];?></p>
					<?php endforeach;?>
				</div>
			<?php endif;?>

</div>

</div>


