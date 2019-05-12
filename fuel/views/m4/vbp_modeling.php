<!DOCTYPE html>

<html lang='en'>

<?php

//View for VBP modeling. Controls what the page looks like
echo Form::open(array('action' => 'index.php/m4/vbp_modeling_calculate', 'method' => 'post')); 
    

echo Form::open(array('action' => 'index.php/m4/vbp_modeling', 'method' => 'post')); 
    ?>
<h2>Choose Hospital</h2>
<?php
$prov_nums_array = array();
$prov_nums = \DB::select('provider_number')->from('test_safety')->execute();
$prov_nums_array = $prov_nums->as_array();
?>
<select name="formPN">
	<?php
	foreach ($prov_nums_array as $pn){
		foreach($pn as $data){
			echo "<option value='$data'>$data</option>" ;
		} 
	}
	?>
</select>	
	
    <?php 
    /*
    if(isset($_POST['formSumbit'])){
		$provNum = $_POST['formPN'];
		echo $provNum;
	}
	
	echo Form::input('pNum');
	*/
	echo Form::input('pNum', $provider_number[0], array('class' => 'form-control'));
	echo Form::button('provNum', 'Type in a number from dropdown', array('class' => 'btn btn-default'));
	echo '<br><br>';
    echo $hospital_name[0];
    echo Form::close();
    ?>
    <div class="rank" style="width: 50px; height: 50px;">
    	<?php 
    	if ($tps[0] >= 80 || $provider_number[0] == '060010' || $provider_number[0] == '060014'){
    		echo Asset::img('Picture1.png',  array('class' => 'cardPhoto')); 
    	}
    	
    	echo Form::open(array('action' => 'index.php/m4/vbp_modeling_calculate', 'method' => 'post')); 
    
    	?>
    </div>
    
    <br>

<h2>Reimbursement</h2>
                    <table border="1">
                        <tr>
                            <td id="category">Reimbursement</td>
                            <td><?php echo Form::input('b_reim', $reimbursement[0], array('class' => 'form-control'));?></td>
                        </tr>
                        <tr>
                            <td id="category">2% Penalty</td>
                            <td><?php echo $reimbursement[1];?></td>
                        </tr>
                        <tr>
                            <td id="category">TPS</td>
                            <td><?php echo $tps[0];?></td>
                        </tr>
                        <tr>
                            <td id="category">Total Reimbursement</td>
                            <td><?php echo $reimbursement[2];?></td>
                        </tr>
                    </table>

<div id="Hospital_Scores">
                <h2>Total Performance Scores</h2>
                    <table border="1">
                        <tr>
                            <td id="category">Unweighted Normalized Clinical Care Domain Score</td>
                            <td><?php echo $cc_tps[1];?></td>
                        </tr>
                        <tr>
                            <td id="category">Weighted Normalized Clinical Care Domain Score</td>
                            <td><?php echo $cc_tps[2];?></td>
                        </tr>
                        <tr>
                            <td id="category">Unweighted Patient and Caregiver Centered Experience of Care/Care Coordination Domain Score</td>
                            <td><?php echo $hcahps_tps[1];?></td>
                        </tr>
                        <tr>
                            <td id="category">Weighted Patient and Caregiver Centered Experience of Care/Care Coordination Domain Score</td>
                            <td><?php echo $hcahps_tps[2];?></td>
                        </tr>
                        <tr>
                            <td id="category">Unweighted Normalized Safety Domain Score</td>
                            <td><?php echo $safety_tps[1];?></td>
                        </tr>
                        <tr>
                            <td id="category">Weighted Safety Domain Score</td>
                            <td><?php echo $safety_tps[2];?></td>
                        </tr>
                        <tr>
                            <td id="category">Unweighted Normalized Efficiency and Cost Reduction Domain Score</td>
                            <td><?php echo $efficiency_tps[1];?></td>
                        </tr>
                        <tr>
                            <td id="category">Weighted Efficiency and Cost Reduction Domain Score</td>
                            <td><?php echo $efficiency_tps[2];?></td>
                        </tr>
                        <tr>
                            <td id="category">Total Performance Score</td>
                            <td><?php echo $tps[0];?></td>
                        </tr>
                    </table>
            </div>

<h3>Clinical Care</h3>
                        <table border="1">
                        <tr>
                            <td id="measure"></td>
                            <td id="measure">Achievement Threshold</td>
                            <td id="measure">Benchmark</td>
                            <td id="measure">Baseline Rate</td>
                            <td id="measure">Performance Rate</td>
                            <td id="measure">Achievement Points</td>
                            <td id="measure">Improvement Points</td>
                            <td id="measure">Dimension Score</td>
                        </tr>
                        <tr>
                            <td id="category">MORT-30-AMI</td>
                            <td><?php echo $mortAMI[0];?></td>
                            <td><?php echo $mortAMI[1];?></td>
                            <td><?php echo Form::input('b_mortAMI', $mortAMI[2], array('class' => 'form-control'));?></td>
                            <td><?php echo Form::input('p_mortAMI', $mortAMI[3], array('class' => 'form-control'));?></td>
                            <td><?php echo $mortAMI[4];?> out of 10</td>
                            <td><?php echo $mortAMI[5];?> out of 9</td>
                            <td><?php echo $mortAMI[6];?> out of 10</td>
                        </tr>
                        <tr>
                            <td id="category">MORT-30-HF</td>
                            <td><?php echo $mortHF[0];?></td>
                            <td><?php echo $mortHF[1];?></td>
                            <td><?php echo Form::input('b_mortHF', $mortHF[2], array('class' => 'form-control'));?></td>
                            <td><?php echo Form::input('p_mortHF', $mortHF[3], array('class' => 'form-control'));?></td>
                            <td><?php echo $mortHF[4];?> out of 10</td>
                            <td><?php echo $mortHF[5];?> out of 9</td>
                            <td><?php echo $mortHF[6];?> out of 10</td>
                        </tr>
                        <tr>
                            <td id="category">MORT-30-PN</td>
                            <td><?php echo $mortPN[0];?></td>
                            <td><?php echo $mortPN[1];?></td>
                            <td><?php echo Form::input('b_mortPN', $mortPN[2], array('class' => 'form-control'));?></td>
                            <td><?php echo Form::input('p_mortPN', $mortPN[3], array('class' => 'form-control'));?></td>
                            <td><?php echo $mortPN[4];?> out of 10</td>
                            <td><?php echo $mortPN[5];?> out of 9</td>
                            <td><?php echo $mortPN[6];?> out of 10</td>
                        </tr>
                        </table>

<div id="HCAHPS" >
                <h3>HCAHPS</h3>
                    <table border="1">
                        <tr>
                            <td id="measure"></td>
                            <td id="measure">Floor</td>
                            <td id="measure">Achievement Threshold</td>
                            <td id="measure">Benchmark</td>
                            <td id="measure">Baseline Rate</td>
                            <td id="measure">Performance Rate</td>
                            <td id="measure">/~/~/~/~Achievement Points</td>
                            <td id="measure">Improvement Points</td>
                            <td id="measure">Dimension Score</td>
                            
                        </tr>
                    
                        <tr>
                            <td id="category">Communication with Nurses</td>
                            <td><?php echo $hcahps_floor_data[0];?></td>
                            <td><?php echo $nurses[0];?></td>
                            <td><?php echo $nurses[1];?></td>
                            <td><?php echo Form::input('b_nurses', $nurses[2], array('class' => 'form-control'));?></td>
                            <td><?php echo Form::input('p_nurses', $nurses[3], array('class' => 'form-control'));?></td>
                            <td><?php echo $nurses[4];?> out of 10</td>
                            <td><?php echo $nurses[5];?> out of 9</td>
                            <td><?php echo $nurses[6];?> out of 10</td>
                        </tr>
                        <tr>
                            <td id="category">Communication with Doctors</td>
                            <td><?php echo $hcahps_floor_data[1];?></td>
                            <td><?php echo $doctors[0];?></td>
                            <td><?php echo $doctors[1];?></td>
                            <td><?php echo Form::input('b_doctors', $doctors[2], array('class' => 'form-control'));?></td>
                            <td><?php echo Form::input('p_doctors', $doctors[3], array('class' => 'form-control'));?></td>
                            <td><?php echo $doctors[4];?> out of 10</td>
                            <td><?php echo $doctors[5];?> out of 9</td>
                            <td><?php echo $doctors[6];?> out of 10</td>
                        </tr>
                        <tr>
                            <td id="category">Responsiveness of Hospital Staff</td>
                            <td><?php echo $hcahps_floor_data[2];?></td>
                            <td><?php echo $staff[0];?></td>
                            <td><?php echo $staff[1];?></td>
                            <td><?php echo Form::input('b_staff', $staff[2], array('class' => 'form-control'));?></td>
                            <td><?php echo Form::input('p_staff', $staff[3], array('class' => 'form-control'));?></td>
                            <td><?php echo $staff[4];?> out of 10</td>
                            <td><?php echo $staff[5];?> out of 9</td>
                            <td><?php echo $staff[6];?> out of 10</td>
                        </tr>
                        <tr>
                            <td id="category">Care Transition</td>
                            <td><?php echo $hcahps_floor_data[3];?></td>
                            <td><?php echo $care[0];?></td>
                            <td><?php echo $care[1];?></td>
                            <td><?php echo Form::input('b_care', $care[2], array('class' => 'form-control'));?></td>
                            <td><?php echo Form::input('p_care', $care[3], array('class' => 'form-control'));?></td>
                            <td><?php echo $care[4];?> out of 10</td>
                            <td><?php echo $care[5];?> out of 9</td>
                            <td><?php echo $care[6];?> out of 10</td>
                        </tr>   
                        <tr>
                            <td id="category">Communication about Medicines</td>
                            <td><?php echo $hcahps_floor_data[4];?></td>
                            <td><?php echo $medicine[0];?></td>
                            <td><?php echo $medicine[1];?></td>
                            <td><?php echo Form::input('b_medicine', $medicine[2], array('class' => 'form-control'));?></td>
                            <td><?php echo Form::input('p_medicine', $medicine[3], array('class' => 'form-control'));?></td>
                            <td><?php echo $medicine[4];?> out of 10</td>
                            <td><?php echo $medicine[5];?> out of 9</td>
                            <td><?php echo $medicine[6];?> out of 10</td>
                        </tr>
                        <tr>
                            <td id="category">Cleanliness and Quietness of Hospital Environment</td>
                            <td><?php echo $hcahps_floor_data[5];?></td>
                            <td><?php echo $cleanliness[0];?></td>
                            <td><?php echo $cleanliness[1];?></td>
                            <td><?php echo Form::input('b_cleanliness', $cleanliness[2], array('class' => 'form-control'));?></td>
                            <td><?php echo Form::input('p_cleanliness', $cleanliness[3], array('class' => 'form-control'));?></td>
                            <td><?php echo $cleanliness[4];?> out of 10</td>
                            <td><?php echo $cleanliness[5];?> out of 9</td>
                            <td><?php echo $cleanliness[6];?> out of 10</td>
                        </tr>
                        <tr>
                            <td id="category">Discharge Information</td>
                            <td><?php echo $hcahps_floor_data[6];?></td>
                            <td><?php echo $discharge[0];?></td>
                            <td><?php echo $discharge[1];?></td>
                            <td><?php echo Form::input('b_discharge', $discharge[2], array('class' => 'form-control'));?></td>
                            <td><?php echo Form::input('p_discharge', $discharge[3], array('class' => 'form-control'));?></td>
                            <td><?php echo $discharge[4];?> out of 10</td>
                            <td><?php echo $discharge[5];?> out of 9</td>
                            <td><?php echo $discharge[6];?> out of 10</td>
                        </tr>
                        <tr>
                            <td id="category">Overall Rating of Hospital</td>
                            <td><?php echo $hcahps_floor_data[7];?></td>
                            <td><?php echo $overall[0];?></td>
                            <td><?php echo $overall[1];?></td>
                            <td><?php echo Form::input('b_overall', $overall[2], array('class' => 'form-control'));?></td>
                            <td><?php echo Form::input('p_overall', $overall[3], array('class' => 'form-control'));?></td>
                            <td><?php echo $overall[4];?> out of 10</td>
                            <td><?php echo $overall[5];?> out of 9</td>
                            <td><?php echo $overall[6];?> out of 10</td>
                        </tr>
                        </table>
                        <br>
                        <table border="1">
                        <tr>
                            <td id="category">HCAHPS Base Score</td>
                            <td><?php echo $hcahps_tps[0];?></td>
                        </tr>
                        <tr>
                            <td id="category">HCAHPS Consistency Score</td>
                            <td><?php echo $hcahps_consistency[0];?></td>
                        </tr>
                    </table>

<h2>Safety</h2>

<table border="1">
                        <tr>
                            <td id="measure"></td>
                            <td id="measure">Achievement Threshold</td>
                            <td id="measure">Benchmark</td>
                            <td id="measure">Baseline Rate</td>
                            <td id="measure">Performance Rate</td>
                            <td id="measure">Achievement Points</td>
                            <td id="measure">Improvement Points</td>
                            <td id="measure">Dimension Score</td>
                            
                        </tr>
                    
                        <tr>
                            <td id="category">PSI-90</td>
                            <td><?php echo $psi90[0];?></td>
                            <td><?php echo $psi90[1];?></td>
                            <td><?php echo Form::input('b_psi90', $psi90[2], array('class' => 'form-control'));?></td>
                            <td><?php echo Form::input('p_psi90', $psi90[3], array('class' => 'form-control'));?></td>
                            <td><?php echo $psi90[4];?> out of 10</td>
                            <td><?php echo $psi90[5];?> out of 9</td>
                            <td><?php echo $psi90[6];?> out of 10</td>
                        </tr>
                        <tr>
                            <td id="category">HAI-1</td>
                            <td><?php echo $ha1[0];?></td>
                            <td><?php echo $ha1[1];?></td>
                            <td><?php echo Form::input('b_ha1', $ha1[2], array('class' => 'form-control'));?></td>
                            <td><?php echo Form::input('p_ha1', $ha1[3], array('class' => 'form-control'));?></td>
                            <td><?php echo $ha1[4];?> out of 10</td>
                            <td><?php echo $ha1[5];?> out of 9</td>
                            <td><?php echo $ha1[6];?> out of 10</td>
                        </tr>
                        <tr>
                            <td id="category">HAI-2</td>
                            <td><?php echo $ha2[0];?></td>
                            <td><?php echo $ha2[1];?></td>
                            <td><?php echo Form::input('b_ha2', $ha2[2], array('class' => 'form-control'));?></td>
                            <td><?php echo Form::input('p_ha2', $ha2[3], array('class' => 'form-control'));?></td>
                            <td><?php echo $ha2[4];?> out of 10</td>
                            <td><?php echo $ha2[5];?> out of 9</td>
                            <td><?php echo $ha2[6];?> out of 10</td>
                        </tr>
                        <tr>
                            <td id="category">HAI-3</td>
                            <td><?php echo $ha3[0];?></td>
                            <td><?php echo $ha3[1];?></td>
                            <td><?php echo Form::input('b_ha3', $ha3[2], array('class' => 'form-control'));?></td>
                            <td><?php echo Form::input('p_ha3', $ha3[3], array('class' => 'form-control'));?></td>
                            <td><?php echo $ha3[4];?> out of 10</td>
                            <td><?php echo $ha3[5];?> out of 9</td>
                            <td><?php echo $ha3[6];?> out of 10</td>
                        </tr>
                        <tr>
                            <td id="category">HAI-4</td>
                            <td><?php echo $ha4[0];?></td>
                            <td><?php echo $ha4[1];?></td>
                            <td><?php echo Form::input('b_ha4', $ha4[2], array('class' => 'form-control'));?></td>
                            <td><?php echo Form::input('p_ha4', $ha4[3], array('class' => 'form-control'));?></td>
                            <td><?php echo $ha4[4];?> out of 10</td>
                            <td><?php echo $ha4[5];?> out of 9</td>
                            <td><?php echo $ha4[6];?> out of 10</td>
                        </tr>
                        <tr>
                            <td id="category">HAI-5</td>
                            <td><?php echo $ha5[0];?></td>
                            <td><?php echo $ha5[1];?></td>
                            <td><?php echo Form::input('b_ha5', $ha5[2], array('class' => 'form-control'));?></td>
                            <td><?php echo Form::input('p_ha5', $ha5[3], array('class' => 'form-control'));?></td>
                            <td><?php echo $ha5[4];?> out of 10</td>
                            <td><?php echo $ha5[5];?> out of 9</td>
                            <td><?php echo $ha5[6];?> out of 10</td>
                        </tr>
                        <tr>
                            <td id="category">HAI-6</td>
                            <td><?php echo $ha6[0];?></td>
                            <td><?php echo $ha6[1];?></td>
                            <td><?php echo Form::input('b_ha6', $ha6[2], array('class' => 'form-control'));?></td>
                            <td><?php echo Form::input('p_ha6', $ha6[3], array('class' => 'form-control'));?></td>
                            <td><?php echo $ha6[4];?> out of 10</td>
                            <td><?php echo $ha6[5];?> out of 9</td>
                            <td><?php echo $ha6[6];?> out of 10</td>
                        </tr>
                        <tr>
                            <td id="category">PC-01</td>
                            <td><?php echo $pc01[0];?></td>
                            <td><?php echo $pc01[1];?></td>
                            <td><?php echo Form::input('b_pc01', $pc01[2], array('class' => 'form-control'));?></td>
                            <td><?php echo Form::input('p_pc01', $pc01[3], array('class' => 'form-control'));?></td>
                            <td><?php echo $pc01[4];?> out of 10</td>
                            <td><?php echo $pc01[5];?> out of 9</td>
                            <td><?php echo $pc01[6];?> out of 10</td>
                        </tr>
                        </table>
                        <br>
                        <table border="1">
                        <tr>
                            <td id="category">Combined SSI Score</td>
                            <td><?php echo $combined_ssi[0];?></td>
                        </tr>
                    </table>
    
    <h3>Efficiency</h3>
                        <table border="1">
                        <tr>
                            <td id="measure"></td>
                            <td id="measure">Achievement Threshold</td>
                            <td id="measure">Benchmark</td>
                            <td id="measure">Baseline Rate</td>
                            <td id="measure">Performance Rate</td>
                            <td id="measure">Achievement Points</td>
                            <td id="measure">Improvement Points</td>
                            <td id="measure">Dimension Score</td>
                        </tr>
                        <tr>
                            <td id="category">MSPB-1</td>
                            <td><?php echo $MSPB[0];?></td>
                            <td><?php echo $MSPB[1];?></td>
                            <td><?php echo Form::input('b_MSPB', $MSPB[2], array('class' => 'form-control'));?></td>
                            <td><?php echo Form::input('p_MSPB', $MSPB[3], array('class' => 'form-control'));?></td>
                            <td><?php echo $MSPB[4];?> out of 10</td>
                            <td><?php echo $MSPB[5];?> out of 9</td>
                            <td><?php echo $MSPB[6];?> out of 10</td>
                        </tr>		
</table>

 <?php
 
	echo '<br><br>';
	echo Form::button('frmbutton', 'Calculate VBP', array('class' => 'btn btn-default'));
	echo '<br><br>';
	
	
	
	?>


<h2>Comments</h2>
                    <table border="1">
                        <tr>
                            <td id="category">Comments</td>
                        </tr>
                        
                        <?php 
                        
                        // You can only add a comment if you are logged in
                        if (Auth::check()) {
                        	echo "<tr><td>";
                        	
                        	// TODO - Have the ability to add comments. This should be seperate from the action_vbp_modeling_calculate action
	                     	echo Form::textarea('com', /*$comments[0][2]['comment']*/"Insert new comment here", array('class' => 'form-control'));
	                     	
	                     	echo "</td></tr>";
                        }
                        /*
                        if (!empty($comments[0])){
                        for ($i = 0; $i < count($comments[0]); $i++) {
                        	echo "<tr>";
                        	
                        	$parent_id = $comments[0][$i]['parent_id'];		// used for checking if comment is a reply of not, not printed
                        	$author_username = $comments[0][$i]['author_username'];                      	
                        	$curr_comment = $comments[0][$i]['comment'];
                        	$create_time = $comments[0][$i]['create_time'];
                        	$edit_time = $comments[0][$i]['edit_time'];
                        	$comment_ranking = $comments[0][$i]['ranking'];
                        	$deleted = $comments[0][$i]['deleted'];
                        	
                        	// Checks if it is a top level comment. Different ID's can be used for styling
                        	if($parent_id == 0) {
                        		echo "<td id='comment_top'>";
                        	} else {
                        		echo "<td id='comment_reply'>";
                        		echo "<br> -- reply -- ";
                        	}                    	
									
									// Displays comment content, could use some styling
                       		echo "<h4>user: $author_username<i></i>, first posted: $create_time<i></i>, last edited: $edit_time <br></h4>";
									if($deleted) {
										echo "-- This comment has been deleted --";
									} else {
                        		echo "<p>$curr_comment <p/><br>";
                        		echo "$comment_ranking people found this helpful<br>";
                        	}
                        	
                        	// TODO - Buttons should go here:
                        	
                        	// If logged in, have the ability to upvote a comment if you have not upvoted before:
                        	// Check the comment_upvotes_data database to see if this user (by username) has upvoted this comment
                        	// if they have not like this comment, display the upvote button
                        	
                        	// Check if you are the owner of the post. If you are, have the ability to edit (probs difficult) or delete (probs easy) the post                     	
                        	// if deleted, deleted is set to TRUE in the database, and the ranking is set to some negative value                    	
                        	

									echo "</td>";   
									                      	
                        	echo "</tr>";
                        }   
                        }   */                  
  
                        ?>
                    </table>
                  
<?php
    if (Auth::check())
		{?>	
                    
<h2>Save this Set</h2>
                    <table border="1">
                        <tr>
                            <td id="category">Set Name</td>
                            <td><?php echo Form::input('fs', "", array('class' => 'form-control'));?></td>
                        </tr>
                    </table>
    
    
               
    
    
    
    <?php
    //echo Form::open(array('action' => 'index.php/m4/vbp_modeling_calculate', 'method' => 'post'));
    echo '<br>';
	echo Form::button('frmbutton', 'Save File', array('class' => 'btn btn-default'));
	echo '<br><br>';
	?>
	
	
	<h2>Load Private Data Set</h2>
	
	<?php
	
	/*$csvs = File::read_dir(DOCROOT, 1, array(
                '\.csv$' => 'file', // or css files
        ));*/
        $db_files = \DB::select('filename')->from('test_user_saved_data')->execute();
        $files = array();
        $files = $db_files->as_array();
        $actual_files = array();
        foreach ($files as $fn){
			foreach($fn as $filename){
				array_push($actual_files, $filename) ;
			} 
		}
    
    
	echo Form::select('files', 'none', $actual_files);
	//$load_name = Form::select('files', 'none', $actual_files);
	echo Form::input('load_name', "", array('class' => 'form-control'));
	echo Form::button('load_name', 'Load File', array('class' => 'btn btn-default'));
	
	echo '<br><br>';
	echo Form::close();
    
    
	
}
echo Form::close();

