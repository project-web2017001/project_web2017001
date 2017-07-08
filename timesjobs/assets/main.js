$(document).ready(function(){

	//For Modal-showup in index.php
	$('.modalForm').click(function(e){
		e.preventDefault();
		$('#modalF').modal('show');
	})
	//For display of left sidebar in index.php and home.php and results.php
	get_cat();
	get_comp();
	feed();
	function get_cat(){
		$.ajax({
			url: 'action.php',
			method: 'POST',
			data: {get_cat:1},
			success: function(data){
				//console.log(data);
				$('#get_cat').html(data);
			}
		})
	}
	
	function get_comp(){
		$.ajax({
			url: 'action.php',
			method: 'POST',
			data: {get_comp:1},
			success: function(data){
				//console.log(data);
				$('#get_comp').html(data);
			}
		})
	}


	//FOR FEATURED JOBS ON INDEX.PHP AND HOME.PHP
	function feed(){
		$.ajax({
			url: 'action.php',
			method: 'POST',
			data: {feed_jobs:1},
			success: function(data){
				//console.log(data);
				$('#feed_jobs').html(data);
			}
		})
	}

	//For Detail page navigation
	$('body').delegate('.detail','click',function(e){
		e.preventDefault();
		var jid=$(this).attr('jid');
		//alert(jid);
		if(jid){
			window.location='/timesjobs/details.php?jid='+jid;
		}
	})

	//For sign-in functionality
	$('body').delegate('#signin_btn','click',function(e){
		e.preventDefault();
		
		var email=$('#email').val();
		var pwd=$('#password').val();
		$.ajax({
			url: "logincheck.php",
			method: "POST",
			data: {userLogin:1,email:email, pwd:pwd},
			success: function(data){
				if(data=="true"){
					console.log(data);
					window.location.reload();
				}
			}
		})
	})

	//For registration purpose
	$('body').delegate('#register_btn','click',function(e){
		e.preventDefault();
		var field=$('.register_field').val();
		if(field==''){
			alert("All fields are compulsory!");
		}

		else
		$.ajax({
			url: "register.php",
			method: "POST",
			data: $('#registration').serialize(),
			success: function(data){
				console.log(data);
				$("#err_msg").html(data);
				$('#registration').trigger('reset');
				//$('#modalF').modal('hide');
			}
		})
	})

	//For search functionalities
	$('#search_button').click(function(e){
		e.preventDefault();
		var query=$('#searchbox').val()
		// alert(q);
		window.location.href="results.php?q="+query;
	})

	//Search from the index.php
	instasearch();
	function instasearch(){
		var q=$('.ajax_search_field').val();
		$.ajax({
			url: "search.php",
			method: "POST",
			data: {query:q},
			success: function(data){
				
				$('#ajaxresults').html(data);
				//console.log(data);
			}
		})
	}


	//For search results in results.php
	$('.ajax_search_btn').click(function(){
		var q=$('.ajax_search_field').val();
		// alert(q);
		$.ajax({
			url: "search.php",
			method: "POST",
			data: {query:q},
			success: function(data){
				
				$('#ajaxresults').html(data);
				//console.log(data);
			}
		})
	})

	//For Resume-upload on apply.php
	$("#resume_upload").click(function(e){
		var fileValue=$('#resume').val();
		if(fileValue==''){
			// alert(0);
			$('#resume_error').html("<span class='bg-danger'> No file chosen! </span>").fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
			e.preventDefault();
		}
		
	})

	//For modal-display on details.php
	$('.signin_modal').click(function(e){
		e.preventDefault();
		$('#modal_signin').modal('show');
	})



	//For sidebar-industry filter
	$('body').delegate('.category_sidebar','click',function(e){
		e.preventDefault();
		var id=$(this).attr('id');
		$.ajax({
			beforeSend: function(){
			     $('#feed_jobs').html('<img src="assets/images/spinner-transparent.gif" width="100px" height="100px" style="margin-left:50%; margin-top:20%;">');
			   },
			url: "action.php",
			method: "POST",
			data: {category_feed:1,id:id},
			success: function(data){
				function display(){
					$('#feed_jobs').html(data).hide().fadeIn('slow');
				}
				setTimeout(display,1000);
			}
		})
	})

	//For sidebar-industry filter
	$('body').delegate('.category_sidebar2','click',function(e){
		e.preventDefault();
		var id=$(this).attr('id');
		console.log(id);
		$.ajax({
			beforeSend: function(){
			     $('#feed_jobs').html('<img src="assets/images/spinner-transparent.gif" width="100px" height="100px" style="margin-left:50%; margin-top:20%;">');
			   },
			url: "action.php",
			method: "POST",
			data: {category_feed2:1,id:id},
			success: function(data){
				
				function display(){
					$('#feed_jobs').html(data).hide().fadeIn('slow');
				}
				setTimeout(display,1000);
			}
		})
	})
	
})