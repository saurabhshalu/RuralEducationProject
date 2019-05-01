//Mahershi
var element = document.getElementsByClassName("leftPanel")[0];

var j = window.innerWidth - 340;
element.style.width = j + "px";

function resize(){
	if(window.innerWidth>650)
		element.style.width = window.innerWidth - 340 + "px";
}


function testEmailAddress(emailToTest) {
    // check for @
    var atSymbol = emailToTest.indexOf("@");
    if(atSymbol < 1) return false;

    var dot = emailToTest.indexOf(".");
    if(dot <= atSymbol + 2) return false;

    // check that the dot is not at the end
    if (dot === emailToTest.length - 1) return false;

    return true;
}


$(document).ready(function(){

	/*$('.rightPanel').on('mouseover', '#registerME',function(){
		$('#registerME').css('color', 'white');
	});
	$('.rightPanel').on('mouseout', '#registerME',function(){
		$('#registerME').css('color', 'rgb(110, 110, 110)');
	});
	$('.rightPanel').on('mouseover', '#loginME',function(){
		$('#loginME').css('color', 'white');
	});
	$('.rightPanel').on('mouseout', '#loginME',function(){
		$('#loginME').css('color', 'rgb(110, 110, 110)');
	});
*/
	$('.leftPanel').on('click', '.btnApproveRequest', function(){
		var id = $(this).data('id');
		$.ajax({
			url: 'handler.php',
			method: 'POST',
			data: {
				qry: 'approveFromNeededTeacher',
				id: id,
				whatToDo: 'approveRequest'
			},
			success: function(response)
			{
				if(response=="success")
					$('body').load('index.php');
				else
					alert(response);
			}
		});
	});

	$('.leftPanel').on('click', '.btnRejectRequest', function(){
		var id = $(this).data('id');
		$.ajax({
			url: 'handler.php',
			method: 'POST',
			data: {
				qry: 'approveFromNeededTeacher',
				id: id,
				whatToDo: 'rejectRequest'
			},
			success: function(response)
			{
				if(response=="success")
					$('body').load('index.php');
				else
					alert(response);
			}
		});
	});

	$('.leftPanel').on('click', '.btnApporveClass', function(){
		var id = $(this).data('id');
		var whatToDo = $(this).val();
		$.ajax({
			url: 'handler.php',
			method: 'POST',
			data: {
				qry: 'approveFromNeededTeacher',
				id: id,
				whatToDo: whatToDo
			},
			success: function(response)
			{
				if(response=="success")
					$('body').load('index.php');
				else
					alert(response);
			}
		});
	});


	$('.leftPanel').on('click', '.btnSendRequestTeacher', function(){
		var id = $(this).data('id');
		var whatToDo = $(this).val();

		$.ajax({
			url: 'handler.php',
			method: 'POST',
			data: {
				qry: 'requestToInterestedTeacher',
				id: id,
				whatToDo: whatToDo
			},
			success: function(response)
			{
				if(response=="success")
					$('body').load('index.php');
				else
					alert(response);
			}
		});
		
	});

	$('.leftPanel').on('click', '#submitInterest', function(){
		
		var subject = $('#subject').val();
		var location = $('#location').val();

		$.ajax({
			url: 'handler.php',
			method: 'POST',
			data: {
				qry: 'submitInterest',
				subject: subject,
				location: location,
				status: 0
			},
			success: function(response)
			{
				alert(response);
			}
		});

	});

	$('.leftPanel').on('click', '#submitNeeds', function(){
		
		var subject = $('#subjectNeeds').val();

		$.ajax({
			url: 'handler.php',
			method: 'POST',
			data: {
				qry: 'submitNeeds',
				subject: subject,
				status: 0
			},
			success: function(response)
			{
				$('body').load('index.php');
				alert(response);
			}
		});

	});


	$('.rightPanel').on('click', '#logout', function(){
		$('body').load('logout.php');
	});

	$('.rightPanel').on('click', '#registerME', function(){
		$('.rightPanel').load('register.php');
	});
	
	$('.rightPanel').on('click', '#loginME', function(){
		$('.rightPanel').load('login.php');
	});

	$('.rightPanel').on('click', '#loginSubmit', function(){
		//Add Email verification
		var email = $('#email').val();
		var pass = $('#password').val();
		var type = $('#teacher:checked').val()=='on'?'teacher':'learner';

		if(!testEmailAddress(email))
			$('#judge').html("Please enter valid email!");
		else if(pass.trim().length==0)
			$('#judge').html("Please enter valid password!");
		else
		{
			$.ajax({
				url: 'handler.php',
				method: 'POST',
				data: {
					qry: 'secureLogin',
					email: email,
					password: pass,
					type: type
				},
				success: function(response)
				{
					if(response.indexOf('success')!==-1)
						$('body').load('index.php');
					else
						$('#judge').html(response);
				}
			});
		}
	});

	$('.rightPanel').on('click', '#registerSubmit', function(){
		var email = $('#email').val();
		var pass = $('#pwd').val();
		var conPass = $('#conpwd').val();
		var no = $('#phno').val();
		var name = $('#usr').val();
		var state = $('#state').val();
		var pincode = $('#pincode').val();
		var district = $('#district').val();
		var type = $('#teacher:checked').val()=='on'?'teacher':'learner';
		if(name.trim().length<4)
		{
			$('#judge').html("Please Enter Valid Name");
			$('#usr').focus();
		}
		else if(!testEmailAddress(email))
		{	
			$('#judge').html("Please enter valid email!");
			$('#email').focus();	
		}
		else if(no.length != 10)
		{
			$('#judge').html("Please Enter Valid Phone Number");
			$('#phno').focus();		
		}
		else if(pass.trim().length==0)
		{
			$('#judge').html("Please enter valid password!");
			$('#pwd').focus();	
		}
		else if(pass !== conPass)
		{
			$('#judge').html("Passwords Dont Match!");
			$('#conpwd').focus();	
		}
		else if(state.trim().length==0)
		{
			$('#judge').html("Please enter State password!");
			$('#state').focus();	
		}
		else if(pincode.trim().length==0)
		{
			$('#judge').html("Please enter valid Pincode!");
			$('#pincode').focus();	
		}
		else if(district.trim().length==0)
		{
			$('#judge').html("Please enter valid District!");
			$('#district').focus();	
		}
		else
		{
			$.ajax({
				url: 'handler.php',
				method: 'POST',
				data: {
					qry: 'secureRegister',
					email: email,
					password: pass,
					number: no,
					name: name,
					state: state,
					pincode: pincode,
					district: district,
					type: type
				},
				success: function(response)
				{
					if(response.indexOf('success')!==-1)
						$('body').load('index.php');
					else
						$('#judge').html(response);
				}
			});
		}
	})
});