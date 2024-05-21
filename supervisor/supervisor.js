function toggleprofile(){
    $(".normal").fadeToggle("slow");
    $(".editMode").fadeToggle("slow");
}

function saveEdit(){
    var fname=$("input[name='fname']").val();
	var mname=$("input[name='mname']").val();
	var surname=$("input[name='surname']").val();
	var gender=$("select[name = 'gender']").val();
	var dept_name=$("select[name='dept_name']").val();
	var citizenship=$("input[name='citizenship']").val();
	var dob=$("input[name='dob']").val();
    var contact=$("input[name='contact']").val();
    var physical_address=$("input[name='physical_address']").val();
    
    //alert(fname+ " "+mname+" "+ surname+" "+gender+" "+dept_name+" "+citizenship+" "+dob+" "+contact+" "+physical_address);
    $.ajax ({
        type:'POST',
        url:'supervisor.php',
        data: {
            fname : fname,
            mname : mname,
            surname : surname,
            contact : contact,
            gender : gender,
            citizenship : citizenship,
            dept_name : dept_name,
            dob : dob,
            user_type : "user_type",
            sup_email : "no",
            physical_address : physical_address,
            Action : "edit"
        },

        success:function(response) {
            $("#Response").show("slow");
            $("#Response").html(response);
            
            //remove msg after 5 sec
            setTimeout(function(){
                $("#Response").hide("slow");
                $("#Response").html("");
            }, 5000);
        }
    });

    return false;
}

function RegisterSupervisor(){
    var fname=$("input[name='fname']").val();
	var mname=$("input[name='mname']").val();
	var surname=$("input[name='surname']").val();
	var gender=$("select[name = 'gender']").val();
	var dept_name=$("select[name='dept_name']").val();
	var user_type=$("select[name='user_type']").val();
	var citizenship=$("input[name='citizenship']").val();
	var dob=$("input[name='dob']").val();
	var contact=$("input[name='contact']").val();
	var email=$("input[name='email']").val();
    var physical_address=$("input[name='physical_address']").val();
    
    	//alert(fname+ " "+mname+" "+ surname+" "+gender+" "+user_type+" "+dept_name+" "+citizenship+" "+dob+" "+contact+" "+physical_address);
    $.ajax ({
        type:'POST',
        url:'supervisor.php',
        data: {
            fname : fname,
            mname : mname,
            surname : surname,
            contact : contact,
            gender : gender,
            citizenship : citizenship,
            dept_name : dept_name,
            dob : dob,
            user_type : user_type,
            sup_email : email,
            physical_address : physical_address,
            Action : "register"
        },

        success:function(response) {
            $("#Response").show("slow");
            $("#Response").html(response);
			$("#tabletable").load("viewSupervisor.php");
			
            //remove msg after 5 sec
            setTimeout(function(){
                $("#Response").hide("slow");
				$("#Response").html("");
            }, 5000);
        }
    });

    return false;
}

//open student project
function openProject(projectID){
    var projectID = projectID;
    $.ajax ({
        type:'POST',
        url:'openStudentProject.php',
        data: {
            projectID :projectID
        },
        success : function(response){
            //alert(response);
            $("#projectDiv").html(response);
        }
    });
}

//for download document
function downloadDoc(realPath){
    //alert(realPath);
    if(realPath == "NO"){
        $("#downloadDIV").hide();
        $("#downloadDIV2").hide();
        alert("Unfortunete. file not Accessable or not present");
    }else{
        window.location.href = realPath;
    }
    
}

//check password match
function checkpass(){
	var pas1=$("#pass1").val();
	var pas2=$("#pass2").val();
	//alert("passs");
	if(pas1 == pas2){
		$("#confim").html("<span style ='right:10px; top:28px; color:green;' class='glyphicon  form-control-feedback'> matched</span>");
	}
	else{
		$("#confim").html("<span style ='right:10px; top:28px; color:red; ' class='glyphicon form-control-feedback'> not match</span>");
		if(pas2 == ""){
			$("#confim").html("");
		}
	}
	
}


//change password
function Newpassword(){
	var pass0 =$("#pass0").val();
	var pass1=$("#pass1").val();
	var pass2=$("#pass2").val();
	//alert(pass0 +pass1 +pass2);

		//check for password
		if(pass1 != pass2){
	
			$("#success").css({"display":"none"});
			$("#error").css({"display":"block"});
			$("#errorText").html(" password not match");
			//remove msg after 5 sec
			setTimeout(function(){
				$("#error").toggle("slow");
			}, 4000);
			
		}else{
			$.ajax ({
				type:'POST',
				url:'Newpassword.php',
				data: {
					password : pass1,
					oldpass :pass0
				},
	
				success:function(response) {
					//alert(response);
					
					if(response == 1){
						$("#error").css({"display":"none"});
						$("#success").css({"display":"block"});
						
						$("#success_text").html("successfull changing password");
						setTimeout(function(){
							$("#success").css({"display":"none"});
						},4000);
	
					}else{
						$("#success").css({"display":"none"});
						$("#error").css({"display":"block"});
	
						//alert(response);
						check = response;
						if(check == 2){
							$("#error").html("incorrect Current password");
						}else{
							//document.getElementById("errorText").innerHTML = response;
							$("#reg_errorText").html("password not changed.");
						}
						//remove msg after 5 sec
						setTimeout(function(){
							$("#error").toggle("slow");
						}, 4000);
					}
				}
			});
	
		}
   
	return false;
}

//open Supervisor 
function openSupervisor(sup_email){
    var sup_email = sup_email;
    $.ajax ({
        type:'POST',
        url:'openSupervisor.php',
        data: {
            sup_email : sup_email
        },
        success : function(response){
            //alert(response);
            $("#projectDiv").html(response);
        }
    });
}

//register student
function RegisterStudent(){
    var fname=$("input[name='fname']").val();
	var mname=$("input[name='mname']").val();
	var surname=$("input[name='surname']").val();
	var gender=$("select[name = 'gender']").val();
	var prog_ID=$("select[name='prog_ID']").val();
	var study_year=$("input[name='study_year']").val();
	var citizenship=$("input[name='citizenship']").val();
	var dob=$("input[name='dob']").val();
	var contact=$("input[name='contact']").val();
	var st_id=$("input[name='st_id']").val();
    
    	//alert(fname+ " "+mname+" "+ surname+" "+gender+" "+study_year+" "+prog_ID+" "+citizenship+" "+dob+" "+contact);
    $.ajax ({
        type:'POST',
        url:'student.php',
        data: {
            fname : fname,
            mname : mname,
            surname : surname,
            contact : contact,
            gender : gender,
            citizenship : citizenship,
            prog_ID : prog_ID,
            dob : dob,
            study_year : study_year,
            st_id : st_id,
            Action : "register"
        },

        success:function(response) {
            $("#Response").show("slow");
            $("#Response").html(response);
			$("#tabletable").load("viewStudent.php");
			
            //remove msg after 5 sec
            setTimeout(function(){
                $("#Response").hide("slow");
				$("#Response").html("");
            }, 5000);
        }
    });

    return false;
}