$(document).ready(function(){

	//Profile-photo update
	// $('.hover-div').click(function(e){
	// 	e.preventDefault();
	// 	var img_current=$('.img-circle').attr('src');	
	// })

	//Email-update
	$('#email_edit').click(function(e){
		e.preventDefault();
		var email_current=$('#profile_email').text();
		// console.log(email_current);
		$.ajax({
			url: "profile_edit.php",
			method: "POST",
			data: {email_edit:1,email_current:email_current},
			success: function(data){
				// console.log(data);
				$('#email_edit').hide();
				$('#profile_email').html(data);
				$('#email_new_btn').click(function(e){
					e.preventDefault();
					// alert(0);
					var email_new = $('#new_email').val();
					var user_id=$('#user_id').val();
					// console.log(user_id);
					$.ajax({
						url: "profile_update.php",
						method: "POST",
						data: {email_update:1, email_new:email_new, user_id:user_id},
						success: function(data){
							location.reload();
						}
					})
				})
			}
		})
	})


	//Skills update
	$('#skills_edit').click(function(e){
		e.preventDefault();
		var skills_current=$('#profile_skills').text();
		// console.log(email_current);
		$.ajax({
			url: "profile_edit.php",
			method: "POST",
			data: {skills_edit:1,skills_current:skills_current},
			success: function(data){
				// console.log(data);
				$('#skills_edit').hide();
				$('#profile_skills').html(data);
				$('#skills_new_btn').click(function(e){
					e.preventDefault();
					// alert(0);
					var skills_new = $('#new_skills').val();
					var user_id=$('#user_id').val();
					// console.log(user_id);
					$.ajax({
						url: "profile_update.php",
						method: "POST",
						data: {skills_update:1, skills_new:skills_new, user_id:user_id},
						success: function(){
							location.reload();
						}
					})
				})
			}
		})
	})


	//Education Update
	$('#education_edit').click(function(e){
		e.preventDefault();
		var user_id=$('#user_id').val();
		$.ajax({
			url: "profile_edit.php",
			method: "POST",
			data: {education_edit:1,user_id:user_id},
			dataType: 'json',
			success: function(data){
				// console.log(data);
				$('#education_edit').hide();
				var qual="<input type='text' value='"+data['qualification']+"' id='new_qual'>";
				var exp="<input type='text' value='"+data['experience']+"' id='new_exp'>";
				var pref="<input type='text' value='"+data['preferences']+"' id='new_pref'><br><br>";
				var button="<button class='btn btn-success' id='new_btn'>Done</button>"
				$('#qual').html(qual);
				$('#exp').html(exp);
				$('#pref').html(pref);
				$('#done_btn_edu').html(button);

				$('#done_btn_edu').click(function(e){
					var qual_new = $('#new_qual').val();
					var exp_new = $('#new_exp').val();
					var pref_new = $('#new_pref').val();
					e.preventDefault();
					$.ajax({
						url: "profile_update.php",
						method: "POST",
						data: {education_edit:1,user_id:user_id, qual_new:qual_new, exp_new:exp_new, pref_new:pref_new},
						success: function(data){
							location.reload();
						}
					})
		 
				})

			}
		})
	})

	//Personal-details edit
	$('#personal_edit').click(function(e){
		e.preventDefault();
		var user_id=$('#user_id').val();
		$.ajax({
			url: "profile_edit.php",
			method: "POST",
			data: {personal_edit:1,user_id:user_id},
			dataType: 'json',
			success: function(data){
				// console.log(data);
				$('#personal_edit').hide();
				var age="<input type='text' value='"+data['age']+"' id='new_age'>";
				var mobile="<input type='text' value='"+data['mobile']+"' id='new_mobile'>";
				var address="<input type='text' value='"+data['address']+"' id='new_address'><br><br>";
				var button="<button class='btn btn-success' id='new_btn'>Done</button>"
				$('#age').html(age);
				$('#mobile').html(mobile);
				$('#address').html(address);
				$('#done_btn_personal').html(button);

				$('#done_btn_personal').click(function(e){
					var age_new = $('#new_age').val();
					var mobile_new = $('#new_mobile').val();
					var address_new = $('#new_address').val();
					e.preventDefault();
					$.ajax({
						url: "profile_update.php",
						method: "POST",
						data: {personal_edit:1,user_id:user_id, age_new:age_new, mobile_new:mobile_new, address_new:address_new},
						success: function(data){
							location.reload();
						}
					})
		 
				})

			}
		})
	})

})