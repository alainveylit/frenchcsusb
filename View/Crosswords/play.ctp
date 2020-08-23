<div class="fatty view">	
	<div id="puzzle-wrapper"></div>
</div>
	
<script>
	
	$('document').ready( function() {				
			var puzzle_data = <?php echo json_encode($data);?>;	
			$('#puzzle-wrapper').crossword(puzzle_data);
			
		if(solve_puzzle) {
			
			$.each(definitions, function(index, value) {
				output_word(value);
				

			});
		}				
			
			function output_word( definition) { 
				
				console.log(definition);
						var row = definition.starty;
						var col = definition.startx;
				
				
					for(var i = 0; i < definition.answer.length; i++) {
						var cell = $('table#puzzle tr:nth-child(' + row + ') td:nth-child(' + col +')');
						var input = cell.find("input");
						input.val(definition.answer[i]);
						if(definition.orientation) {
							row++;
						} else { col++; }
						
						/*
						var cell = (definition.orientation) ? 
						$('table#puzzle tr:nth-child(' + row + ') td:nth-child(' + col + i ')') :
						$('table#puzzle tr:nth-child(' + row + i ') td:nth-child(' + col + ')');
						
						var input = cell.find("input");
							if(input) {
								input.val(value.answer[i]);
							}*/
					
				}
			}
	});
</script>

