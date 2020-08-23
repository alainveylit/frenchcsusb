
<div id="comment-form-inner">


		<?php
				//debug($model);
				$user_id = $model['user_id'];
				$foreign_key = $model['foreign_key'];

		?>

		<?php echo $this->Form->create('Comment', array('url'=>'add'/* . $foreign_key*/));?>

		<h3><?php echo $model['title']; ?></h3>		

		<fieldset>
				<p><legend><?php echo __($model['user_name'] . ' is adding a comment');?></p></legend>

			<?php
				echo $this->Form->input('comment');
				echo $this->Form->input('user_id', array('value'=>$user_id, 'type'=>'hidden'));
				echo $this->Form->input('foreign_key', array('value'=>$model['foreign_key'], 'type'=>'hidden'));
				echo $this->Form->input('model', array('type'=>'hidden', 'value'=>$model['alias']));
				echo $this->Form->input('owner', array('type'=>'hidden','value'=>$model['owner']));
			?>
				
				<?php echo $this->Form->end('Submit');?>

		</fieldset>

</div>

<script>


</script>
