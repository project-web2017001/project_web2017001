$(document).ready(function(){

	//Job sidebar
	$('#job_sidebar').click(function(e){
		e.preventDefault();
		$('a').removeClass('active');
		$(this).addClass('active');
		$.ajax({
			url: 'admin_panel.php',
			method: 'POST',
			data:{job:1},
			success: function(data){
				$('#center_content').html(data);
			}
		})
		
	})

	//Application Sidebar
	$('#app_sidebar').click(function(e){
		e.preventDefault();
		$('a').removeClass('active');
		$(this).addClass('active');
		$.ajax({
			url: 'admin_panel.php',
			method: 'POST',
			data:{app:1},
			success: function(data){
				$('#center_content').html(data);
			}
		})
	}) 

	//Employer Sidebar
	$('#employer_sidebar').click(function(e){
		e.preventDefault();
		$('a').removeClass('active');
		$(this).addClass('active');
		$.ajax({
			url: 'admin_panel.php',
			method: 'POST',
			data:{employer:1},
			success: function(data){
				$('#center_content').html(data);
			}
		})
	})

	//Preview Sidebar
	$('#preview_sidebar').click(function(e){
		e.preventDefault();
		window.open('index.php','_blank');
	})

	//Logout already figured out

	//New Job addition
	$('body').delegate('#admin_job_submit','click',function(e){
		e.preventDefault();
		$.ajax({
			url: 'admin_job_add.php',
			method: 'POST',
			data:$('#admin_job_add').serialize(),
			success: function(data){
				$("#err_msg").html(data);
				$('#admin_job_add').trigger('reset');
			}
		})
	})

	//Job Addition Form Validation (External jQuery Plugin)
	$("#admin_job_add").denetmen({
	  modal: {
	    title: "Oppss!",
	    button: "Okey",
	    buttonClass: "success",
	    fade: true
	  }
	});

})