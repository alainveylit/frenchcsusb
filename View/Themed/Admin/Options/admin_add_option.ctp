<div class="ajax-form">
<?php //debug($this->request->data);?>

<?php echo $this->Form->create('Option', array('action'=>'add', 'admin'=>true, 'class'=>'form-inline')); ?>
<?php 
		echo $this->Form->hidden('question_id', array('value'=>$this->request->data['question_id']));
		echo $this->Form->hidden('creator', array('value'=>$this->request->data['creator']));
		echo $this->Form->input('title', array('placeholder'=>'texte de cette option', 'class'=>'form-group'));
		echo $this->Form->input('correct_answer', array('class'=>'form-group'));

?>

<?php /*
  <div class="form-group">
    <label class="sr-only" for="OptionTitle">Title</label>
    <input type="input" class="form-control" id="OptionTitle" placeholder="option text">
  </div>
  <div class="form-group">
    <label>Correct  </label>
      <input type="checkbox" id="OptionCorrectAnswer"> 
  </div>
  * */?>
  
<?php echo $this->Form->end("Ajouter cette option!");?>


</div>
<script>
/*
        $(document).ready(function() { 
            $('#OptionAddForm').ajaxForm(function() { 
                alert("Thank you for your comment!"); 
               // $('#update-title').text("Option updated");
                return true;
            }); 
        }); 
*/
</script>
