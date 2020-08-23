<div class="fatty view">
		<small class="pull-right">
			<?php echo $this->Crud->view_crud('Slideshow', $slideshow['Slideshow']);?>
		</small>	

	<h2><span class="glyphicon glyphicon-film"> </span> 
	<?php 	echo $this->Html->link('Diaporama', array('action'=>'view', 'admin'=>false,  $slideshow['Slideshow']['id']), ['title'=>'Voir le diaporama']);?>
	</h2>
	<?php //debug($slideshow);?>

	<dl class="dl-horizontal">
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($slideshow['Slideshow']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo $slideshow['Slideshow']['description']; ?>
			&nbsp;
		</dd>
		
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($slideshow['Slideshow']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
	<div>
	<ul class="list-inline pull-right">
		<li><span class="glyphicon glyphicon-save"> </span><a href="javascript:" id="save-order" class=" green-gradient">Sauvegarder l'ordre des questions</a></li>
		<li><span class="glyphicon glyphicon-plus"> </span><a href="javascript:" id="<?php echo $slideshow['Slideshow']['id'];?>" class="add-option">Ajouter une image</a>	</li>
		<li><span class="glyphicon glyphicon-film"> </span> 
			<?php echo $this->Html->link('Diaporama', array('action'=>'view', 'admin'=>false,  $slideshow['Slideshow']['id']));?></li>
	</ul>
	</div>
		<div id="add-form"></div>
		<div>
		<small class="pull-right">				
			
		</small>

			<table class="table table-striped" id="sort">
				<?php foreach($slideshow['Slide'] as $slide) :?>
					<tr id="<?php echo $slide['id'];?>">
						<td><?php 
						$image_url = $this->Crud-> show_upload_thumbnail('slide', $slide);
						?></td>
						<td><?php echo $slide['title'];?></td>	
						<td><?php echo $this->Html->link('Editer', array('controller'=>'slides', 'action'=>'edit', 'admin'=>true, $slide['id']));?>
							<?php echo $this->Form->postLink(__('Effacer'), array('controller'=>'slides', 'action' => 'delete', $slide['id']), array('confirm' => __('Vous voulez vraiment effacer cette image?'))); ?> 
						</td>		
					</tr>
				<?php endforeach;?>
			</table>
		</div>
		
		
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-inline">
		<li><?php echo $this->Html->link(__('Editer le diaporama'), array('action' => 'edit', $slideshow['Slideshow']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Effacer le diaporama'), array('action' => 'delete', $slideshow['Slideshow']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $slideshow['Slideshow']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('Liste des diaporama'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nouveau diaporama'), array('action' => 'add')); ?> </li>
	</ul>
</div>


<script>	
	
	function onunload() {
		 alert("Stay on page?");
		 return false;
	}
		$('document').ready( function() {				
	
			$('.add-option').click( function() {
				$.post('/slides/add_option/', { slideshow_id: $(this).attr('id') }, function( data ) { 
					$('#add-form').html(data);
				});		
			});
	

			<?php echo $this->element('sort_js', array('controller'=>'slides'));?>

		});

			
		window.onbeforeunload = function(e) {
			if($('#save-order').hasClass('dirty')) {
			  //var dialogText = 'Saving order of slides';
			  //e.returnValue = null;
			  //console.log(dialogText);
			  $('#save-order').trigger('click');
		  }
		  return;
		};

</script>

