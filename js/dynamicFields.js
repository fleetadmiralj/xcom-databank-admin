$(function(){

	// Update Soldier Ranks Available based on Class
	var baseClass;
	$.getJSON("/json/classes.php", function (data) {
		baseClass = data;
	});
	
	$(document).on("change", "select.soldier-class", function(e) {
		updateClass();
	});
	
	$(document).on("change", "input[name=is_chain]", function(e) {
		updateChain();
	});
	
	$(document).on("change", "#is-infiltration", function(e) {
		updateInfiltrate();
	});

	function updateClass() {
		var selected = $('#soldier-form .soldier-class').find(":selected").val();
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
		if(className === "Spark") {
			$('#will').val(null);
			$('#psi').val(null);
			$('#will').attr('disabled', 'disabled');
			$('t#psi').attr('disabled', 'disabled');
		}
		else {
			$('#will').removeAttr("disabled");
			$('#psi').removeAttr("disabled");
			$('#will').css("background-color", "");
			$('#psi').css("background-color", "");
		}
		
		if(className === "Reaper" || className === "Skirmisher" || className === "Templar" || className === "Spark") {
			$('#country').val(null);
			$('#country').attr('disabled', 'disabled');
			$('#country').css("background-color", "");
		}
		else {
			$('#country').removeAttr("disabled");
		}

		$('#soldier-form #rank').empty();
		for(key in classRanks) {
			$("<option />").text(classRanks[key]).val(key).appendTo($('#soldier-form #rank'));
		}

		$('#soldier-form .skill-list').empty();
		for(key in classSkills) {
			var classSkillRank = classSkills[key];
			$('<div />').addClass('col rank-'+key).appendTo($('#soldier-form .skill-list'));
			//$('<input />', { type: 'checkbox', value: key, name: 'skills[]', text: classSkills[key] }).appendTo($('.skill-'+key));
			//$('<label />', { 'for': classSkills[key], id: key }).appendTo($('#soldier-form .skill-list')).addClass('col-sm-2');
			for(var keyrow in classSkillRank) {
				var shortSkill = classSkillRank[keyrow].replace(/\s/g, '');
				shortSkill = shortSkill.replace("'", '');
				shortSkill = shortSkill.replace("!", '');
				$('<span />').addClass(shortSkill).appendTo($('.rank-' + key));
				$('<input />', {
					type: 'checkbox',
					name: 'skills[]',
					value: keyrow,
					id: classSkillRank[keyrow]
				}).appendTo($('.' + shortSkill));
				$('<label />', {'for': classSkillRank[keyrow], id: keyrow, text: classSkillRank[keyrow]}).appendTo($('.' + shortSkill));
			}
		}
	}

	function updateInfiltrate() {
		console.log('Inside UpdateInfiltrate');
		if($('#is-infiltration').val() == 1) {
			console.log('Check is enabled');
			$('#infiltration').removeAttr("disabled");
			$('#infiltration').attr('required', "required");
		} else {
			console.log('Check is disabled');
			$('#infiltration').val("");
			$('#infiltration').attr('disabled', "disabled");
			$('#infiltration').removeAttr("required");
		}
	}

	// Update Alien list based on baseAlien
	$(document).on("change", "select.typeid", function() {
		var currentType = $(this);
		$.getJSON("/json/aliens.php", function (dataMission) {
			var selection = currentType.find(":selected").text();
			var alienType = dataMission[selection];
			$(currentType.parents('.row').find('.alienid')).empty();
			for (alien in alienType) {
				$("<option />").text(alienType[alien]).val(alien).appendTo(currentType.parents('.row').find('.alienid'));
			}
		});
	});

	// Update Objective when Mission Type Changes
	$(document).on("change", "select.mission-type", function() {
		$.getJSON("/json/missions.php", function (dataMission) {
			var selection = $('select.mission-type').find(":selected").text();
			var objective = dataMission[selection];
			$($('select.mission-type').parents('.row').find('.objective')).empty();
			for (obj in objective) {
				$("<option />").text(objective[obj]).val(obj).appendTo($('select.mission-type').parents('.row').find('.objective'));
			}
		});
	});
	
	// Update Soldier Rank and Class based on Soldier
	$(document).on("change", "select.soldierid", function() {
		var currentSoldier = $(this);
		$.getJSON("/json/soldiers.php", function (dataMission) {
			var selection = currentSoldier.find(":selected").val();
			var rank = dataMission[selection];
			if(selection == "") {
				$(currentSoldier.parents('.field-repeat.row').find('.rank')).empty();
				$("<option />").text("N/A").val("").appendTo(currentSoldier.parents('.field-repeat.row').find('.rank'));
				$(currentSoldier.parents('.row').find('.class')).empty();
				$("<option />").text("N/A").val("").appendTo(currentSoldier.parents('.field-repeat.row').find('.class'));
			} else {
				$(currentSoldier.parents('.field-repeat.row').find('.rank')).empty();
				$("<option />").text(rank['Rank']).val(rank['RankID']).appendTo(currentSoldier.parents('.field-repeat.row').find('.rank'));
				$(currentSoldier.parents('.field-repeat.row').find('.class')).empty();
				$("<option />").text(rank['Class']).val(rank['ClassID']).appendTo(currentSoldier.parents('.field-repeat.row').find('.class'));
			}
		});
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