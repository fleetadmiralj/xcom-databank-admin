// Disable Country dropdown for soldier type with no country set ; re-enable it if class with country set is re-selected
// Also show proper skills divs for each respective class

$(function() {
	changeSkills();
});

$('#soldier-type').change(function(){
	changeSkills();
});

function changeSkills() {
	
	if($('#soldier-type').val() == 'Rookie') {
		$('#country').removeAttr("disabled");
		$('#skills').children().css('display','none');
		restoreRanks();
		$("#rank option[value='1']").css('display','block');
		$("#rank option[value='1']").text('Rookie');
		}
	
	else if($('#soldier-type').val() == 'Psi Operative') {
		$('#country').removeAttr("disabled");
		$('#skills').children().css('display','none');
		$('#psi-skills').css('display','block');
		
		$("#rank option[value='1']").css('display','none');
		$("#rank option[value='2']").text('Initiate');
		$("#rank option[value='3']").text('Acolyte');
		$("#rank option[value='4']").text('Adept');
		$("#rank option[value='5']").text('Disciple');
		$("#rank option[value='6']").text('Mystic');
		$("#rank option[value='7']").text('Warlock');
		$("#rank option[value='8']").text('Magus');
	}
			
	else if($('#soldier-type').val() == 'Ranger') {
		$('#skills').children().css('display','none');
		$('#ranger-skills').css('display','block');
		mainClass();
		restoreRanks();
	}
			
	else if($('#soldier-type').val() == 'Grenadier') {
		$('#skills').children().css('display','none');
		$('#grenadier-skills').css('display','block');
		mainClass();
		restoreRanks();
	}
			
	else if($('#soldier-type').val() == 'Specialist') {
		$('#skills').children().css('display','none');
		$('#specialist-skills').css('display','block');
		mainClass();
		restoreRanks();
	}
			
	else if($('#soldier-type').val() == 'Sharpshooter') {
		$('#skills').children().css('display','none');
		$('#sharpshooter-skills').css('display','block');
		mainClass();
		restoreRanks();
	}
			
	else if($('#soldier-type').val() == 'Spark') {
		$('#country').attr('disabled', 'disabled');
		$('#skills').children().css('display','none');
		$('#spark-skills').css('display','block');
		$('#xcom-skills').css('display','block');
		
		$("#rank option[value='1']").css('display','none');
		$("#rank option[value='2']").text('Squire');
		$("#rank option[value='3']").text('Aspirant');
		$("#rank option[value='4']").text('Knight');
		$("#rank option[value='5']").text('Cavalier');
		$("#rank option[value='6']").text('Vanguard');
		$("#rank option[value='7']").text('Paladin');
		$("#rank option[value='8']").text('Champion');
	}
			
	else if($('#soldier-type').val() == 'Reaper') {
		$('#country').attr('disabled', 'disabled');
		$('#skills').children().css('display','none');
		$('#reaper-skills').css('display','block');
		restoreRanks();
	}
			
	else if($('#soldier-type').val() == 'Skirmisher') {
		$('#country').attr('disabled', 'disabled');
		$('#skills').children().css('display','none');
		$('#skirmisher-skills').css('display','block');
		restoreRanks();
	}
			
	else if($('#soldier-type').val() == 'Templar') {
		$('#country').attr('disabled', 'disabled');
		$('#skills').children().css('display','none');
		$('#templar-skills').css('display','block');
		restoreRanks();
	}
}

function mainClass() {
	$('#country').removeAttr("disabled");
	$('#xcom-skills').css('display','block');
}

function restoreRanks() {
	$("#rank option[value='1']").css('display','none');
	$("#rank option[value='2']").text('Squaddie');
	$("#rank option[value='3']").text('Corporal');
	$("#rank option[value='4']").text('Sergeant');
	$("#rank option[value='5']").text('Lieutenant');
	$("#rank option[value='6']").text('Captain');
	$("#rank option[value='7']").text('Major');
	$("#rank option[value='8']").text('Colonel');
}

// Form functionality for Mission Page
$('#mission-type').change(function(){
	if($('#mission-type').val() == 'Guerrilla Op') {
		$('#dark-event').removeAttr("disabled");
	}
	else {
		$('#dark-event').attr('disabled', 'disabled');
	}
});

$('#chosen').change(function(){
	if($('#chosen').val() == 'None') {
		$('#chosen-result').attr('disabled', 'disabled');
	}
	else {
		$('#chosen-result').removeAttr("disabled");
	}
});

/*$('#mission-type').change(function(){
	$('#objective').empty();
	
	if($('#mission-type').val() == 'Guerrilla Op') {
		$('#objective').append($('<option>', { value: "Destroy the Alien Relay", text: "Destroy the Alien Relay"}));
		$('#objective').append($('<option>', { value: "Hack the Hidden Resistance Computer", text: "Hack the Hidden Resistance Computer"}));
		$('#objective').append($('<option>', { value: "Hack the Workstation in ADVENT Facility", text: "Hack the Workstation in ADVENT Facility"}));
		$('#objective').append($('<option>', { value: "Hack the Workstation on ADVENT Train", text: "Hack the Workstation on ADVENT Train"}));
		$('#objective').append($('<option>', { value: "Neutralize Field Officer", text: "Neutralize Field Officer"}));
		$('#objective').append($('<option>', { value: "Protect the Device", text: "Protect the Device"}));
		$('#objective').append($('<option>', { value: "Recover Item from ADVENT Facility", text: "Recover Item from ADVENT Facility"}));
		$('#objective').append($('<option>', { value: "Recover Item from ADVENT Train", text: "Recover Item from ADVENT Train"}));
		$('#objective').append($('<option>', { value: "Recover Item from ADVENT Vehicle", text: "Recover Item from ADVENT Vehicle"}));
		$('#objective').append($('<option>', { value: "Recover Item from Resistance Haven", text: "Recover Item from Resistance Haven"}));
		$('#objective').append($('<option>', { value: "Sabotage Transmitter", text: "Sabotage Transmitter"}));
	}
	else if($('#mission-type').val() == 'Resistance Council') {
		$('#objective').append($('<option>', { value: "Extract VIP from ADVENT City", text: "Extract VIP from ADVENT City"}));
		$('#objective').append($('<option>', { value: "Neutralize Target", text: "Neutralize Target"}));
		$('#objective').append($('<option>', { value: "Neutralize Target in ADVENT Vehicle", text: "Neutralize Target in ADVENT Vehicle"}));
		$('#objective').append($('<option>', { value: "Rescue VIP from ADVENT Cell", text: "Rescue VIP from ADVENT Cell"}));
		$('#objective').append($('<option>', { value: "Rescue VIP from ADVENT Vehicle", text: "Rescue VIP from ADVENT Vehicle"}));
	}
	else if($('#mission-type').val() == 'Resistance Operation') {
		$('#objective').append($('<option>', { value: "Gather Survivors from Abandoned City", text: "Gather Survivors from Abandoned City"}));
		$('#objective').append($('<option>', { value: "Recover Resistance Operative", text: "Recover Resistance Operative"}));
		$('#objective').append($('<option>', { value: "Rescue Stranded Resistance Agents", text: "Rescue Stranded Resistance Agents"}));
	}
	else if($('#mission-type').val() == 'ADVENT Retaliation') {
		$('#objective').append($('<option>', { value: "Haven Assault", text: "Haven Assault"}));
		$('#objective').append($('<option>', { value: "Stop the ADVENT Retaliation", text: "Stop the ADVENT Retaliation"}));
	}
	else if($('#mission-type').val() == 'Supply Raid') {
		$('#objective').append($('<option>', { value: "Extract ADVENT Supplies", text: "Extract ADVENT Supplies"}));
		$('#objective').append($('<option>', { value: "Raid the ADVENT Convoy", text: "Raid the ADVENT Convoy"}));
		$('#objective').append($('<option>', { value: "Raid the ADVENT Train", text: "Raid the ADVENT Train"}));
		$('#objective').append($('<option>', { value: "Raid the ADVENT Troop Transport", text: "Raid the ADVENT Troop Transport"}));
	}
	else if($('#mission-type').val() == 'Alien Facility') {
		$('#objective').append($('<option>', { value: "Sabotage the Alien Facility", text: "Sabotage the Alien Facility"}));
	}
	else if($('#mission-type').val() == 'Gatecrasher') {
		$('#objective').append($('<option>', { value: "Sabotage Advent Monument", text: "Sabotage Advent Monument"}));
	}
	else if($('#mission-type').val() == 'ADVENT Blacksite') {
		$('#objective').append($('<option>', { value: "Investigate the ADVENT Blacksite", text: "Investigate the ADVENT Blacksite"}));
	}
	else if($('#mission-type').val() == 'Codex Brain Coordinates') {
		$('#objective').append($('<option>', { value: "Investigate the Codex Brain Coordinates", text: "Investigate the Codex Brain Coordinates"}));
	}
	else if($('#mission-type').val() == 'Blacksite Data Coordinates') {
		$('#objective').append($('<option>', { value: "Investigate the ADVENT Forge", text: "Investigate the ADVENT Forge"}));
	}
	else if($('#mission-type').val() == 'ADVENT Network Tower') {
		$('#objective').append($('<option>', { value: "Secure the ADVENT Network Tower", text: "Secure the ADVENT Network Tower"}));
	}
	else if($('#mission-type').val() == 'Alien Fortress') {
		$('#objective').append($('<option>', { value: "Assault the Alien Fortress", text: "Assault the Alien Fortress"}));
	}
	else if($('#mission-type').val() == 'Ambush') {
		$('#objective').append($('<option>', { value: "Emergency Extraction of covert XCOM Operatives", text: "Emergency Extraction of covert XCOM Operatives"}));
	}
	else if($('#mission-type').val() == 'Avenger Defense') {
		$('#objective').append($('<option>', { value: "Defend the Avenger", text: "Defend the Avenger"}));
	}
	else if($('#mission-type').val() == 'Avenger Assault') {
		$('#objective').append($('<option>', { value: "Repel the Chosen Assault", text: "Repel the Chosen Assault"}));
	}
	else if($('#mission-type').val() == 'Stealth Rescue') {
		$('#objective').append($('<option>', { value: "Rescue Operative from ADVENT Compound", text: "Rescue Operative from ADVENT Compound"}));
	}
	else if($('#mission-type').val() == 'Chosen Hunter Stronghold') {
		$('#objective').append($('<option>', { value: "Assault Chosen Stronghold", text: "Assault Chosen Stronghold"}));
	}
	else if($('#mission-type').val() == 'Chosen Assassin Stronghold') {
		$('#objective').append($('<option>', { value: "Assault Chosen Stronghold", text: "Assault Chosen Stronghold"}));
	}
	else if($('#mission-type').val() == 'Chosen Warlock Stronghold') {
		$('#objective').append($('<option>', { value: "Assault Chosen Stronghold", text: "Assault Chosen Stronghold"}));
	}
	else if($('#mission-type').val() == 'Lost and Abandoned') {
		$('#objective').append($('<option>', { value: "Rendezvous with the Reapers", text: "Rendezvous with the Reapers"}));
	}
	else if($('#mission-type').val() == 'Triangulated Position') {
		$('#objective').append($('<option>', { value: "Investigate the Signal", text: "Investigate the Signal"}));
	}
	else if($('#mission-type').val() == 'Encrypted Signal') {
		$('#objective').append($('<option>', { value: "Investigate the Facility", text: "Investigate the Facility"}));
	}
	else if($('#mission-type').val() == 'Landed UFO') {
		$('#objective').append($('<option>', { value: "Secure the Disabled UFO", text: "Secure the Disabled UFO"}));
	}
	else {
		$('#objective').attr('disabled', 'disabled');
	}
}); */

$('#injured').change(function(){
	if($('#injured').val() == 'Active') {
		$('#injured-time').attr('disabled', 'disabled');
	}
	else if($('#injured').val() == 'Captured') {
		$('#injured-time').attr('disabled', 'disabled');
	}
	else if($('#injured').val() == 'Killed') {
		$('#injured-time').attr('disabled', 'disabled');
	}
	else if($('#injured').val() == 'Lightly Wounded') {
		$('#injured-time').removeAttr("disabled");
	}
	else if($('#injured').val() == 'Wounded') {
		$('#injured-time').removeAttr("disabled");
	}
	else if($('#injured').val() == 'Gravely Wounded') {
		$('#injured-time').removeAttr("disabled");
	}
	else if($('#injured').val() == 'Rescued') {
		$('#injured-time').removeAttr("disabled");
	}
	else if($('#injured').val() == 'Shaken') {
		$('#injured-time').removeAttr("disabled");
	}
});

$('#status').change(function(){
	if($('#status').val() == '') {
		$('#status-info').attr('disabled', 'disabled');
	}
	else {
		$('#status-info').removeAttr("disabled");
	}
});

$('#operative-soldier').change(function(){
	if($('#operative-soldier').val() == '') {
		$('#operative-other').removeAttr("disabled");
	}
	else {
		$('#operative-other').attr('disabled', 'disabled');
	}
});

$('#operative-other').change(function(){
	if($('#operative-other').val() == '') {
		$('#operative-soldier').removeAttr("disabled");
	}
	else {
		$('#operative-soldier').attr('disabled', 'disabled');
	}
});