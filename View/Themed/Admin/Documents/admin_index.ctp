		<div class="wide">
			<h2><?php echo __('Documents'); ?>
				<small>
					<ul class="nav nav-pills pull-right clearfix">
						<li class="active">
						<?php echo $this->Html->link(__('Ajouter un document'), array('action'=>'add', 'admin'=>true));?>								
						</li>
						<!--li><?php //echo $this->Html->link(__('My URL links'), array('controller'=>'links', 'action'=>'index'), array('class'=>'list'));?></li-->
					</ul>
				</small>
			</h2>							
		</div>
	<div class="panel-body">
<?php /*		
	<h2><?php echo __('Documents'); ?>
			<ul class="nav nav-pills pull-right clearfix pull-right">
					<li class="active">
					<?php echo $this->Html->link(__('Add a document'), array('action'=>'add'), array('class'=>'small'));?>								
					</li>
					<!--li><?php //echo $this->Html->link(__('My URL links'), array('controller'=>'links', 'action'=>'index'), array('class'=>'list'));?></li-->
			</ul>	
	</h2>
	* */?>
	<div class="fatty cartouche">
		<?php echo $this->element('documents_2', array('document'=>$documents, 'admin'=>true));?>
	</div>				
	
</div>
