<?php include_once '/home/joshch9/project/adminInclude.php' ?>

<!DOCTYPE html>
<html lang="en">
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/header-include.php' ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/page-head.php' ?>
			<div id="main">
				<div class="row">
					<div class="col-6 index-section">
						<h2>Mission Information</h2>
						<div class="row">
							<div class="col-5"><strong>Missions</strong></div>
							<div class="col-2"><a href="/mission/mission-list.php">List</a></div>
							<div class="col-2"><a href="/mission/mission.php">Add</a></div>
						</div>
						<div class="row">
							<div class="col-5"><strong>Mission Soldiers</strong></div>
							<div class="col-2"><a href="/soldier/mission-soldiers-list.php">List</a></div>
							<div class="col-2"><a href="/soldier/mission-soldiers.php">Add</a></div>
						</div>
						<div class="row">
							<div class="col-5"><strong>Mission Aliens</strong></div>
							<div class="col-2"></div>
							<div class="col-2"></div>
						</div>
						<div class="row">
							<div class="col-5"><strong>Mission Types</strong></div>
							<div class="col-2"><a href="/mission/mission-type-list.php">List</a></div>
							<div class="col-2"><a href="/mission/mission-type.php">Add</a></div>
						</div>
						<div class="row">
							<div class="col-5"><strong>Mission Objectives</strong></div>
							<div class="col-2"><a href="/mission/objective-list.php">List</a></div>
							<div class="col-2"><a href="/mission/objective.php">Add</a></div>
						</div>
					</div>
					<div class="col-6 index-section">
						<h2>Covert Infiltration</h2>
						<div class="row">
							<div class="col-5"><strong>Covert Actions</strong></div>
							<div class="col-2"><a href="/covert/covert-list.php">List</a></div>
							<div class="col-2"><a href="/covert/covert.php">Add</a></div>
						</div>
						<div class="row">
							<div class="col-5"><strong>Covert Action Operative</strong></div>
							<div class="col-2"></div>
							<div class="col-2"></div>
						</div>
						<div class="row">
							<div class="col-5"><strong>Covert Action Types</strong></div>
							<div class="col-2"><a href="/covert/covert-type-list.php">List</a></div>
							<div class="col-2"><a href="/covert/covert-type.php">Add</a></div>
						</div>
						<div class="row">
							<div class="col-5"><strong>Activity Chains</strong></div>
							<div class="col-2"><a href="/mission/chain-list.php">List</a></div>
							<div class="col-2"><a href="/mission/chain.php">Add</a></div>
						</div>
						<div class="row">
							<div class="col-5"><strong>Activity Chain Type</strong></div>
							<div class="col-2"></div>
							<div class="col-2"></div>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-6 index-section">
						<h2>Soldier Information</h2>
						<div class="row">
							<div class="col-5"><strong>Soldiers</strong></div>
							<div class="col-2"><a href="/soldier/soldier-list.php">List</a></div>
							<div class="col-2"><a href="/soldier/soldier.php">Add</a></div>
						</div>
						<div class="row">
							<div class="col-5"><strong>Bonds</strong></div>
							<div class="col-2"><a href="/soldier/bonds-list.php">List</a></div>
							<div class="col-2"><a href="/soldier/bonds.php">Add</a></div>
						</div>
						<div class="row">
							<div class="col-5"><strong>Soldier Skills</strong></div>
							<div class="col-2"></div>
							<div class="col-2"></div>
						</div>
					</div>
					<div class="col-6 index-section">
						<h2>Aliens</h2>
						<div class="row">
							<div class="col-5"><strong>Alien Type</strong></div>
							<div class="col-2"><a href="/aliens/alien-types-list.php">List</a></div>
							<div class="col-2"><a href="/aliens/alien-types.php">Add</a></div>
						</div>
						<div class="row">
							<div class="col-5"><strong>Alien Units</strong></div>
							<div class="col-2"><a href="/aliens/aliens-list.php">List</a></div>
							<div class="col-2"><a href="/aliens/aliens.php">Add</a></div>
						</div>
						<div class="row">
							<div class="col-5"><strong>Chosen</strong></div>
							<div class="col-2"><a href="/aliens/chosen-list.php">List</a></div>
							<div class="col-2"><a href="/aliens/chosen.php">Add</a></div>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-6 index-section">
						<h2>Avenger Information</h2>
						<div class="row">
							<div class="col-5"><strong>Campaign Info</strong></div>
							<div class="col-2"><a href="/avenger/info-list.php">List</a></div>
							<div class="col-2"><a href="/avenger/info.php">Add</a></div>
						</div>
						<div class="row">
							<div class="col-5"><strong>Research</strong></div>
							<div class="col-2"><a href="/avenger/research-list.php">List</a></div>
							<div class="col-2"><a href="/avenger/research.php">Add</a></div>
						</div>
						<div class="row">
							<div class="col-5"><strong>VIPs</strong></div>
							<div class="col-2"><a href="/avenger/vip-list.php">List</a></div>
							<div class="col-2"><a href="/avenger/vip.php">Add</a></div>
						</div>
					</div>
					<div class="col-6 index-section">
						<h2>Classes & Ranks</h2>
						<div class="row">
							<div class="col-5"><strong>Classes</strong></div>
							<div class="col-2"><a href="/management/class-list.php">List</a></div>
							<div class="col-2"><a href="/management/class.php">Add</a></div>
						</div>
						<div class="row">
							<div class="col-5"><strong>Ranks</strong></div>
							<div class="col-2"><a href="/management/rank-list.php">List</a></div>
							<div class="col-2"><a href="/management/rank.php">Add</a></div>
						</div>
						<div class="row">
							<div class="col-5"><strong>Class Ranks</strong></div>
							<div class="col-2"><a href="/management/class-rank-list.php">List</a></div>
							<div class="col-2"><a href="/management/class-rank.php">Add</a></div>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-6 index-section">
						<h2>Skills</h2>
						<div class="row">
							<div class="col-5"><strong>Skills</strong></div>
							<div class="col-2"><a href="/management/skills-list.php">List</a></div>
							<div class="col-2"><a href="/management/skills.php">Add</a></div>
						</div>
						<div class="row">
							<div class="col-5"><strong>Class Skills</strong></div>
							<div class="col-2"><a href="/management/class-skill-list.php">List</a></div>
							<div class="col-2"><a href="/management/class-skill.php">Add</a></div>
						</div>
					</div>
					<div class="col-6 index-section">
						<h2>Mission Misc.</h2>
						<div class="row">
							<div class="col-5"><strong>Dark Events</strong></div>
							<div class="col-2"><a href="/management/dark-event-list.php">List</a></div>
							<div class="col-2"><a href="/management/dark-event.php">Add</a></div>
						</div>
						<div class="row">
							<div class="col-5"><strong>SITREPs</strong></div>
							<div class="col-2"><a href="/management/sitrep-list.php">List</a></div>
							<div class="col-2"><a href="/management/sitrep.php">Add</a></div>
						</div>
					</div>
				</div>

			<?php 
			if($_SESSION['level'] == "basic") { ?>
				<p>Welcome to the XCOM Administratin Panel. You currently have no user access to any functions.</p>
			<?php } ?>
				
			</div>
		</div>
	<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/scripts-include.php' ?>
	</body>
</html>