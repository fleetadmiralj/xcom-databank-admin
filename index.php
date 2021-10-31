<?php include_once '/home/joshch9/project/adminInclude.php' ?>

<!DOCTYPE html>
<html lang="en">
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/header-include.php' ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/page-head.php' ?>
			<div id="main">
			
				<h2>Mission Information</h2>
				<div class="row">
					<div class="col-4"><strong>Missions</strong></div>
					<div class="col-8"><a href="/mission/mission-list.php">List</a> | <a href="/mission/mission.php">Add</a></div>
				</div>
				<div class="row">
					<div class="col-4"><strong>Mission Soldiers</strong></div>
					<div class="col-8"><a href="/soldier/mission-soldiers-list.php">List</a> | <a href="/soldier/mission-soldiers.php">Add</a></div>
				</div>
				<div class="row">
					<div class="col-4"><strong>Mission Aliens</strong></div>
					<div class="col-8"></div>
				</div>
				<div class="row">
					<div class="col-4"><strong>Mission Types</strong></div>
					<div class="col-8"><a href="/mission/mission-type-list.php">List</a> | <a href="/mission/mission-type.php">Add</a></div>
				</div>
				<div class="row">
					<div class="col-4"><strong>Mission Objectives</strong></div>
					<div class="col-8"><a href="/mission/objective-list.php">List</a> | <a href="/mission/objective.php">Add</a></div>
				</div>
			
				<div class="admin-section">
					<h3>Mission Information</h3>
					<div class="row">
						<div class="col-sm-3">
							<h5>Create Activity Chain</h5>
							<p><a href="/mission/chain-list.php">List</a> | <a href="/mission/chain.php">Add</a></p>
						</div>
						<!-- <div class="col-sm-4">
							<h5>Mission SITREPs</h5>
							<p>List | Add</p>
						</div> -->
					</div>
				</div>
				
				<div class="admin-section">
					<h3>Soldier Information</h3>
					<div class="row">
						<div class="col-sm-4">
							<h5>Soldier</h5>
							<p><a href="/soldier/soldier-list.php">List</a> | <a href="/soldier/soldier.php">Add</a></p>
						</div>
						<div class="col-sm-4">
							<h5>Bonds</h5>
							<p><a href="/soldier/bonds-list.php">List</a> | <a href="/soldier/bonds.php">Add</a></p>
						</div>
						<!-- <div class="col-sm-4">
							<h5>Soldier Skills</h5>
							<p>List | Add</p>
						</div> -->
					</div>
				</div>
				
				<div class="admin-section">
					<h3>Covert Actions</h3>
					<div class="row">
						<div class="col-sm-4">
							<h5>Covert Actions</h5>
							<p><a href="/covert/covert-list.php">List</a> | <a href="/covert/covert.php">Add</a></p>
						</div>
						<!-- <div class="col-sm-4">
							<h5>Covert Action Member</h5>
							<p>List | Add</p>
						</div> -->
						<div class="col-sm-4">
							<h5>Covert Action Types</h5>
							<p><a href="/covert/covert-type-list.php">List</a> | <a href="/covert/covert-type.php">Add</a></p>
						</div>
						<!-- <div class="col-sm-4">
							<h5>Covert Action Requirements</h5>
							<p>List | Add</p>
						</div>
						<div class="col-sm-4">
							<h5>Covert Action Status</h5>
							<p>List | Add</p>
						</div>
						<div class="col-sm-4">
							<h5>Covert Operative Status</h5>
							<p>List | Add</p>
						</div> -->
					</div>
				</div>
				
				<!-- <div class="admin-section">
					<h3>Activity Chains</h3>
					<div class="row">
						<div class="col-sm-4">
							<h5>Create Activity Chain</h5>
							<p><a href="/chain/chain-list.php">List</a> | <a href="/chain/chain.php">Add</a></p>
						</div>
						<div class="col-sm-4">
							<h5>Add Activity Chain Step</h5>
							<p><a href="/chain/chain-step-list.php">List</a> | <a href="/chain/chain-step.php">Add</a></p>
						</div>
					</div>
				</div> -->
				
				<div class="admin-section">
					<h3>Alien Information</h3>
					<div class="row">
						<div class="col-sm-4">
							<h5>Alien Units</h5>
							<p><a href="/aliens/aliens-list.php">List</a> | <a href="/aliens/aliens.php">Add</a></p>
						</div>
						<div class="col-sm-4">
							<h5>Alien Types</h5>
							<p><a href="/aliens/alien-types-list.php">List</a> | <a href="/aliens/alien-types.php">Add</a></p>
						</div>
						<div class="col-sm-4">
							<h5>Chosen</h5>
							<p><a href="/aliens/chosen-list.php">List</a> | <a href="/aliens/chosen.php">Add</a></p>
						</div>
					</div>
				</div>
				
				<!-- <div class="admin-section">
					<h3>Avenger Information</h3>
					<div class="row">
						<div class="col-sm-4">
							<h5>Gear</h5>
							<p>List | Add</p>
						</div>
						<div class="col-sm-4">
							<h5>Research</h5>
							<p>List | Add</p>
						</div>
					</div>
				</div> -->
				
				<div class="admin-section">
					<h3>Avenger Information</h3>
					<div class="row">
						<div class="col-sm-4">
							<h5>VIPs</h5>
							<p><a href="/avenger/vip-list.php">List</a> | <a href="/avenger/vip.php">Add</a></p>
						</div>
						<div class="col-sm-4">
							<h5>Research</h5>
							<p><a href="/avenger/research-list.php">List</a> | <a href="/avenger/research.php">Add</a></p>
						</div>
						<div class="col-sm-4">
							<h5>Campaign Info</h5>
							<p><a href="/avenger/info-list.php">List</a> | <a href="/avenger/info.php">Add</a></p>
						</div>
						<!-- <div class="col-sm-4">
							<h5>VIP Status</h5>
							<p>List | Add</p>
						</div>
						<div class="col-sm-4">
							<h5>VIP Type</h5>
							<p>List | Add</p>
						</div> -->
					</div>
				</div>
				
				<!-- <div class="admin-section">
					<h3>Chosen Information</h3>
					<div class="row">
						<div class="col-sm-4">
							<h5>Chosen</h5>
							<p><a href="/chosen/chosen-list.php">List</a> | <a href="/chosen/chosen.php">Add</a></p>
						</div>
						<div class="col-sm-4">
							<h5>Chosen Encounter Results</h5>
							<p>List | Add</p>
						</div>
						<div class="col-sm-4">
							<h5>Chosen Type</h5>
							<p>List | Add</p>
						</div>
					</div>
				</div> -->
				
				<div class="admin-section">
					<h3>Game Management</h3>
					<div class="row">
						<div class="col-sm-3">
							<h5>Dark Events</h5>
							<p><a href="/management/dark-event-list.php">List</a> | <a href="/management/dark-event.php">Add</a></p>
						</div>
						<div class="col-sm-3">
							<h5>SITREPs</h5>
							<p><a href="/management/sitrep-list.php">List</a> | <a href="/management/sitrep.php">Add</a></p>
						</div>
						<div class="col-sm-3">
							<h5>Skills</h5>
							<p><a href="/management/skills-list.php">List</a> | <a href="/management/skills.php">Add</a></p>
						</div>
						<div class="col-sm-3">
							<h5>Classes</h5>
							<p><a href="/management/class-list.php">List</a> | <a href="/management/class.php">Add</a></p>
						</div>
						<div class="col-sm-3">
							<h5>Ranks</h5>
							<p><a href="/management/rank-list.php">List</a> | <a href="/management/rank.php">Add</a></p>
						</div>
						<div class="col-sm-3">
							<h5>Class Ranks</h5>
							<p><a href="/management/class-rank-list.php">List</a> | <a href="/management/class-rank.php">Add</a></p>
						</div>
						<div class="col-sm-3">
							<h5>Class Skills</h5>
							<p><a href="/management/class-skill-list.php">List</a> | <a href="/management/class-skill.php">Add</a></p>
						</div>
						<!-- <div class="col-sm-3">
							<h5>Countries</h5>
							<p>List | Add</p>
						</div>
						<div class="col-sm-3">
							<h5>Factions</h5>
							<p>List | Add</p>
						</div>
						<div class="col-sm-3">
							<h5>Mission Difficulties</h5>
							<p>List | Add</p>
						</div>
						<div class="col-sm-3">
							<h5>Mission Ratings</h5>
							<p>List | Add</p>
						</div>
						<div class="col-sm-3">
							<h5>Soldier - Special Types</h5>
							<p>List | Add</p>
						</div>
						<div class="col-sm-3">
							<h5>Soldier Injury Status</h5>
							<p>List | Add</p>
						</div>
						<div class="col-sm-6">
							<h5>Soldier Intelligence Levels</h5>
							<p>List | Add</p>
						</div>
						<div class="col-sm-3">
							<h5>Regions</h5>
							<p>List | Add</p>
						</div> -->
					</div>
				</div>
				
				<!-- <div class="admin-section">
					<h3>Front-End Settings</h3>
					<div class="row">
						<div class="col-sm-4">
							<h5>Front-End Settings</h5>
							<p><a href="/lists/front-settings.php">List</a> | <a href="/manage/front-settings.php">Add</a></p>
						</div>
					</div>
				</div>
				
				<div class="admin-section">
					<h3>Logging</h3>
					<div class="row">
						<div class="col-sm-4">
							<h5>Log Entries</h5>
							<p><a href="/lists/logs.php">List</a> | <a href="/manage/logs.php">Add</a></p>
						</div>
						<div class="col-sm-4">
							<h5>Log Characters</h5>
							<p><a href="/lists/log-characters.php">List</a> | <a href="/manage/log-characters.php">Add</a></p>
						</div>
						<div class="col-sm-4">
							<h5>Log Character Type</h5>
							<p><a href="/lists/log-type.php">List</a> | <a href="/manage/log-type.php">Add</a></p>
						</div>
					</div>
				</div>
				
				<div class="admin-section">
					<h3>Administration Settings</h3>
					<div class="row">
						<div class="col-sm-4">
							<h5>Users</h5>
							<p><a href="/lists/users.php">List</a> | <a href="/manage/users.php">Add</a></p>
						</div>
						<div class="col-sm-4">
							<h5>User Levels</h5>
							<p><a href="/lists/user-levels.php">List</a> | <a href="/manage/user-levels.php">Add</a></p>
						</div>
						<div class="col-sm-4">
							<h5>Admin Sections</h5>
							<p><a href="/lists/section.php">List</a> | <a href="/manage/section.php">Add</a></p>
						</div>
						<div class="col-sm-4">
							<h5>Section Access</h5>
							<p><a href="/lists/section-access.php">List</a> | <a href="/manage/section-access.php">Add</a></p>
						</div>
						<div class="col-sm-4">
							<h5>Section Editables</h5>
							<p><a href="/lists/section-editables.php">List</a> | <a href="/manage/section-editables.php">Add</a></p>
						</div>
						<div class="col-sm-4">
							<h5>Admin Variables</h5>
							<p><a href="/lists/admin-variables.php">List</a> | <a href="/manage/admin-variables.php">Add</a></p>
						</div>
					</div>
				</div> -->

			<?php 
			if($_SESSION['level'] == "basic") { ?>
				<p>Welcome to the XCOM Administratin Panel. You currently have no user access to any functions.</p>
			<?php } ?>
				
			</div>
		</div>
	<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/scripts-include.php' ?>
	</body>
</html>