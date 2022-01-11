<?php
use XCOMDatabank\Missions\Mission;
use XCOMDatabank\Missions\MissionAlien;
use XCOMDatabank\Missions\MissionSitrep;
use XCOMDatabank\Missions\MissionSoldier;
use XCOMDatabank\Missions\MissionStatus;

include_once __DIR__.'/../../project/adminInclude.php';

$errorMsg = "";
$mission = new Mission();
$missionFields = [];

if(!empty($_POST)) {
    if(!empty($_FILES['picture']['name'])) {
        $_POST['picture'] = $_FILES['picture'];
    } else {
        $_POST['picture'] = $_POST['picture_current'];
    }
    $missionData = $_POST;

    // Collect and Submit Mission Information
    $missionFields['objective_id'] = $missionData['objective_id'];
    $missionFields['dark_event_id'] = $missionData['dark_event_id'] ?? null;
    $missionFields['chosen_id'] = $missionData['chosen_id'] ?? null;
	$missionFields['episode'] = $missionData['episode'] ?? array();
    $missionFields['url'] = $missionData['url'] ?? array();
    $missionFields['sector'] = $missionData['sector'];
	$missionFields['location'] = $missionData['location'] ?? $missionFields['sector'];
	$missionFields['mission_date'] = $missionData['mission_date'] ?? $mission->missionDate;
	$missionFields['operation_name'] = $missionData['operation_name'];
    $missionFields['reward'] = $missionData['reward'];
    $missionFields['difficulty'] = $missionData['difficulty'];
    $missionFields['chosen_result'] = $missionData['chosen_result'] ?? null;
    $missionFields['rating'] = $missionData['rating'];
	$missionFields['mission_status'] = $missionData['mission_status'];
    $missionFields['turns'] = $missionData['turns'] ?? 1;
    $missionFields['is_chain'] = $missionData['is_chain'];
    $missionFields['is_infiltration'] = $missionData['is_infiltration'];
    $missionFields['infiltration'] = $missionData['infiltration'] ?? null;
    $missionFields['picture'] = $_FILES["picture"] ?? null;
    $missionFields['deleted'] = $missionData["deleted"] ?? null;

    $errorMsg = $mission->processForm($missionFields);
		
    // Get the mission ID
    $missionID = $mission->id;

    // Collect and Submit SITREP Information
    if(!empty($missionData['sitrep'])) {
        foreach($missionData['sitrep'] as $item) {
            $sitrep = new MissionSitrep;
            $sitrepFields['mission_id'] = $missionID;
            $sitrepFields['sitrep_id'] = $item;
            $errorMsg .= $sitrep->processForm($sitrepFields);
        }
    }

    // Collect and Submit Soldier Information
    for( $i = 0; $i < sizeof($missionData['soldier_id']); $i++ ) {
        $missionSoldier = new MissionSoldier();

        $soldierFields['mission_id'] = $missionID;
        $soldierFields['soldier_id'] = $missionData['soldier_id'][$i];
        $soldierFields['rank_id'] = $missionData['rank_id'][$i];
        $soldierFields['class_id'] = $missionData['class_id'][$i];
        $soldierFields['shots_hit'] = $missionData['shots_hit'][$i];
        $soldierFields['shots_taken'] = $missionData['shots_taken'][$i];
        $soldierFields['overwatch_hit'] = $missionData['overwatch_hit'][$i];
        $soldierFields['overwatch_taken'] = $missionData['overwatch_taken'][$i];
        $soldierFields['other_hit'] = $missionData['other_hit'][$i];
        $soldierFields['other_taken'] = $missionData['other_taken'][$i];
        $soldierFields['damage'] = $missionData['damage'][$i];
        $soldierFields['healing'] = $missionData['healing'][$i];
        $soldierFields['killed_aliens'] = $missionData['killed_aliens'][$i];
        $soldierFields['killed_lost'] = $missionData['killed_lost'][$i];
        $soldierFields['mvp'] = $missionData['mvp'][$i];
        $soldierFields['status'] = $missionData['status'][$i];
        $soldierFields['extra'] = $missionData['extra'][$i];
        if(is_array($missionData['extra_info'])) {
            $soldierFields['extra_info'] = $missionData['extra_info'][$i];
        } else {
            $soldierFields['extra_info'] = null;
        }
        $soldierFields['promoted'] = $missionData['promoted'][$i];
        if(isset($missionData['MSid'][$i])) {
            $soldierFields['id'] = $missionData['MSid'][$i];
        }

        $errorMsg .= $missionSoldier->processForm($soldierFields);
    }

    // Collect and Submit Alien Information
    // If Mission Status is not Infiltrating, collect Alien Data
    if(MissionStatus::getStatusByID($mission->status) != "Infiltrating") {
        for( $i = 0; $i < sizeof($missionData['alien_id']); $i++ ) {
            $missionAlien = new MissionAlien();

            $alienFields['mission_id'] = $missionID;
            $alienFields['alien_id'] = $missionData['alien_id'][$i];
            $alienFields['encountered'] = $missionData['encountered'][$i];
            $alienFields['killed'] = $missionData['killed'][$i];
            if(isset($missionData['MAid'])) {
                $alienFields['id'] = $missionData['MAid'][$i];
            }

            $errorMsg .= $missionAlien->processForm($alienFields);
        }
    }

    if($errorMsg != "") {
		header('Location: /mission/mission-list.php');
	}
}
else {
?>

    <!DOCTYPE html>
    <html lang="en">
    <?php include_once __DIR__.'/../php/header-include.php' ?>
    <body>
    <?php include_once __DIR__.'/../php/page-head.php' ?>
    <div id="main" class="controls input-group">
        <h2 class="list-header">Add/Edit Mission</h2>
        <?php
        if($errorMsg != "") {
            ?>
            <p class="text-danger"><strong><?php echo $errorMsg; ?></strong></p>
            <?php
        }
        ?>
        <form action="mission.php" method="post" id="mission-form" enctype="multipart/form-data" class="was-validated" novalidate>
            <div class="g-3 row">
                <?php Mission::getMissionForm($mission); ?>
            </div>

            <h2>Rewards</h2>
            <div class="mission-info row repeat-parent">
                <div class="reward-field field-repeat entry col-md-3 pb-2 input-group-append">
                    <div class="row gx-2">
                        <?php Mission::getMissionRewards('', true); ?>
                    </div>
                </div>
            </div>

            <h2>Soldiers</h2>
            <div class="repeat-parent col-12">
                <div class="field-repeat mission-info row gx-0 gy-3">
                    <?php
                    $blankSoldier = new MissionSoldier;
                    MissionSoldier::getMissionSoldierForm($blankSoldier, true, true);
                    ?>
                </div>
            </div>

            <h2>Aliens</h2>
            <div class="repeat-parent col-12">
                <div class="field-repeat mission-info row gx-0 gy-3">
                    <?php
                    $blankAlien = new MissionAlien;
                    MissionAlien::getMissionAlienForm($blankAlien, true, true);
                    ?>
                </div>
            </div>

            <h2>Mission Picture</h2>
            <div class="g-3 row">
                <?php Mission::getMissionPicture(null); ?>
            </div>

					
            <input type="submit" value="Submit" class="submit"> <input type="reset">
        </form>
    </div>
    <?php include_once __DIR__.'/../php/scripts-include.php' ?>
	</body>
</html>

<?php		
	}	
?>