<div class="container-fluid">
	<?php //debug($image);?>
	
	<?php 
		$model = $image['Image']['model'];
		$model_title = isset($image[$model]['name']) ? $image[$model]['name'] : $image[$model]['title'];
		
		//$defaultTitle = $model->defaultField;
	?>
	
		<h2><?php echo $model, __(' Image for: '),
						$this->Crud->link_to_model(
										$image['Image']['model'], 
										$image['Image']['foreign_key'],
										$model_title);?> 
		</h2>

	<p class="right-aligned black-crud"><?php echo $this->Html->link(__('List my images'), array('action' => 'index'), array('class'=>'list'));?>
	</p>
	<div class="horz-band selfish">

			<div class="left centered">
				<div class="thumbnail-wrapper">
					<p><?php echo $this->Crud->thumbnail_to_image($image['Image']); ?></p>
					<p><?php 
						if($this->request->prefix=='write') {
							echo $this->Html->link(__("Edit image"), array('action'=>'edit', $image['Image']['id']));
						}
						?>
					</p>
				</div>
			</div>
	
	<div class="right">

	<?php $title_field = (isset($image['Image']['title'])) ? 'title' : 'name';?>
			<dl class="dl-horizontal">
				<dt><?php echo __('Title'); ?></dt>
				<dd>
					<?php echo $image['Image'][$title_field];?>
					&nbsp;
				</dd>
				<dt><?php echo __('Image'); ?></dt>
				<dd>
					<?php echo h($image['Image'][$model]); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Position'); ?></dt>
				<dd>
					<?php echo h($image['Image']['position']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Alignment'); ?></dt>
				<dd>
					<?php echo h($image['Image']['alignment']); ?>
					&nbsp;
				</dd>
				<dt><?php echo $model;  ?></dt>
				<dd>
					<?php 
					//debug($image[$model]);
					echo $this->Crud->link_to_model(
						$image['Image']['model'], 
						$image['Image']['foreign_key'], 
						(isset($image[$model]['name'])) ? $image[$model]['name']: $image[$model]['title']);
					
					/*echo $this->Html->link($image['Image']['model'], 
								array( 'controller'=>Inflector::underscore(
														Inflector::pluralize($image['Image']['model'])),
										'action'=>'view', 
										$image['Image']['foreign_key'])
								
								);*/
				 ?>
					&nbsp;
				</dd>
				
				<dt><?php echo __('Created'); ?></dt>
				<dd>
					<?php echo $this->Time->niceShort($image['Image']['created']); ?>
					&nbsp;
				</dd>
			</dl>
		</div>
	</div>

</div>
