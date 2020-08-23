<div class="container-fluid">

<div class="cartouche">
	
	<ul class="nav nav-pills pull-right">
		<li><button type="button" class="btn btn-info add-comment  pull-right"  id="<?php echo $document['Document']['id'];?>">Add a comment</button></li>
		<li><button type="button" class="btn btn-warning view-comments  pull-right" onclick='location.href="#view-comments"'>View comments</button></li>
	</ul>
	
	<div id="comment"></div>

	<div class="cartouche">	
		<h3><?php echo h($document['Document']['title']); ?></h3>
		
		<?php echo $document['Document']['notes']; ?>

		<?php echo $this->element('document', array('document'=>$document['Document']));?>
	</div>

	<dl class="dl-horizontal">
		<dt><?php echo __('Document title'); ?></dt>
		<dd title="<?php echo h($document['Document']['document']); ?>">
			<?php echo $this->Html->link($document['Document']['title'], 
			array('action'=>'download',$document['Document']['id'], 'write'=>false) ); ?>
			&nbsp;
		</dd>
				<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo h($document['Document']['category']); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('Creator'); ?></dt>
		<dd>
			<?php echo $this->Html->link($document['Creator']['name'], 
			array('controller' => 'users', 'action' => 'view', $document['Creator']['id'], 'write'=>false)); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mime'); ?></dt>
		<dd>
			<?php echo h($document['Document']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Size'); ?></dt>
		<dd>
			<?php echo h($document['Document']['size']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo $this->Time->niceShort($document['Document']['created']); ?>
			&nbsp;
		</dd>
	</dl>
	
	

	<h3>Comments: </h3>
	<div id="view-comments">
	<?php foreach($document['Comment'] as $comment) :?>
	<div class="row-fluid cartouche">
			<p class="light-blue"><?php echo $comment['Creator']['name'];?> <small class="pull-right"><?php echo $comment['created'];?></small></p>
			<div><?php echo $comment['comment'];?>
			</div>
	</div>
	<?php endforeach;?>
	<?php //debug($document['Comment']);?>
	</div>


	<div class="actions">
		<h3><?php echo __('Actions'); ?></h3>
			<ul class="list-inline">
				 <?php if($User['id']==$document['Document']['creator']):?>

				<li><span class="glyphicon glyphicon-edit"> </span> <?php echo $this->Html->link(__('Edit Document'), array('action' => 'edit', $document['Document']['id']), array('class'=>'edit')); ?> </li>
				<li><span class="glyphicon glyphicon-remove"> </span> <?php echo $this->Form->postLink(__('Delete Document'), array('action' => 'delete', $document['Document']['id']),  array('class'=>'cut'), __('Are you sure you want to delete # %s?', $document['Document']['id'])); ?> </li>
				<?php endif;?>
				<li><span class="glyphicon glyphicon-list"> </span> <?php echo $this->Html->link(__('List My Documents'), array('action' => 'index'),  array('class'=>'list')); ?> </li>
			</ul>
	</div>

</div>


<script>
	
	
	$(document).ready( function() {

		// Add a comment feature
		$('.add-comment').click( function() {
			//alert('commenting');
				var fkey = $(this).attr('id');
				var model= '<?php echo Inflector::classify( $this->request->params['controller']);?>';
				$("#comment").load('/comments/add_comment', { foreign_key: fkey, model: model } );
				$("#comment").bPopup({
					easing: 'easeOutBack', //uses jQuery easing plugin
					speed: 450,
					transition: 'slideDown'
				});
				//$('.expose').trigger('click');
				//return do_comment_dialog(fkey, model);
				//alert(model);
		});
		
	});

</script>
