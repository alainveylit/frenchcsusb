var available_chats=[];
	
		/* Add a section comment feature
		$('.add-section-comment').click( function() {
				var fkey = $(this).attr('id');
				var model= 'Piece';
				return do_comment_dialog(fkey, model);
		});*/
		
	function load_event(id) {
	var div = $('<div></div>');
	//var div = parent.document.getElementById('calendar-event');
	div.load('/full_calendar/calendar_events/display/' + id);
	div.appendTo( parent.$("body #container") );
	div.dialog( { title: 'Calendar event', width: '800', height: '500' } );
}


  // ---------------------------------------------------	
  	function removeTinyMCE () {
		var i, t = tinyMCE.editors;
			for (i in t){
			  if (t.hasOwnProperty(i)){
				t[i].remove();
			  }
			}    
	}

		function edit_field(controller, id, fieldname) {
				var url = router + controller + '/' + edit_field;
				var dialog=$('<div class="loading"></div>');
				dialog.appendTo('body');				
				dialog.load(url);
				dialog.dialog();
		}

		
		function edit_image(model, id, node) {
				var url = router + 'images/edit_image/' + model + '/' + id;
				$("#image-form").load(url);
		}

		function add_link(model, id, node) {
				var url = router + 'links/add/' + model + '/' + id;
				$("#link-form").load(url);
			}
			
		function add_document(model, id, node) {
				var url = router + 'documents/add_document/' + model + '/' + id;
				$("#document-form").load(url);
			}
			
		function add_image(model, id, node) {
				var url = router + 'images/add_image/' + model + '/' + id;
				$("#image-form").load(url);
				//$('.expose').trigger('click');
				//$('#overlay').show().css('z-index', 900);
				//$("#image-form").bPopup();
		}


		function view_diff( target ) {
			
			var dialog = $('<div class="loading"></div>').appendTo('body');
			var version_id = $(target).attr('rel');
			dialog.load(router+'paragraphs/diff', { id: version_id} );
			
			dialog.dialog( {
					autoOpen: false,
					height: 400,
					width: 850,
					modal: true,
					title: 'View differences: ' + version_id ,
					buttons: {
						Revert: function() {	alert('Saving!'); },
						Delete : function() { 
							 $.ajax({
							   type: "POST",
							   url: router+'paragraphs/remove',
							   data: { id: version_id }, 
							   success: function(data)
							   {
									
									if(data==1) { 
										alert( 'This version has been removed' ); 
										target.remove();
										}
									else { 
										alert('Unable to remove this version!');
									}
									dialog.dialog( "close" );
									///dialog.remove();
								},
								error: function (jqXHR, textStatus, errorThrown) {
										alert('Error deleting! ' + textStatus);
									}

								});
						},
						Cancel: function() {
							$( this ).dialog( "close" );
							///dialog.remove();
						}

					},
						close: function( event, ui ) {
							//alert('closing');
							dialog.remove();  
						},
					open : function(event, ui) { $(this).removeClass('loading'); },
					
					error: function (jqXHR, textStatus, errorThrown) {
						alert('Error! ' + textStatus);
					},



			});
			
			dialog.dialog("open");
		}
		
		function quick_edit(controller, id) {

				var url = router + controller + '/quick_edit/' + id;
					
				var dialog=$('<div class="loading skinny" id="quick-edit"></div>');
				dialog.appendTo('body');				
				dialog.load(url);
				
				dialog.dialog( {
					autoOpen: false,
					height: 400,
					width: 850,
					modal: true,
					title: controller + ' quick edit: ' + id, 
					buttons: {
						"Save": function() {	
						 tinymce.activeEditor.save();
						 data = $(this).find('form').serialize();
						 $.ajax({
						   type: "POST",
						   url: url,
						   data: data, 
						   success: function(data)
						   {
							    var frame = $('div[rel="'+id+'"]').find('div.content');
								//alert( 'Your editing was saved' );
								data += '&nbsp; <a id="' + id + '" class="edit-frame" href="javascript:">edit[...]</a>';
								frame.html(data);
								dialog.dialog( "close" );
								///dialog.remove();
						   },

						});						
					 },
				
				Cancel: function() {
						$( this ).dialog( "close" );
						///dialog.remove();
					},
				},
				
				close: function( event, ui ) {
					 //alert('closing');
					 tinymce.activeEditor.remove();
					 dialog.remove();  },
				
				beforeclose: function(event, ui) {

				},
				error: function (jqXHR, textStatus, errorThrown) {
						alert('Error! ' + textStatus);
					},
				open : function(event, ui) { $(this).removeClass('loading'); }

					
		});
				//$(this).removeClass('loading');
				
				dialog.dialog("open");
	}


		function co_edit( id ) {

				var url = router +  'clips/co_edit/' + id;
					
				var dialog=$('<div class="loading skinny" id="co_edit"></div>');
				dialog.appendTo('body');
				dialog.load(url);
				
				dialog.dialog( {
					autoOpen: false,
					height: 400,
					width: 850,
					modal: true,
					title: 'Co-author edit: ' + id, 
					buttons: {
						"Save": function() {	
						 tinymce.activeEditor.save();
						 data = $(this).find('form').serialize();
						 $.ajax({
						   type: "POST",
						   url: url,
						   data: data, 
						   success: function(data)
						   {
							   alert(data);
							    //var frame = $('div[rel="'+id+'"]').find('div.content');
								//alert( 'Your editing was saved' );
								//data += '&nbsp; <a id="' + id + '" class="edit-frame" href="javascript:">edit[...]</a>';
								//frame.html(data);
								dialog.dialog( "close" );
								///dialog.remove();
						   },

						});						
					 },
				
				Cancel: function() {
						$( this ).dialog( "close" );
						///dialog.remove();
					},
				},
				
				close: function( event, ui ) {
					 //alert('closing');
					 tinymce.activeEditor.remove();
					 dialog.remove();  },
				
				beforeclose: function(event, ui) {

				},
				error: function (jqXHR, textStatus, errorThrown) {
						alert('Error! ' + textStatus);
					},
				open : function(event, ui) { $(this).removeClass('loading'); }

					
		});
				//$(this).removeClass('loading');
				
				dialog.dialog("open");
	}



$(document).ready( function() {

/*
		 $.ajax({
			   type: "POST",
			   url:  "/chats/get_available",
			   data: {  },
			   dataType: "json",
			
			   success: function(data){
				   available_chats = data;
				   //console.log(data);
			   },
			});

	if(mode!==undefined && mode=='write') {
		$('#content').css('background-color', 'rgba(200, 220, 180, 0.698)');
	}
	
	$('#story-bar > li').each( function( i ) {
			var controller = $(this).attr('id');
			//console.log(controller);
		       if(window.location.href.indexOf( controller ) >= 0)
            {
                 //alert("your controller is " + controller);
                 $(this).addClass('active');
            }
 
	});
*/	

		$("#announcement-title").click( function() {
				$('#announcement').load('/announcements/get_latest');
				 $('#announcement').bPopup({
						easing: 'easeOutBack', //uses jQuery easing plugin
						speed: 450,
						transition: 'slideDown'
					 });

		});

	$("#toggle-login").click( function() {
		
	$('#top-login').show('slow'); 
		// alert("Showing");
		$('#overlay').show().css('z-index', 900);
		
	});
	
	$('#login-close').click( function() { /*$('#top-login').hide('slow');*/ $('#overlay').trigger('click'); });

	$(".toggler") .click( function() {
		 $(this).next().toggle('slow'); 
	});

	$(".p_toggler") .click( function() {
		 $(this).parent().next().slideToggle('slow'); 
		 if( $(this).hasClass('show-down')) {
			 $(this).removeClass('show-down');
			 $(this).addClass('hide-up');
		 } else {
			 if( $(this).hasClass('hide-up')) {
				 $(this).removeClass('hide-up');
				 $(this).addClass('show-down');
			 }
		}
	});
	
	$('.close').click( function() { $(this).parent().parent().hide('slow'); });
	$('.close-menu').click( function() { $(this).parent().parent().parent().hide('slow'); });
	
	
	$('#top-navigation li').click( function() {
		var link= router +  $(this).find('a').attr('id');
		window.location.href=link;		
	});
	
	
	$('#show-menu').click( function() {
		$('#top-navigation').toggle('slow');
		$(this).toggleClass('up');	
		$(this).toggleClass('down');	
	});
	
	
	
	$('.expose').click(function(e){
		$(this).css('z-index','99999').css('display','block');
		$('#overlay').fadeIn(300);
		$('#overlay').css('z-index', 1);
	
	});

	$('#overlay').click(function(e){
			$('#top-login').hide('slow');
			$('#overlay').fadeOut(300, function(){
				$('.expose').css('z-index','1').css('display','none').empty();
				$(".add-image").css('display', 'inline');
				$('#overlay').css('z-index', -1);
		});
		
	});

		$('.show-up').click( function() {
			
			
		});


		$(".toggle-favorite").click( function() {
				var elem = $(this);
				var url = router + 'favorites/toggle_favorite';
				var action = elem.attr('rel')
				//console.log('Calling: ' + url);
				
				$request = $.ajax({
						url: url,
						//dataType: 'json',
						data: { 'model_id':  elem.attr('rel')  },
						success: function(data) {
							//console.log(data);
							elem.text(data);
						},
						error: function(jqXHR, textStatus, errorThrown) {
							errorThrown += "Please log in";
							var msg = textStatus + " : " + errorThrown;
							elem.text(textStatus);
						}
				});
				
		return false;
	});

		$('.crud-bar li').on('click', 'a.like', function() {
				var elem = $(this);
				var url = router + 'like';
				$request = $.ajax({
						url: url,
						//dataType: 'json',
						type: 'post',
						data: { 'model_id':  elem.attr('rel')  },
						success: function(data) {
							console.log(data);
							//elem.text(data);
							elem.removeClass('like').addClass('dislike').text('Unlike');
						},
						error: function(jqXHR, textStatus, errorThrown) {
							errorThrown += "Please log in";
							var msg = textStatus + " : " + errorThrown;
							elem.text(textStatus);
						}
				});
				
		return false;
});

		$('ul li').on('click', 'a.dislike', function() {
				var elem = $(this);
				var url = router + 'like';
				$request = $.ajax({
						url: url,
						//dataType: 'json',
						type: 'post',
						data: { 'model_id':  elem.attr('rel')  },
						success: function(data) {
							console.log(data);
							//elem.text(data);
							elem.removeClass('dislike').addClass('like').text('Like');
						},
						error: function(jqXHR, textStatus, errorThrown) {
							errorThrown += "Please log in";
							var msg = textStatus + " : " + errorThrown;
							elem.text(textStatus);
						}
				});
				
		return false;
});


	$('.co-edit').click( function() {
		alert("Co editing!");
		co_edit($(this).attr('rel'));
	});
		
	$(".remote-file li a").click( function(e) {
		var remote_download = router + "downloads/remote_file?site=" + $(this).attr('rel');
		window.location = remote_download;
		return false;
	});


$('#UserAjaxLoginForm').on( "submit", function( event ) {

	event.preventDefault();
	
    // Declare the form
    var form = $(this);

    // Get the data from the form
    var data = $(this).serialize();
	var current_page=window.location.href;

		$.ajax({
			type: form.attr('method'),
			url: form.attr('action'),
			data: data,
			success: function (success) {
				// If correct login details
				if(success){
					 //alert("You are logged in:" + success);
					 window.location.href=current_page;
				} else {        
					 alert('Sorry your login attempt failed');
				}

			},
			error: function (jqXHR, textStatus, errorThrown) {
					alert('System Error!' + textStatus);
			}

			});
	});
 

  		$('.add-annotation').click( function() {
				var fkey = $(this).attr('rel');
				$('#annotation').load(router + 'comments/annotate', { foreign_key: fkey } );
				
				 $('#annotation').bPopup({
						easing: 'easeOutBack', //uses jQuery easing plugin
						speed: 450,
						transition: 'slideDown'
					 });
               		
		});
		
				$('.view-annotation').click( function () {
					var fkey = $(this).attr('rel');
					
					
					$('#display-annotation').load( 
						router + 'comments/view_annotation', 
						{ id: fkey }, 
						 function() {
							$(this).bPopup( {
									easing: 'easeOutBack', //uses jQuery easing plugin
									speed: 450,
									transition: 'slideDown'
								})
						}
					);
				});

	
			$('.create-chat').click ( function() {
				$.ajax( {
					url: router + 'chats/add',
					data: { caller_id: $(this).attr('rel') },
					type: 'post', 
					success: function(data) {
						var result = $.parseJSON(data);
						if(result['chat_id']!==undefined) {
							var li = $('<li></li>');
							var a = $('<a href="javascript:" class="chat open-chat"></a>');
							a.attr('id', result['chat_id']);
							a.text(result['username']);
							a.appendTo(li);
							li.appendTo( $('#chat-bar > ul') );
							$("#chat-box").load('/chats/chat/', { id: result['chat_id'] } );
							$("#chat-box").show();
						}
					}
				});
				
			});
			 
			 $("#chat-bar ul").on('click', 'li a.chat', function() {
				$('#open-chats').toggle();
				$("#chat-box").load('/chats/chat/', { id: $(this).attr('id') } );
				$("#chat-box").show();
			});

			//$('.befriend').click( function() {
			$('ul.crud-bar li').on('click', 'a.befriend', function() {	
				var node=$(this);
				$.ajax( {
					url: router + 'profiles/befriend',
					type: 'post',
					data: { profile_id: $(this).attr('rel'), add: true},
					success: function(data) {
						//alert(data);
						if(data=='1') {
							 node.removeClass('befriend').addClass('unfriend');
							 node.text('Unfriend');
							 alert('Added to your friends');  }
					},
					error: function (jqXHR, textStatus, errorThrown) {
						alert('System Error!' + textStatus);
					}
				});
				
			});

//			$('.unfriend').click( function() {
			$('ul.crud-bar li').on('click', 'a.unfriend', function() {	
				
				var node=$(this);
				
				$.ajax( {
					url: router + 'profiles/befriend',
					type: 'post',
					data: { profile_id: $(this).attr('rel'), add: false},
					success: function(data) {
						//alert(data);
						if(data=='1') { 
							node.removeClass('unfriend').addClass('befriend'); 
							node.text('Add to my friends');
							alert('Removed from your friends'); }
					},
					error: function (jqXHR, textStatus, errorThrown) {
						alert('System Error!' + textStatus);
					}
				});
				
			});

});
