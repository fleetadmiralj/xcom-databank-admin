var aliens;

$(document).ready(function(){
	// Field Masking
	$('.shots').mask('ZZ/ZZ', {
		translation:  {
			'Z': { pattern: /[0-9]/, optional: true }
			}
	});
	
	$('.overwatch').mask('ZZ/ZZ', {
		translation:  {
			'Z': { pattern: /[0-9]/, optional: true }
		}
	});
	
	$('.melee').mask('ZZ/ZZ', {
		translation:  {
			'Z': { pattern: /[0-9]/, optional: true }
		}
	});
	
	// Initial Validation
	validate();
});

$(document).on("blur", "#mission-form .form-control", function(e) {
	console.log('Change registered');
	missionValidate();
});

$(document).on("change", ".form-control", function(e) {
	validate();
});

// Validation for Mission Add/Edit Form that isn't already handled


$(document).on("change", "#mission-form .operation-name", function(e) {
	if($(this).val() == "") {
		
	}
});

function soldierRankClassCheck(input) {
	soldierParent = input.parentNode.parentNode;
	
	soldierField = soldierParent.querySelector('#soldierid');
	rankField = soldierParent.querySelector('#rank');
	classField = soldierParent.querySelector('#class');
	valid = true;
	
	// If Soldier is not empty but Rank is - error
	if(soldierField.value != "" && rankField.value == "") {
		soldierField.setCustomValidity('Soldier Cannot be selected without a rank');
		rankField.setCustomValidity('Soldier Cannot be selected without a rank');
		valid = false;
	}
	
	// If Soldier is empty but Rank is not - error
	if(soldierField.value == "" && rankField.value != "") {
		soldierField.setCustomValidity('Soldier Cannot be selected without a rank');
		rankField.setCustomValidity('Soldier Cannot be selected without a rank');
		valid = false;
	}
	
	// If Soldier is not empty but Class is - error
	if(soldierField.value != "" && classField.value == "") {
		soldierField.setCustomValidity('Soldier Cannot be selected without a class');
		classField.setCustomValidity('Soldier Cannot be selected without a class');
		valid = false;
	}
	
	// If Soldier is empty but Class is not
	if(soldierField.value == "" && classField.value != "") {
		soldierField.setCustomValidity('Soldier Cannot be selected without a class');
		classField.setCustomValidity('Soldier Cannot be selected without a class');
		valid = false;
	}
	
	// If Soldier, Rank, and Class are all empty - fields validate
	if(valid) {
		soldierField.setCustomValidity('');
		rankField.setCustomValidity('');
		classField.setCustomValidity('');
	}
}

function shotsCheck(input) {
	soldierParent = input.parentNode;
	
	shotsHit = soldierParent.querySelector('#shots-hit');
	shotsTaken = soldierParent.querySelector('#shots-taken');
	valid = true;
	
	// If Shots Hit isn't numeric - error
	if(isNaN(parseInt((shotsHit.value)))) {
		shotsHit.setCustomValidity('Shots Hit is a Number');
		valid = false;
	}
	
	// If Shots Taken isn't numeric - error
	if(isNaN(parseInt(Number(shotsTaken.value)))) {
		shotsTaken.setCustomValidity('Shots Taken is a Number');
		valid = false;
	}
	
	// If Shots Hit > Shots Taken - Error
	if(Number(shotsHit.value) > Number(shotsTaken.value)) {
		shotsHit.setCustomValidity('Shots Hit Cannot be greater than Shots Taken');
		shotsTaken.setCustomValidity('Shots Hit Cannot be greater than Shots Taken');
		valid = false;
	}
	
	// If Shots Hit is a number, Shots Taken is a Number, and Shots hit is = or < Shots Taken - Validated
	if(valid) {
		shotsHit.setCustomValidity('');
		shotsTaken.setCustomValidity('');
	}
}
	
	
function missionValidate() {
	console.log('Mission Validate Triggered');
		// If Total shots hit > total shots taken; If total overwatch shots hit > overwatch shots taken; if overwatch shots hit > total shots hit; if overwatch shots taken > total shots taken, then validation failed
		/* $('.shots').each( function(){		
			var shots = $(this).val();
			var overwatch = $(this).parents('.row').find('.overwatch').val();
			var melee = $(this).parents('.row').find('.melee').val();
			
			var shotsArray = shots.split("/");
			var overwatchArray = overwatch.split("/");
			var meleeArray = melee.split("/");
			
			if(Number(shotsArray[0]) > Number(shotsArray[1])) {
				$(this).css("background-color", "#f2dede");
				$(this).parents('.field-repeat').css("background-color", "#f2dede");
				validated = false;
			}
			
			if(isNaN(parseInt(shotsArray[0])) || isNaN(parseInt(shotsArray[1]))) {
				$(this).css("background-color", "#f2dede");
				$(this).parents('.field-repeat').css("background-color", "#f2dede");
				validated = false;
			}
			
			if(Number(overwatchArray[0]) > Number(overwatchArray[1])) {
				$(this).parents('.row').find('.overwatch').css("background-color", "#f2dede");
				$(this).parents('.field-repeat').css("background-color", "#f2dede");
				validated = false;
			}
			
			if(isNaN(parseInt(overwatchArray[0])) || isNaN(parseInt(overwatchArray[1]))) {
				$(this).parents('.row').find('.overwatch').css("background-color", "#f2dede");
				$(this).parents('.field-repeat').css("background-color", "#f2dede");
				validated = false;
			}
			
			if(Number(meleeArray[0]) > Number(meleeArray[1])) {
				$(this).parents('.row').find('.melee').css("background-color", "#f2dede");
				$(this).parents('.field-repeat').css("background-color", "#f2dede");
				validated = false;
			}
			
			if(isNaN(parseInt(meleeArray[0])) || isNaN(parseInt(meleeArray[1]))) {
				$(this).parents('.row').find('.melee').css("background-color", "#f2dede");
				$(this).parents('.field-repeat').css("background-color", "#f2dede");
				validated = false;
			}
			
			if((Number(overwatchArray[0]) > Number(shotsArray[0])) || (Number(overwatchArray[1]) > Number(shotsArray[1]))) {
				$(this).css("background-color", "#f2dede");
				$(this).parents('.row').find('.overwatch').css("background-color", "#f2dede");
				$(this).parents('.field-repeat').css("background-color", "#f2dede");
				validated = false;
			}
		});
		
		// If there are anything other than 1 MVP set, validation failed
		var mvpnum = 0;
		$('.mvp').each( function(){
			if($(this).val() == "True") {
				mvpnum = mvpnum + 1;
			}
		});
		
		if(mvpnum != 1) {
			$('.mvp').each( function(){
				$(this).css("background-color", "#f2dede");
				$(this).parents('.field-repeat').css("background-color", "#f2dede");
				validated = false;
			});
		}
		
		// If anyone is listed as wounded or killed, but mission is listed as Flawless
		var iswounded = 0;
		$('.status').each( function(){
			if($(this).val() == "Lightly Wounded" || $(this).val() == "Wounded" || $(this).val() == "Gravely Wounded" || $(this).val() == "Killed") {
				iswounded = 1;
			}
		});
		
		if(iswounded != 0 && $('.rating').val() == "Flawless") {
			$('.rating').css("background-color", "#f2dede");
			validated = false;
		}
		
		// If Injury time is not 0, but status is not some form of wounded or shaken
		$('.status-time').each( function(){
			if($(this).val() != 0 && ($(this).parents('.row').find('.status').val() == "Active" || $(this).parents('.row').find('.status').val() == "Killed" || $(this).parents('.row').find('.status').val() == "Captured" || $(this).parents('.row').find('.status').val() == "Rescued")) {
				$(this).css("background-color", "#f2dede");
				$(this).parents('.row').find('.status').css("background-color", "#f2dede");
				$(this).parents('.field-repeat').css("background-color", "#f2dede");
				validated = false;
				
			}
		});
		
		// If Status is empty, or status info is empty, but both are not empty, validation fails
		// Exception for if status is Rescued Soldier, as they may be listed as a normal soldier
		$('.extra').each( function(){
		if(($(this).val() != "" && $(this).val() != "Rescued Soldier" && $(this).parents('.row').find('.extra-info').val() == "") || ($(this).val() == "" && $(this).parents('.row').find('.extra-info').val() != "")) {
				$(this).css("background-color", "#f2dede");
				$(this).parents('.row').find('.extra-info').css("background-color", "#f2dede");
				$(this).parents('.field-repeat').css("background-color", "#f2dede");
				validated = false;
			}
		});
		
		// If Promoted is true, but rank is set to N/A or colonel, validation fails
		$('.promoted').each( function(){
			if($(this).val() == "True" && ($(this).parents('.field-repeat').find('.rank').val() == "0" || $(this).parents('.field-repeat').find('.rank').val() == 8)) {
				$(this).css("background-color", "#f2dede");
				$(this).parents('.field-repeat').find('.rank').css("background-color", "#f2dede");
				$(this).parents('.field-repeat').css("background-color", "#f2dede");
				validated = false;
			}
		});
		
		// If Soldier is "other" and/or Rank is N/A and/or Class is N/A but Status is None, validation fails
		$('.extra').each( function(){
			if($(this).val() == "" && ($(this).parents('.field-repeat').find('.soldierid').val() == 0 || $(this).parents('.field-repeat').find('.rank').val() == 0 || $(this).parents('.field-repeat').find('.class').val() == 0)) {
				$(this).css("background-color", "#f2dede");
				$(this).parents('.field-repeat').find('.soldierid').css("background-color", "#f2dede");
				$(this).parents('.field-repeat').find('.rank').css("background-color", "#f2dede");
				$(this).parents('.field-repeat').find('.class').css("background-color", "#f2dede");
				$(this).parents('.field-repeat').css("background-color", "#f2dede");
				validated = false;
			}
		});
		
		// Check that fields that should be numeric only are numeric only
		if(!($.isNumeric($('.turns').val()))) {
			$('.turns').css("background-color", "#f2dede");
			validated = false;
		}
		
		$('.damage').each( function(){
			if(!($.isNumeric($('.damage').val()))) {
				$('.damage').css("background-color", "#f2dede");
				$(this).parents('.field-repeat').css("background-color", "#f2dede");
				validated = false;
			}
		});
		
		$('.killed-aliens').each( function(){
			if(!($.isNumeric($('.killed-aliens').val()))) {
				$('.killed-aliens').css("background-color", "#f2dede");
				$(this).parents('.field-repeat').css("background-color", "#f2dede");
				validated = false;
			}
		});
		
		$('.killed-lost').each( function(){
			if(!($.isNumeric($('.killed-lost').val()))) {
				$('.killed-lost').css("background-color", "#f2dede");
				$(this).parents('.field-repeat').css("background-color", "#f2dede");
				validated = false;
			}
		});
		
		if(isNaN(parseInt($('.infiltration').val())) || $('.infiltration').val() != 0) {
			// If Aliens Encountered = 0 or if Killed > Encountered
			$('.encountered').each( function(){
				if(Number($(this).val()) == 0 || (Number($(this).val()) < Number($(this).parents('.row').find('.killed').val()))) {
					$(this).css("background-color", "#f2dede");
					$(this).parents('.row').find('.killed').css("background-color", "#f2dede");
					$(this).parents('.field-repeat').css("background-color", "#f2dede");
					validated = false;
				}
			});
			
			$('.encountered').each( function(){
				if(!($.isNumeric($('.encountered').val()))) {
					$('.encountered').css("background-color", "#f2dede");
					$(this).parents('.field-repeat').css("background-color", "#f2dede");
					validated = false;
				}
			});
			
			$('.killed').each( function(){
				if(!($.isNumeric($('.killed').val()))) {
					$('.killed').css("background-color", "#f2dede");
					$(this).parents('.field-repeat').css("background-color", "#f2dede");
					validated = false;
				}
			}); */
}

// Initiate Field Validation
function validate() {
	var validated = true;
	
	/* var form = document.querySelector('.was-validated');
	if (!form.checkValidity()) {
		form.querySelector('#submit').classList.remove("btn-primary");
		form.querySelector('#submit').classList.add("btn-danger");
		form.querySelector('#submit').disabled = true;
	} else {
		form.querySelector('#submit').classList.remove("btn-danger");
		form.querySelector('#submit').classList.add("btn-primary");
		form.querySelector('#submit').disabled = false;
	} */
	
	/**** Validation for Soldier Form ****/
	if($('#soldier-form').length) {
		// Reset all containing divs to white
		$('.field-repeat').each( function(){
			$(this).css("border-color", "#198754");
		});
		
		// Reset all form fields divs to white
		$('.form-control').each( function(){
			$(this).css("border-color", "#198754");
		});
		
		// If First Name field is blank, validation failed
		if ($('.first-name').val() == "") {
			$('.first-name').css("border-color", "#dc3545");
			validated = false;
		}
		
		// If Last Name field is blank, validation failed
		if ($('.last-name').val() == "") {
			$('.last-name').css("border-color", "#dc3545");
			validated = false;
		}
		
		//If Aim field isn't numeric
		if($.isNumeric($('.aim').val()) == false) {
			$('.aim').css("border-color", "#dc3545");
			validated = false;
		}
		
		// If Aim < 40, validation failed
		if ($('.aim').val() < 40) {
			$('.aim').css("border-color", "#dc3545");
			validated = false;
		}
		
		//If Movement field isn't numeric
		if($.isNumeric($('.movement').val()) == false) {
			$('.movement').css("border-color", "#dc3545");
			validated = false;
		}
		
		// If Movement < 5, validation failed
		if ($('.movement').val() < 5) {
			$('.movement').css("border-color", "#dc3545");
			validated = false;
		}
		
		//If Health field isn't numeric
		if($.isNumeric($('.health').val()) == false) {
			$('.health').css("border-color", "#dc3545");
			validated = false;
		}
		
		// If Health < 3, validation failed
		if ($('.health').val() < 3) {
			$('.health').css("border-color", "#dc3545");
			validated = false;
		}
		
		//If Hack field isn't numeric
		if($.isNumeric($('.hack').val()) == false) {
			$('.hack').css("border-color", "#dc3545");
			validated = false;
		}
		
		// If Hack < 0, validation failed
		if ($('.hack').val() < 0) {
			$('.hack').css("border-color", "#dc3545");
			validated = false;
		}
		
		//If Dodge field isn't numeric
		if($.isNumeric($('.dodge').val()) == false) {
			$('.dodge').css("border-color", "#dc3545");
			validated = false;
		}
		
		// If Dodge < 0, validation failed
		if ($('.dodge').val() < 0) {
			$('.dodge').css("border-color", "#dc3545");
			validated = false;
		}
		
		//If Will field isn't disabled and isn't numeric
		if($.isNumeric($('.will').val()) == false && $('.will').is(':disabled') == false) {
			$('.will').css("border-color", "#dc3545");
			validated = false;
		}
		
		// If Will < 25 and isn't disabled, validation failed
		if ($('.will').val() < 25 && $('.will').is(':disabled') == false) {
			$('.will').css("border-color", "#dc3545");
			validated = false;
		}
		
		//If Psi field isn't disabled and isn't numeric
		if($.isNumeric($('.psi').val()) == false && $('.psi').is(':disabled') == false) {
			$('.psi').css("border-color", "#dc3545");
			validated = false;
		}
		
		// If Psi < 0 and isn't disabled, validation failed
		if ($('.psi').val() < 0 && $('.psi').is(':disabled') == false) {
			$('.psi').css("border-color", "#dc3545");
			validated = false;
		}
		
		// If Picture field is blank and currentphoto doesn't exist, validation failed
		if ($('.soldier-picture').val() == "" && ($('.current-photo').length == 0)) {
			$('.soldier-picture').css("border-color", "#dc3545");
			validated = false;
		}
	}
	
	/**** Validation for Covert Action Form ****/
	if($('#covert-form').length) {
		// Reset all containing divs to white
		$('.field-repeat').each( function(){
			$(this).css("border-color", "#198754");
		});
		
		// Reset all form fields divs to white
		$('.form-control').each( function(){
			$(this).css("border-color", "#198754");
		});
		
		// If Mission field is blank, validation failed
		if ($('.mission').val() == "") {
			$('.mission').css("border-color", "#dc3545");
			validated = false;
		}
		
		// If Mission Description field is blank, validation failed
		if ($('.mission-description').val() == "") {
			$('.mission-description').css("border-color", "#dc3545");
			validated = false;
		}
		
		// If Reward field is blank, validation failed
		if ($('.covert-reward').val() == "") {
			$('.covert-reward').css("border-color", "#dc3545");
			validated = false;
		}
		
		// If End Date is before or the same as Start Date field is blank, validation failed
		var startdate = Date.parse($('.start-date').val());
		var enddate = Date.parse($('.end-date').val());
		if (enddate <= startdate) {
			$('.start-date').css("border-color", "#dc3545");
			$('.end-date').css("border-color", "#dc3545");
			validated = false;
		}
		
		// If Operative (soldier) is set to None AND Operative (resource) is blank, validation failed
		$('.operative-soldier').each( function(){
			if($(this).val() == "" && $(this).parents('.field-repeat').find('.operative-resource').val()== "") {
				$(this).css("border-color", "#dc3545");
				$(this).parents('.field-repeat').find('.operative-resource').css("border-color", "#dc3545");
				$(this).parents('.field-repeat').css("border-color", "#dc3545");
				validated = false;
			}
		});
		
		$('.requirement').each( function(){
			// If Operative type is a type of soldier but Operative (soldier) is blank, validation failed
			var soldiers = ["Soldier", "Corporal+", "Sergeant+", "Lieutenant+", "Captain+", "Major+", "Colonel", "Reaper", "Skirmisher", "Templar"];
			var resources = ["Engineer", "Scientist", "Intel", "Supplies", "Elerium Crystals", "Alien Alloys"];
			if(soldiers.includes($(this).val()) && $(this).parents('.field-repeat').find('.operative-soldier').val() == "") {
				$(this).parents('.field-repeat').find('.operative-soldier').css("border-color", "#dc3545");
				$(this).css("border-color", "#dc3545");
				$(this).parents('.field-repeat').css("border-color", "#dc3545");
				validated = false;
			}
			
			// If Operative type is a resource but Operative (resource) is blank
			else if(resources.includes($(this).val()) && $(this).parents('.field-repeat').find('.operative-resource').val() == "") {
				$(this).parents('.field-repeat').find('.operative-resource').css("border-color", "#dc3545");
				$(this).css("border-color", "#dc3545");
				$(this).parents('.field-repeat').css("border-color", "#dc3545");
				validated = false;
			}
			
			// If resource is not in the list, it's invalid
			else if(soldiers.includes($(this).val()) == false && resources.includes($(this).val()) == false){
				$(this).css("border-color", "#dc3545");
				$(this).parents('.field-repeat').css("border-color", "#dc3545");
				validated = false;
			}
		});
		
		// Either True or False must be checked for Promoted
		$('.promoted').each( function(){
			if($(this).find('.promoted-box:checked').length != 1) {
				$(this).parents('.field-repeat').css("border-color", "#dc3545");
				validated = false;
			}
		});
	}
	
	/**** Validation for Bonds Add/Edit Form ****/
	if($('#bond-form').length) {
		// Reset all containing divs to white
		$('.field-repeat').each( function(){
			$(this).css("border-color", "#198754");
		});
		
		// Reset all form fields divs to white
		$('.form-control').each( function(){
			$(this).css("border-color", "#198754");
		});
		
		// If the same soldier is selected in both soldier fields, validation failed
		if ($('.soldier-one').val() == $('.soldier-two').val()) {
			$('.soldier-one').css("border-color", "#dc3545");
			$('.soldier-two').css("border-color", "#dc3545");
			validated = false;
		}
	} // End Bonds Form Validation
	
	
	/**** Validation for Alien Type Add/Edit Form ****/
	if($('#alien-type-form').length) {
		// Reset all containing divs to white
		$('.field-repeat').each( function(){
			$(this).css("border-color", "#198754");
		});
		
		// Reset all form fields divs to white
		$('.form-control').each( function(){
			$(this).css("border-color", "#198754");
		});
		
		// If Alien Type Name field is blank, validation failed
		if ($('.alien-type-name').val() == "") {
			$('.alien-type-name').css("border-color", "#dc3545");
			validated = false;
		}
	} // End Alien Form Validation
	
	/**** Validation for Alien Add/Edit Form ****/
	if($('#alien-form').length) {
		// Reset all containing divs to white
		$('.field-repeat').each( function(){
			$(this).css("border-color", "#198754");
		});
		
		// Reset all form fields divs to white
		$('.form-control').each( function(){
			$(this).css("border-color", "#198754");
		});
		
		// If Alien Name field is blank, validation failed
		if ($('.alien-name').val() == "") {
			$('.alien-name').css("border-color", "#dc3545");
			validated = false;
		}
	} // End Alien Type Form Validation
	
	/**** Validation for Chosen Add/Edit Form ****/
	if($('#chosen-form').length) {
		// Reset all containing divs to white
		$('.field-repeat').each( function(){
			$(this).css("border-color", "#198754");
		});
		
		// Reset all form fields divs to white
		$('.form-control').each( function(){
			$(this).css("border-color", "#198754");
		});
		
		// If Chosen Name field is blank, validation failed
		if ($('.chosen-name').val() == "") {
			$('.chosen-name').css("border-color", "#dc3545");
			validated = false;
		}
		
		// If Chosen Defeated field isn't selected, validation failed
		if ($('.chosen-defeated').val() != "1" &&  $('.chosen-defeated').val() != "0") {
			validated = false;
		}
	} // End Chosen Form Validation
	
	/**** Validation for Covert Action Type Form ****/
	if($('#covert-type').length) {
		// Reset all containing divs to white
		$('.field-repeat').each( function(){
			$(this).css("border-color", "#198754");
		});
		
		// Reset all form fields divs to white
		$('.form-control').each( function(){
			$(this).css("border-color", "#198754");
		});
		
		// If Covert Type Name field is blank
		if($('.covert-type-name').val() == "") {
			$('.covert-type-name').css("border-color", "#dc3545");
			validated = false;
		}
	}
	
	/**** Validation for Dark Event Form ****/
	if($('#dark-event-form').length) {
		// Reset all containing divs to white
		$('.field-repeat').each( function(){
			$(this).css("border-color", "#198754");
		});
		
		// Reset all form fields divs to white
		$('.form-control').each( function(){
			$(this).css("border-color", "#198754");
		});
		
		// If Dark Event Name field is blank
		if($('.dark-event-name').val() == "") {
			$('.dark-event-name').css("border-color", "#dc3545");
			validated = false;
		}
		
		// If Dark Event Description field is blank
		if($('.dark-event-description').val() == "") {
			$('.dark-event-description').css("border-color", "#dc3545");
			validated = false;
		}
	}
	
	/**** Validation for Mission Objective Form ****/
	if($('#objective-form').length) {
		// Reset all containing divs to white
		$('.field-repeat').each( function(){
			$(this).css("border-color", "#198754");
		});
		
		// Reset all form fields divs to white
		$('.form-control').each( function(){
			$(this).css("border-color", "#198754");
		});
		
		// If Objective Description field is blank
		if($('.objective-description').val() == "") {
			$('.objective-description').css("border-color", "#dc3545");
			validated = false;
		}
	}
	
	/**** Validation for SITREP Form ****/
	if($('#sitrep-form').length) {
		// Reset all containing divs to white
		$('.field-repeat').each( function(){
			$(this).css("border-color", "#198754");
		});
		
		// Reset all form fields divs to white
		$('.form-control').each( function(){
			$(this).css("border-color", "#198754");
		});
		
		// If SITREP Name field is blank
		if($('.sitrep-name').val() == "") {
			$('.sitrep-name').css("border-color", "#dc3545");
			validated = false;
		}
		
		// If SITREP Description field is blank
		if($('.sitrep-description').val() == "") {
			$('.sitrep-description').css("border-color", "#dc3545");
			validated = false;
		}
	}
	
	/**** Validation for Class Form ****/
	if($('#class-form').length) {
		// Reset all containing divs to white
		$('.field-repeat').each( function(){
			$(this).css("border-color", "#198754");
		});
		
		// Reset all form fields divs to white
		$('.form-control').each( function(){
			$(this).css("border-color", "#198754");
		});
		
		// If Class Name field is blank
		if($('.class-name').val() == "") {
			$('.class-name').css("border-color", "#dc3545");
			validated = false;
		}
		
		// If Picture field is blank and currentphoto doesn't exist, validation failed
		if ($('.class-icon').val() == "" && ($('.current-photo').length == 0)) {
			$('.class-icon').css("border-color", "#dc3545");
			validated = false;
		}
	}
	
	/**** Validation for Rank Form ****/
	if($('#rank-form').length) {
		// Reset all containing divs to white
		$('.field-repeat').each( function(){
			$(this).css("border-color", "#198754");
		});
		
		// Reset all form fields divs to white
		$('.form-control').each( function(){
			$(this).css("border-color", "#198754");
		});
		
		// If Rank Name field is blank
		if($('.rank-name').val() == "") {
			$('.rank-name').css("border-color", "#dc3545");
			validated = false;
		}
		
		//If Rank Level field isn't numeric
		if($.isNumeric($('.rank-level').val()) == false) {
			$('.rank-level').css("border-color", "#dc3545");
			validated = false;
		}
		
		// If Rank Level isn't between 1 and 8
		if($('.rank-level').val() < 1 || $('.rank-level').val() > 8) {
			$('.rank-level').css("border-color", "#dc3545");
			validated = false;
		}
		
		// If Picture field is blank, validation failed
		if ($('.rank-icon').val() == "" && ($('.current-photo').length == 0)) {
			$('.rank-icon').css("border-color", "#dc3545");
			validated = false;
		}
	}
	
	/**** Validation for Skill Form ****/
	if($('#skill-form').length) {
		// Reset all containing divs to white
		$('.field-repeat').each( function(){
			$(this).css("border-color", "#198754");
		});
		
		// Reset all form fields divs to white
		$('.form-control').each( function(){
			$(this).css("border-color", "#198754");
		});
		
		// If Skill Name field is blank
		if($('.skill-name').val() == "") {
			$('.skill-name').css("border-color", "#dc3545");
			validated = false;
		}
		
		// If Skill Description field is blank
		if($('.skill-description').val() == "") {
			$('.skill-description').css("border-color", "#dc3545");
			validated = false;
		}
		
		// If Picture field is blank, validation failed
		if ($('.skill-icon').val() == "" && ($('.current-photo').length == 0)) {
			$('.skill-icon').css("border-color", "#dc3545");
			validated = false;
		}
	}
	
	/**** Validation for Gear Form ****/
	if($('#gear-form').length) {
		// Reset all containing divs to white
		$('.field-repeat').each( function(){
			$(this).css("border-color", "#198754");
		});
		
		// Reset all form fields divs to white
		$('.form-control').each( function(){
			$(this).css("border-color", "#198754");
		});
		
		// If Gear Name field is blank
		if($('.gear-name').val() == "") {
			$('.gear-name').css("border-color", "#dc3545");
			validated = false;
		}
		
		// If Gear Type field is blank
		if($('.gear-type').val() == "") {
			$('.gear-type').css("border-color", "#dc3545");
			validated = false;
		}
		
		//If Gear Number field isn't numeric
		if($.isNumeric($('.gear-number').val()) == false) {
			$('.gear-number').css("border-color", "#dc3545");
			validated = false;
		}
		
		// If Gear Number is < 0
		if($('.gear-number').val() < 0) {
			$('.gear-number').css("border-color", "#dc3545");
			validated = false;
		}
	}
	
	/**** Validation for VIP Form ****/
	if($('#vip-form').length) {
		// Reset all containing divs to white
		$('.field-repeat').each( function(){
			$(this).css("border-color", "#198754");
		});
		
		// Reset all form fields divs to white
		$('.form-control').each( function(){
			$(this).css("border-color", "#198754");
		});
		
		// If First Name field is blank
		if($('.vip-first-name').val() == "") {
			$('.vip-first-name').css("border-color", "#dc3545");
			validated = false;
		}
		
		// If Last Name field is blank
		if($('.vip-last-name').val() == "") {
			$('.vip-last-name').css("border-color", "#dc3545");
			validated = false;
		}
		
		// If Date field is isn't formatted MM/DD/YYYY
		var date_regex = /^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/;
		if($('.vip-date').val() == "") {
			$('.vip-date').css("border-color", "#dc3545");
			validated = false;
		}
		
		// If method is Mission Reward or Type is Dark VIP, Mission field can't be set to None, otherwise, disable mission field
		if($('.vip-recruitment').val() == "Mission Reward" || $('.vip-type').val() == "Dark VIP") {
			if($('.vip-recruitment').val() == "Mission Reward") {
				$('.mission').removeAttr("disabled");
				if($('.mission').val() == "") {
					$('.vip-recruitment').css("border-color", "#dc3545");
					$('.mission').css("border-color", "#dc3545");
					validated = false;
				}
			}
			
			if($('.vip-type').val() == "Dark VIP") {
				$('.mission').removeAttr("disabled");
				if($('.mission').val() == "") {
					$('.vip-type').css("border-color", "#dc3545");
					$('.mission').css("border-color", "#dc3545");
					validated = false;
				}
			}
		}
		else {
			$('.mission').attr('disabled', 'disabled');
			$('.mission').css("background-color", "#eeeeee");
		}
		
		// If method is Scanning Reward and Rumor field is blank, validatio failed; otherwise disable rumor field
		if($('.vip-recruitment').val() == "Scan Reward") {
			$('.vip-rumor').removeAttr("disabled");
			if($('.vip-rumor').val() == "") {
				$('.vip-recruitment').css("border-color", "#dc3545");
				$('.vip-rumor').css("border-color", "#dc3545");
				validated = false;
			}
		}
		else {
			$('.vip-rumor').attr('disabled', 'disabled');
			$('.vip-rumor').css("background-color", "#eeeeee");
		}
	}
	
	/**** Validation for Research Form ****/
	if($('#research-form').length) {
		// Reset all containing divs to white
		$('.field-repeat').each( function(){
			$(this).css("border-color", "#198754");
		});
		
		// Reset all form fields divs to white
		$('.form-control').each( function(){
			$(this).css("border-color", "#198754");
		});
		
		// If Name field is blank
		if($('.research-name').val() == "") {
			$('.research-name').css("border-color", "#dc3545");
			validated = false;
		}
	}
}

$('#aliens-list').on("keyup", ".alien", function(e) {
	e.preventDefault();
	if($(this).val() != "") {
		var listItems = aliens["Aliens"];
		$($('#aliens-list').empty());
		for (obj in listItems) {
			if(listItems[obj].search($(this).val()) != -1) {
				var option = document.createElement('option');
                option.value = listItems[obj];
				option.innerHTML = listItems[obj];
				$('#aliens-list').append(option);
			}
		}
	}
});