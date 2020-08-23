<style>
	
	#letter-box { margin: 32px; border: 1px solid gray; padding: 24px; }
	#response { min-height: 32p; background: #EEE; min-width: 120px; }
	.success { background: yellow; border: 2px solid lavender; padding: 12px 24px; }
	.success:before { content: 'Bravo: "'; }
	.success:after { content: '" est la bonne réponse! '; }
	
	ul.connectedSortable { width: 100%; display: inline-block; line-size: 32px; margin-left: 1em; padding: 1px; }

	#letter-box ul li { border: 1px solid gray; width: 3em; height: 3em; 
		text-align: center;  list-style: none; 
		display: inline-block; 
		padding: 1em; 
	}
	
	#letter-box ul#letters li {  background: #FdFd00; }
	
	ul#drop { border: 1px solid gray; min-height: 50px; background: lightgray; }
	.navig { margin: 1em 0; padding: 12px 24px; }
	ul#drop li { background: #ffffff; }
	h2 { margin-left: 32px; }
	
	#letter-box #image { float: left; }
	#letter-box #image img { width: 200px; }
	
</style>	

	
<div class="wide">
	
	<h3>Mots brouillés:
			<?php echo $quiz['Quiz']['title'];?>
	</h3>


<?php
 //debug( $definitions ); 
 //debug($quiz);
 ?>

	<div id="letter-box">
		
		<h4><span id="definition"></span>		
			<small class="pull-right"><a href="javascript:" id="shuffle">Mélanger</a></small>
		</h4>
		<div id="image"> </div>
	<div>
		<ul id="letters" class="connectedSortable">	</ul>

		<ul id="drop" class="connectedSortable"></ul>
		
		<div class="navig">
			<span id="response"></span><span class="pull-right"><a href="javascript:" id="next">Question suivante</a></span>
		</div>
	</div>		
</div>

</body>

<script>

var alphabet="ABCDEFGHIJKLMNOPQRSTUVWXYZAEIOUÀÁÄÇÈÉÊËÔÙÛÜ".toLowerCase();
var alphabet_length=alphabet.length;
var letter_pool;
var pool_length=10;

var definitions = <?php echo json_encode($definitions);?>;
var type='word';
//---------------------------------------------------------------------------
function shuffle_pool(word)
{
	word=word.trim();
		var chunks = word.split(" ");
		if(chunks.length>1) {
			type='sentence';
			var scrum = shuffle(chunks);
			console.log(scrum);
			return scrum;
		}
	
	//load word letters as array, pad array to pool length, and shuffle it
    var total = 32;
    pool_length = word.length+4;
    letters=[];
 
    for (var i=0; i < word.length; i++) {
		letters.push(word[i]);
	}
    
    for (var i=word.length; i < pool_length; i++) {
        var rnd = Math.floor((Math.random()*total));
        letters.push(alphabet[rnd]);
   }

	var scrum = shuffle(letters);
	return scrum;
}
//---------------------------------------------------------------------------
function shuffle(word) {
  
    for (var i = word.length - 1; i > 0; i--) {
        var j = Math.floor(Math.random() * (i + 1));
        var temp = word[i];
        word[i] = word[j];
        word[j] = temp;
    }
    
   return word; 
}
//---------------------------------------------------------------------------
var clue_word;
var definition;
var active_index=0;
var current_definition;

$("document").ready( function() {
	
	
	$("#shuffle").click( function() {
		init(active_index);
	});

			     
		$( "#letters, #drop" ).sortable({
		  connectWith: ".connectedSortable",
				cursor: 'move',
				scroll: false,
				distance: 1,
				revert: true,
				 tolerance: "pointer",
			}).disableSelection();
				
		$("#next").click( function() {
			if(++active_index==definitions.length) {
				alert("Fin de l'exercice");
			} else {
				init(active_index);
			}
		});
		
		
	$( "#drop" ).on( "sortupdate", function( event, ui ) { check_response(event, ui); } );
	//console.log(definitions[0]);

	init(0);
    
//----------------------------------------------------------------------
  function init(index)
 {
	active_index=index;
	$("#image").empty();
	
	current_definition = definitions[index];
	clue_word  = current_definition.word.toLowerCase();
	definition = current_definition.definition;
	if(current_definition.image_url.length) {
		var img = $("<img>");
		img.attr('src', current_definition.image_url);
		$("#image").append(img);
	}
	load_word();
	$('#definition').html('<strong>Définition:</strong>  ' + definition);
	//console.log(type);
 	
 	if(type=='sentence') $("#letter-box ul li").css('padding', '1em 0em');

}
 //----------------------------------------------------------------------
 function load_word()
 {
	 $("#letters").empty();
	 $("#drop").empty();
	 $("#response").empty().removeClass('success');

	 letter_pool = shuffle_pool(clue_word);
		
		var ul = $("#letters");
		
		$.each( letter_pool, function(index, value) {
			var li = $("<li>");
			li.text(value);
			ul.append(li);
		});
		
	 $("#letters").show('slow');
 }
 //----------------------------------------------------------------------
    function check_response(event, ui)
{
	var response="";

	$("#drop li").each( function(index) {
		var letter = $(this).text();
		response+=letter;
		bg = (clue_word[index]==letter) ? 'lightgreen' : 'white';
		if(clue_word[index]==letter) $(this).css('background', bg);
		console.log('clues ['+clue_word[index]+'] = [' + letter + '] ['+definitions[index]+']');
				if(type=='sentence') response+=' ';

		
	});
	
	$("#response").text(response);
	
	response=response.replace(/ /g, "");
	var q = clue_word.replace(/ /g, "");
	
	if(type=='sentence') {
		var bg = 'white';
		if(response==q.substr(0, response.length)) bg='lightgreen';
		$('#drop li').css('background', bg);
	}
	console.log([q, response]);
	
	if(response==q) {
		$("#response").addClass('success');
		$("#letters").hide('slow');
		$('#drop li').css('background', 'lightgreen');
	}
	
}
 //----------------------------------------------------------------------
});
</script>
