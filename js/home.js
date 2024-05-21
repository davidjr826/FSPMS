
//chech password match
function checkpass(){
	var pas1=$("#pass1").val();
	var pas2=$("#pass2").val();
	//alert("passs");
	if(pas1 == pas2){
		$("#confim").html("<span style ='right:7px; color:green;' class='glyphicon glyphicon-ok form-control-feedback'></span>");
	}
	else{
		$("#confim").html("<span style ='right:7px; color:red;' class='glyphicon glyphicon-remove form-control-feedback'></span>");
		if(pas2 == ""){
			$("#confim").html("");
		}
	}
	
}

//student registration
function student_reg(){
	var fname=$("#fname").val();
	var mname=$("#mname").val();
	var surname=$("#surname").val();
	var gender=$("select[name = 'gender']").val();
	var contact=$("#contact").val();
	var regID=$("#regNo").val();
	var pass1=$("#pass1").val();
	var pass2=$("#pass2").val();
	var studyYear=$("#studyYear").val();
	var program=$("#program").val();
	var dept_name=$("select[name= 'dept_name']").val();


	$("#reg_wait").css({"display":"block"});

	//check for password
	if(pass1 != pass2){
		$("#reg_wait").css({"display":"none"});

		$("#reg_success").css({"display":"none"});
		$("#reg_error").css({"display":"block"});
		$("#reg_errorText").html(" password not match");
		
		//alert(fname + mname + surname + gender + contact + regID + pass1 + studyYear + program);
	}else{
		$.ajax ({
			type:'POST',
			url:'student/register.php',
			data: {
				fname : fname,
				mname : mname,
				surname : surname,
				contact : contact,
				gender : gender,
				password : pass2,
				regID : regID,
				dept_name : dept_name,
				studyYear : studyYear,
				program : program,
				S_reg_subumit : "yes"
			},

			success:function(response) {
				$("#reg_wait").css({"display":"none"});
				
				if(response == 1){
					$("#reg_error").css({"display":"none"});
					$("#reg_success").css({"display":"block"});

					setTimeout(function(){
						//send to login form after 3 second
						document.getElementById("login").classList.remove("hide");
						document.getElementById("create").classList.add("hide");
					},3000);

					//display msg for first login
						$("#first_log").css({"display":"block"});
					//change value on login form inputs
						$("#regID").val(regID);
						$("#Spass").val("");
					//remove msg for first login after 4 sec
						setTimeout(function(){
							$("#first_log").toggle("slow");
						}, 5000);
				}else{
					$("#reg_success").css({"display":"none"});
					$("#reg_error").css({"display":"block"});

					//alert(response);
					check = response;
					if(check == 2){
						document.getElementById("reg_errorText").innerHTML = "incorrect detail";
					}else{
						//document.getElementById("errorText").innerHTML = response;
						document.getElementById("reg_errorText").innerHTML = "technical error occured..";
					}
					//remove msg after 5 sec
					setTimeout(function(){
						$("#reg_errorText").toggle("slow");
					}, 5000);
				}
			}
		});

	}
	return false;
}

//coordnator login
function sup_login(){
	var email=$("input[name='email']").val();
	var Co_pass=$("input[name='password']").val();
		//alert(email + Co_pass);

		$("#wait").css({"display":"block"});
		$.ajax ({
			type:'POST',
			url:'supervisor/sup_login.php',
			data: {
				email : email,
				password : Co_pass
			},
			success:function(response) {
				$("#wait").css({"display":"none"});
				
				if(response == 1){
					$("#log_error").css({"display":"none"});
					$("#log_success").css({"display":"block"});
					document.getElementById("MSGtext_success").innerHTML = " login successful";
					window.location.href="supervisor/index.php";
				}else{
					$("#log_success").css({"display":"none"});
					$("#log_error").css({"display":"block"});

					
					//alert(response);
					check = response;
					if(check == 2){
						document.getElementById("MSGtext_error").innerHTML = " incorrect email or password";
					}else{
						//document.getElementById("errorText").innerHTML = response;
						document.getElementById("MSGtext_error").innerHTML = "technical error occured.."
					}
				}

				setTimeout(function(){
					$("#log_error").toggle("slow");
					$("#log_success").css({"display":"none"});
				},4000);

			}
		});
   
	return false;
}
