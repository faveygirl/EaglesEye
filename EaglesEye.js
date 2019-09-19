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
