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
		var val=$('.register_field').val();
		if(val==''){
			$("#err_msg").html("<span class='text-warning'>All fields are compulsory </span>");
		}else
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

	//New Employer/Company addition
	$('body').delegate('#employer_add_btn','click',function(e){
		
		var val=$('.employer_field').val();
		if(val==''){
			$("#err_msg").html("<h5 class='text-warning'>All fields are compulsory </h5>").fadeOut().fadeIn();
			e.preventDefault();
		}
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

	//Job Deletion by trash icon
	$('body').delegate('.delete_job_posted','click',function(e){
		e.preventDefault();
		var id=$(this).attr('id');
		$.ajax({
			url: 'admin_panel.php',
			method: 'POST',
			data:{delete_job_posted:1,id:id},
			success:function(data){
				alert("Posted Job removed!");
				window.location.reload();
			}
		})
	})


	//Job Applications Deletion by trash icon
	$('body').delegate('.remove_job','click',function(e){
		e.preventDefault();
		var id=$(this).attr('id');
		$.ajax({
			url: 'admin_panel.php',
			method: 'POST',
			data:{remove_job:1,id:id},
			success:function(data){
				alert("Job Application removed!");
				window.location.reload();
			}
		})
	})

	//Employer deletion by trash icon
	$('body').delegate('.remove_employer','click',function(e){
		e.preventDefault();
		var id=$(this).attr('id');
		$.ajax({
			url: 'admin_panel.php',
			method: 'POST',
			data:{remove_employer:1,id:id},
			success:function(data){
				alert("Employer removed!");
				window.location.reload();
			}
		})
	})
})