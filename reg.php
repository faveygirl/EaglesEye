<?php
	include('signup.php');
	?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign Up | Eagle Eye</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		//username available check
function checkUsernameAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "checker.php",
data:'username='+$("#username").val(),
type: "POST",
success:function(data){
$("#username-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){
}
});
}
// if email exit
function checkEmailAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "checker.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){

$("#email-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){
 event.preventDefault();
}
});
}
	</script>
	
</head>
<body>
	
	<main>
	<div class="navbar">
										  <a target="_blank" href="https://www.inecnigeria.org/">Home</a>
										  <a target="_blank" href="https://en.wikipedia.org/wiki/Voter_registration">About</a>
										  <a target="_blank" href="https://inecnews.com/">News</a>
										  <a target="_blank" href="https://www.inecnigeria.org/resources/2019-guidelines-for-media-accreditation/">Media</a>
										  
										  <div class="dropdown">
											  <button class="droppbtn" onclick="myFunction()">Electoral Offences
												<i class="fa fa-caret-down"></i>
											  </button>
											  <div class="dropdown-content" id="myDropdown">
												<a target="_blank" href="https://punchng.com/fact-check-what-electoral-act-says-about-ballot-box-snatching-violence/">1. Ballot Box Snatching</a>
												<a target="_blank" href="https://yali.state.gov/harm-vote-buying/">2. Vote Buying</a>
												<a target="_blank" href="https://www.merriam-webster.com/dictionary/multiple%20voting">3. Multiple Voting</a>
											  <a target="_blanket" href="http://www.inec.gov.ng/voter-education/election-offences-and-penalties/">4. Harassment and victimization of electoral officers. </a>
											  <a target="_blank" href="https://punchng.com/underage-voting-and-inecs-2019-challenge/">5. Underage voting</a>
											  <a target="_blank" href="https://www.inecnigeria.org/voter-education/election-offences-and-penalties/">6. Mutilation and destruction of electoral materials</a>
											  <a target="_blank" href="https://www.inecnigeria.org/voter-education/election-offences-and-penalties/">7. Impersonation </a>
											  </div>
										  </div>
										  
										  <div class="dropdown">
											  <button class="droppbtn" onclick="myFunction1()">2019 Report Stats
												<i class="fa fa-caret-down"></i>
											  </button>
											  <div class="dropdown-content" id="myDropdown1">
												<a target="_blank" href="https://www.inecnigeria.org/inec-lga-offices/">1. LG</a>
												<a target="_blank" href="https://www.inecnigeria.org/home/inec-state-offices/">2. State</a>
												<a target="_blank" href="https://www.inecnigeria.org/resources/registration-area-centres-nationwide/">3. Region</a>
											  </div>
										 </div>
										</div>
	<!--SIGN IN FORM-->
	<div class="container">
		<form id="login" action="" method="post">
			<div class="row">
				<div class="login-triangle"></div>
				
				<h2 class="login-header">Sign Up</h2>

		<div class="col">
			<!--Error Message-->
  <?php if($error){ ?><div class="errorWrap">
                <strong>Error </strong> : <?php echo htmlentities($error);?></div>
                <?php } ?>
               
<!--Success Message-->
<?php if($msg){ ?><div class="succWrap">
                <strong>success </strong> : <?php echo htmlentities($msg);?></div>
                <?php } ?> 
			 <p>  <input class="txt" type="text" name="name" id="name" placeholder="Fullname" required> </p>
			  <p>  <input class="txt" type="text" name="username" id="username" onBlur="checkUsernameAvailability()" placeholder="Username" required> </p>

			    <span id="username-availability-status" style="font-size:12px; color:black; "></span>

      <p>  <input class="txt" type="email" name="email" id="email" placeholder="Email" onBlur="checkEmailAvailability()" required> </p>
      	<span id="email-availability-status" style="font-size:12px;"></span> 
        <input class="txt" type="password" id="password" name="password" placeholder="Password" required>
        <meter max="4" id="strength"></meter>
<spam id="strength-text"></spam>
      
        <p><input class="submit" type="submit" name="signup" value="Sign Up"></p>
      </div>
				
			</div>

			<div class="col">
      <a href="login.html"  class="btn"> I have any Accont</a>
      
    </div>
  </div>
		</form>
	</div>
	<div class="footer">
  
											
											<a target="_blank" href="https://www.google.com/search?q=inec+logo+nigeria&rlz=1C1GCEU_enNG825NG825&source=lnms&tbm=isch&sa=X&ved=0ahUKEwiEjNq9ot3kAhX3BWMBHRAlDd4Q_AUIEigB&biw=1366&bih=657"><img id="footer1" alt="inec logo" src="https://res.cloudinary.com/eagleseye/image/upload/v1568735240/download_4_drfwbl.jpg"></a>
											<a target="_blank" href="https://www.google.com/search?q=inec+images&rlz=1C1GCEU_enNG825NG825&source=lnms&tbm=isch&sa=X&ved=0ahUKEwjlz_Liot3kAhXoD2MBHRKvBQUQ_AUIEigB&biw=1366&bih=657"><img id="footer2" alt="Electoral Map of Nigeria" src="https://res.cloudinary.com/eagleseye/image/upload/v1568735620/images_q6yfsv.jpg"></a>
											<a target="_blank" href="https://www.google.com/search?q=inec+images&rlz=1C1GCEU_enNG825NG825&source=lnms&tbm=isch&sa=X&ved=0ahUKEwjlz_Liot3kAhXoD2MBHRKvBQUQ_AUIEigB&biw=1366&bih=657"><img id="footer3" alt="Election Day Image" src="https://res.cloudinary.com/eagleseye/image/upload/v1568735651/images_3_yr4vcm.png"></a>
											<a target="_blank" href="https://www.google.com/search?q=inec+images&rlz=1C1GCEU_enNG825NG825&source=lnms&tbm=isch&sa=X&ved=0ahUKEwjlz_Liot3kAhXoD2MBHRKvBQUQ_AUIEigB&biw=1366&bih=657"><img id="footer4" alt="A group of voters casting their vote" src="https://res.cloudinary.com/eagleseye/image/upload/v1568736631/download_5_njbijg.jpg"></a>
											
										</div>
	</main>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.2.0/zxcvbn.js"></script>
<script src="EaglesEye.js" type="text/javascript">		
	</script>
</html>