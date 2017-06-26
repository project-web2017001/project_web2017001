$(document).ready(function(){

	$('#email_edit').click(function(e){
		e.preventDefault();
		var email_current=$('#profile_email').val();
		$.ajax({
			url: "profile_edit.php",
			method: "POST",
			data: {email_edit:1,email_current:email_current},
			success: function(data){
				console.log(data);
				$('#profile_email').html(data);
			}
		})
	})
})