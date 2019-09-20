function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");

}

function myFunction1() {
  document.getElementById("myDropdown1").classList.toggle("show");

}


// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
  if (!e.target.matches('.droppbtn')) {
  var myDropdown = document.getElementById("myDropdown");
  var myDropdown1 = document.getElementById("myDropdown1");
	
	if (myDropdown.classList.contains('show')) {
	  myDropdown.classList.remove('show');
	}
	else
	  myDropdown1.classList.remove('show');
	
  }
  

}
//password strenght checker
var strength = {
        0: "Worst",
        1: "Bad",
        2: "Weak",
        3: "Good",
        4: "Strong"
}

var password = document.getElementById('password');
var meter = document.getElementById('strength');
var text = document.getElementById('strength-text');

password.addEventListener('input', function()
{
    var val = password.value;
    var result = zxcvbn(val);
    
    // Update the password strength meter
    meter.value = result.score;
   
    // Update the text indicator
    if(val !== "") {
        text.innerHTML = "Strength: " + "<strong>" + strength[result.score] + "</strong>" + "<span class='feedback'>" + result.feedback.warning + " </span"; 
    }
    else {
        text.innerHTML = "";
    }
});

