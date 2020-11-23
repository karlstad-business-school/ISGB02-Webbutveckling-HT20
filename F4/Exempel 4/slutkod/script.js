'use strict';
	  
function validate(myForm){
  
	try {
	  
		  if(myForm.fornamn.value.length < 5) {
			throw('För kort förnamn');
		  }

		  if(document.querySelector('#txtenamn').value !== "Andersson") {
			throw('Fel efternamn');
		  }

		  if(myForm.skostorlek.value != 38) {
			throw('fel storlek');
		  }
		  
		  if(myForm.tal.value.length===0 || isNaN(myForm.tal.value)){
			throw('Skriv in ett heltal');
		  }
		  if(myForm.tal.value<100 || myForm.tal.value>103) {
			throw('fel tal');
		  }
		  return true;

	}
	catch(ex) {
		 alert(ex);
		 return false;
	}
}