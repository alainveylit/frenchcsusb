<style>
label { width: auto; }

</style>
<div class="form">
<?php //debug($this->request->data);?>

<?php echo $this->Form->create('Option', array('url'=>['action'=>'edit'], 'class'=>'form-inline')); ?>
<?php 
		echo $this->Form->hidden('question_id'); //, array('value'=>$this->request->data['question_id']));
		//echo $this->Form->hidden('creator', array('value'=>$this->request->data['creator']));
?>
	<table class="table"><tr><td>
		<?php echo $this->Form->input('id'); ?>
		<?php echo $this->Form->input('title'); ?>
	</td><td>
		<?php echo $this->Form->input('correct_answer', array('class'=>'form-group'));?>
	</td>
	<td><?php echo $this->Form->end("Editer");?>
	</td>
      </tr>
   </table>	


</div>
<script>
/*
        $(document).ready(function() { 
            $('#OptionEditTitleForm').ajaxForm(function() { 
                //alert("Thank you for your comment!"); 
                $('#update-title').text("Option updated");
                return false;
            }); 
        }); 
*/
</script>
