$(function(){
	
	// Update Soldier Ranks Available based on Class
	var baseClass;
	$.getJSON("/json/classes.php", function (data) {
		baseClass = data;
	});
	
	$(document).on("change", "#soldier-class", function(e) {
		updateClass();
	});
	
	$(document).on("change", "input[name=is_chain]", function(e) {
		updateChain();
	});
	
	$(document).on("change", "input[name=is_infiltration]", function(e) {
		updateInfiltrate();
	});
	
	function updateClass() {
		var selected = $('#soldier-form #soldier-class').find(":selected").val();
		var currentClass;
		var classRanks;
		var classSkills;
		var className;
		for(var key in baseClass) {
			if(baseClass[key]['id'] == selected) {
				currentClass = baseClass[key];
				classRanks = baseClass[key]['rank'];
				classSkills = baseClass[key]['skills'];
				className = key;
			}
		}
		
		// Disable Psi Offense field if SPARK - DISABLED FOR SEASON 6
		/*if(className == "Psi Operative" || className == "Psionic") {
			$('div.psi-field input').removeAttr("disabled");
			$('div.psi-field input').css("background-color", "");
		}
		else {
			$('div.psi-field input').val(null);
			$('div.psi-field input').attr('disabled', 'disabled');
		} */
		
		//If Spark, disable will and psi fields - code or Psi field added for season 6
		if(className == "Spark") {
			$('div.will-field input').val(null);
			$('div.psi-field input').val(null);
			$('div.will-field input').attr('disabled', 'disabled');
			$('div.psi-field input').attr('disabled', 'disabled');
		}
		else {
			$('div.will-field input').removeAttr("disabled");
			$('div.psi-field input').removeAttr("disabled");
			$('div.will-field input').css("background-color", "");
			$('div.psi-field input').css("background-color", "");
		}
		
		if(className == "Reaper" || className == "Skirmisher" || className == "Templar" || className == "Spark") {
			$('#country').val(null);
			$('#country').attr('disabled', 'disabled');
			$('#country').css("background-color", "");
		}
		else {
			$('#country').removeAttr("disabled");
		}
		
		$('#soldier-form #soldier-rank').empty();
		for(key in classRanks) {
			$("<option />").text(classRanks[key]).val(key).appendTo($('#soldier-form #soldier-rank'));
		}
		
		$('#soldier-form .skill-list').empty();
		for(key in classSkills) {
			$('<div />').addClass('col-sm-2 skill-'+key).appendTo($('#soldier-form .skill-list'));
			//$('<input />', { type: 'checkbox', value: key, name: 'skills[]', text: classSkills[key] }).appendTo($('.skill-'+key));
			//$('<label />', { 'for': classSkills[key], id: key }).appendTo($('#soldier-form .skill-list')).addClass('col-sm-2');
			$('<input />', { type: 'checkbox', name: 'skills[]', value: key, id: classSkills[key]  }).appendTo($('.skill-'+key));
			$('<label />', { 'for': classSkills[key], id: key, text: classSkills[key] }).appendTo($('.skill-'+key));
		}
	}
	
	function updateInfiltrate() {
		if($('input#is_infiltration:checked').val() == 0) {
			$('.infiltration').val("");
			$('.infiltration').attr('disabled', "disabled");
			$('.infiltration').removeAttr("required");
		}
		else if($('input#is_infiltration:checked').val() == 1) {
			$('.infiltration').removeAttr("disabled");
			$('.infiltration').attr('required', "required");
		}
	}

	// Update Alien list based on baseAlien
	var baseAliens;
	$.getJSON("/json/aliens.php", function (data) {
		baseAliens = data;
	});
				
	$(document).on("change", "select.base-alien", function(e) {
		e.preventDefault();
		console.log($(this).find(":selected").val());
		var selection = $(this).find(":selected").val();
		var alienType = baseAliens[selection];
		console.log($(this).parents('.mission-info.row'));
		console.log($($(this).parents('.mission-info.row').find('.alien')));
		$($(this).parents('.mission-info.row').find('.alien')).empty();
		for (alien in alienType) {
			$("<option />").text(alienType[alien]).val(alien).appendTo($(this).parents('.row').find('.alien'));
		}
	});
	
	// Update Objective List based on Mission type
	var missionType;
	$.getJSON("/json/missions.php", function (dataMission) {
		missionType = dataMission;
	});
	
	$(document).on("change", "select.mission-type", function(e) {
		e.preventDefault();
		var selection = $(this).find(":selected").val();
		var objective = missionType[selection];
		$($(this).parents('.row').find('.objective')).empty();
		for (obj in objective) {
			$("<option />").text(objective[obj]).val(obj).appendTo($(this).parents('.row').find('.objective'));
		}
	});
	
	// Update Soldier Rank and Class based on Soldier
	var soldiers;
	$.getJSON("/json/soldiers.php", function (dataMission) {
		soldiers = dataMission;
	});
	
	$(document).on("change", "select.soldierid", function(e) {
		e.preventDefault();
		var selection = $(this).find(":selected").val();
		var rank = soldiers[selection];
		if(selection == "") {
			$($(this).parents('.mission-info.row').find('.rank')).empty();
			$("<option />").text("N/A").val("").appendTo($(this).parents('.row').find('.rank'));
			$($(this).parents('.mission-info.row').find('.class')).empty();
			$("<option />").text("N/A").val("").appendTo($(this).parents('.row').find('.class'));
		} else {
			$($(this).parents('.mission-info.row').find('.rank')).empty();
			$("<option />").text(rank['Rank']).val(rank['RankID']).appendTo($(this).parents('.row').find('.rank'));
			$($(this).parents('.mission-info.row').find('.class')).empty();
			$("<option />").text(rank['Class']).val(rank['ClassID']).appendTo($(this).parents('.row').find('.class'));
		}
	});
	
	/* Update Chosen Results List based on Chosen
	var chosen;
	$.getJSON("/admin/json/chosen.json", function (dataChosen) {
		chosen = dataChosen;
	});
	
	$(document).on("change", ".chosen-field select", function(e) {
		e.preventDefault();
		var selection = $(this).find(":selected").val();
		var results = chosen[selection];
		$($(this).parents('.row').find('.chosen-result')).empty();
		for (obj in results) {
			$("<option />").text(results[obj]).val(results[obj]).appendTo($(this).parents('.row').find('.chosen-result'));
		}
	});*/
	
	// Disable Dark Event Counter if not Guerrilla Op
	$('#mission-type').change(function(){
		if($('#mission-type').val() == 'Guerrilla Op') {
			$('#dark-event').removeAttr("disabled");
		}
		else {
			$('#dark-event').attr('disabled', 'disabled');
		}
	});
	
	// Enable Chosen Result Dropdown if Chosen is Present
	$('#chosen').change(function(){
		if($('#chosen').val() == 'None') {
			$('#chosen-result').attr('disabled', 'disabled');
		}
		else {
			$('#chosen-result').removeAttr("disabled");
		}
	});
	
	/* If infiltrating is set, disable the following items:
		- Mission Date (should be set to date of last mission by default)
		- Location (should be set to empty string by default)
		- Mission Turns (should be set to 0 by default. Changing test in Class to allow value of 0)
		- Sitreps
		- Episode Numbers
		- Episode URL
		- Chosen
		- Mission Picture
		- Base Alien
		- Alien
		- Encountered
		- Killed
		
	Other Notes:
		- Rating can now be set to "Infiltrating"
		- Infiltration % should be set to 0 while infiltrating
		*/
	$(document).on("change", "input[name=complete]", function(e) {
		if($('input[name=complete]:checked').val() == 3) {
			$('#mission-date').attr('disabled', 'disabled');
			$('#location').attr('disabled', 'disabled');
			$('#turns').attr('disabled', 'disabled');
			$('#sitrep').attr('disabled', 'disabled');
			$('#episode').attr('disabled', 'disabled');
			$('#url').attr('disabled', 'disabled');
			$('#chosen').attr('disabled', 'disabled');
			$('#mission-picture').attr('disabled', 'disabled');
			$('#base-alien').attr('disabled', 'disabled');
			$('#alien').attr('disabled', 'disabled');
			$('#encountered').attr('disabled', 'disabled');
			$('#killed').attr('disabled', 'disabled');
			$('#rating').attr('disabled', 'disabled');
		}
		else {
			$('#mission-date').removeAttr("disabled");
			$('#location').removeAttr("disabled");
			$('#turns').removeAttr("disabled");
			$('#sitrep').removeAttr("disabled");
			$('#episode').removeAttr("disabled");
			$('#url').removeAttr("disabled");
			$('#chosen').removeAttr("disabled");
			$('#mission-picture').removeAttr("disabled");
			$('#base-alien').removeAttr("disabled");
			$('#alien').removeAttr("disabled");
			$('#encountered').removeAttr("disabled");
			$('#killed').removeAttr("disabled");
			$('#rating').removeAttr('disabled', 'disabled');
		}
	});
});