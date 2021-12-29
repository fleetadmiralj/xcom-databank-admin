<?php

include_once __DIR__.'/../project/adminInclude.php'; ?>

<!DOCTYPE html>
<html lang="en">
    <?php include_once __DIR__.'/php/header-include.php' ?>
    <body>
    <?php include_once __DIR__.'/php/page-head.php' ?>
        <div id="main">
            <div class="row">
                <div class="col-6 index-section">
                    <h2>Mission Information</h2>
                    <div class="row">
                        <div class="col-5"><strong>Missions</strong></div>
                        <div class="col-2"><a href="mission/mission-list.php">List</a></div>
                        <div class="col-2"><a href="mission/mission-only.php">Only</a></div>
                        <div class="col-2"><a href="mission/mission.php">Add</a></div>
                    </div>
                    <div class="row">
                        <div class="col-5"><strong>Mission Soldiers</strong></div>
                        <div class="col-2"><a href="mission/mission-soldier-list.php">List</a></div>
                        <div class="col-2"><a href="mission/mission-soldier.php">Add</a></div>
                    </div>
                    <div class="row">
                        <div class="col-5"><strong>Mission Aliens</strong></div>
                        <div class="col-2"><a href="mission/mission-alien-list.php">List</a></div>
                        <div class="col-2"><a href="mission/mission-alien.php">Add</a></div>
                    </div>
                    <div class="row">
                        <div class="col-5"><strong>Mission Types</strong></div>
                        <div class="col-2"><a href="mission/mission-type-list.php">List</a></div>
                        <div class="col-2"><a href="mission/mission-type.php">Add</a></div>
                    </div>
                    <div class="row">
                        <div class="col-5"><strong>Mission Objectives</strong></div>
                        <div class="col-2"><a href="mission/objective-list.php">List</a></div>
                        <div class="col-2"><a href="mission/objective.php">Add</a></div>
                    </div>
                    <div class="row">
                        <div class="col-5"><strong>Mission SITREPs</strong></div>
                        <div class="col-2"><a href="mission/sitrep-list.php">List</a></div>
                        <div class="col-2"><a href="mission/sitrep.php">Add</a></div>
                    </div>
                </div>
                <div class="col-6 index-section">
                    <h2>Covert Infiltration</h2>
                    <div class="row">
                        <div class="col-5"><strong>Covert Actions</strong></div>
                        <div class="col-2"><a href="covert/covert-list.php">List</a></div>
                        <div class="col-2"><a href="covert/covert.php">Add</a></div>
                    </div>
                    <div class="row">
                        <div class="col-5"><strong>Covert Action Types</strong></div>
                        <div class="col-2"><a href="covert/covert-type-list.php">List</a></div>
                        <div class="col-2"><a href="covert/covert-type.php">Add</a></div>
                    </div>
                    <div class="row">
                        <div class="col-5"><strong>Activity Chains</strong></div>
                        <div class="col-2"><a href="covert/chain-list.php">List</a></div>
                        <div class="col-2"><a href="covert/chain.php">Add</a></div>
                    </div>
                    <div class="row">
                        <div class="col-5"><strong>Activity Chain Type</strong></div>
                        <div class="col-2"><a href="covert/chain-type-list.php">List</a></div>
                        <div class="col-2"><a href="covert/chain-type.php">Add</a></div>
                    </div>
                </div>
            </div>
				
            <div class="row">
                <div class="col-6 index-section">
                    <h2>Soldier Information</h2>
                    <div class="row">
                        <div class="col-5"><strong>Soldiers</strong></div>
                        <div class="col-2"><a href="soldier/soldier-list.php">List</a></div>
                        <div class="col-2"><a href="soldier/soldier.php">Add</a></div>
                    </div>
                    <div class="row">
                        <div class="col-5"><strong>Bonds</strong></div>
                        <div class="col-2"><a href="soldier/bonds-list.php">List</a></div>
                        <div class="col-2"><a href="soldier/bonds.php">Add</a></div>
                    </div>
					<div class="row">
                        <div class="col-5"><strong>Soldier Skills</strong></div>
                        <div class="col-2"><a href="soldier/soldier-skill-list.php">List</a></div>
                        <div class="col-2"><a href="soldier/soldier-skill.php">Add</a></div>
                    </div>
                </div>
                <div class="col-6 index-section">
                    <h2>Aliens</h2>
                    <div class="row">
                        <div class="col-5"><strong>Alien Type</strong></div>
						<div class="col-2"><a href="aliens/alien-types-list.php">List</a></div>
                        <div class="col-2"><a href="aliens/alien-types.php">Add</a></div>
                    </div>
                    <div class="row">
                        <div class="col-5"><strong>Alien Units</strong></div>
                        <div class="col-2"><a href="aliens/aliens-list.php">List</a></div>
                        <div class="col-2"><a href="aliens/aliens.php">Add</a></div>
                    </div>
                    <div class="row">
                        <div class="col-5"><strong>MOCX</strong></div>
                        <div class="col-2"><a href="aliens/mocx-list.php">List</a></div>
                        <div class="col-2"><a href="aliens/mocx.php">Add</a></div>
                    </div>
                    <div class="row">
                        <div class="col-5"><strong>MOCX Missions</strong></div>
                        <div class="col-2"><a href="aliens/mocx-mission-list.php">List</a></div>
                        <div class="col-2"><a href="aliens/mocx-mission.php">Add</a></div>
                    </div>
                    <div class="row">
                        <div class="col-5"><strong>Chosen</strong></div>
                        <div class="col-2"><a href="aliens/chosen-list.php">List</a></div>
                        <div class="col-2"><a href="aliens/chosen.php">Add</a></div>
                    </div>
                </div>
            </div>
				
            <div class="row">
                <div class="col-6 index-section">
                    <h2>Avenger Information</h2>
                    <div class="row">
                        <div class="col-5"><strong>Campaign Info</strong></div>
                        <div class="col-2"><a href="management/info-list.php">List</a></div>
                        <div class="col-2"><a href="management/info.php">Add</a></div>
                    </div>
                    <div class="row">
                        <div class="col-5"><strong>Research</strong></div>
                        <div class="col-2"><a href="management/research-list.php">List</a></div>
                        <div class="col-2"><a href="management/research.php">Add</a></div>
                    </div>
                    <div class="row">
                        <div class="col-5"><strong>VIPs</strong></div>
                        <div class="col-2"><a href="management/vip-list.php">List</a></div>
                        <div class="col-2"><a href="management/vip.php">Add</a></div>
                    </div>
                </div>
                <div class="col-6 index-section">
                    <h2>Classes & Ranks</h2>
                    <div class="row">
                        <div class="col-5"><strong>Classes</strong></div>
                        <div class="col-2"><a href="management/class-list.php">List</a></div>
                        <div class="col-2"><a href="management/class.php">Add</a></div>
                    </div>
                    <div class="row">
                        <div class="col-5"><strong>Ranks</strong></div>
                        <div class="col-2"><a href="management/rank-list.php">List</a></div>
                        <div class="col-2"><a href="management/rank.php">Add</a></div>
                    </div>
                    <div class="row">
                        <div class="col-5"><strong>Class Ranks</strong></div>
                        <div class="col-2"><a href="management/class-rank-list.php">List</a></div>
                        <div class="col-2"><a href="management/class-rank.php">Add</a></div>
                    </div>
                </div>
            </div>
				
            <div class="row">
                <div class="col-6 index-section">
                    <h2>Skills</h2>
                    <div class="row">
                        <div class="col-5"><strong>Skills</strong></div>
                        <div class="col-2"><a href="management/skills-list.php">List</a></div>
                        <div class="col-2"><a href="management/skills.php">Add</a></div>
                    </div>
                    <div class="row">
                        <div class="col-5"><strong>Class Skills</strong></div>
                        <div class="col-2"><a href="management/class-skill-list.php">List</a></div>
                        <div class="col-2"><a href="management/class-skill.php">Add</a></div>
                    </div>
                </div>
                <div class="col-6 index-section">
                    <h2>Mission Misc.</h2>
                    <div class="row">
                        <div class="col-5"><strong>Dark Events</strong></div>
                        <div class="col-2"><a href="management/dark-event-list.php">List</a></div>
                        <div class="col-2"><a href="management/dark-event.php">Add</a></div>
                    </div>
                    <div class="row">
                        <div class="col-5"><strong>SITREPs</strong></div>
                        <div class="col-2"><a href="management/sitrep-list.php">List</a></div>
                        <div class="col-2"><a href="management/sitrep.php">Add</a></div>
                    </div>
                    <div class="row">
                        <div class="col-5"><strong>Status</strong></div>
                        <div class="col-2"><a href="mission/mission-status-list.php">List</a></div>
                        <div class="col-2"><a href="mission/mission-status.php">Add</a></div>
                    </div>
                    <div class="row">
                        <div class="col-5"><strong>Status Extra</strong></div>
                        <div class="col-2"><a href="mission/extra-list.php">List</a></div>
                        <div class="col-2"><a href="mission/extra.php">Add</a></div>
                    </div>
                </div>
            </div>

			<?php 
			if($_SESSION['level'] == "basic") { ?>
				<p>Welcome to the XCOM Administration Panel. You currently have no user access to any functions.</p>
			<?php } ?>
				
        </div>
    <?php include_once __DIR__.'/php/scripts-include.php' ?>
	</body>
</html>