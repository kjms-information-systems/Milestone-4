<?php
namespace Model;
class Vbp extends \Model {
	public static function get_data($filename, $username) {
        	$provider_number = $filename;
		//change $filename parameter to the provider_number
		$safety = \DB::select('*')->from('test_safety')->where('provider_number', '=', $provider_number)->execute();
		$tps = \DB::select('*')->from('test_TPS')->where('provider_number', '=', $provider_number)->execute();
		$clinical_care = \DB::select('*')->from('test_clinical_care')->where('provider_number', '=', $provider_number)->execute();
		$reimbursement = \DB::select('*')->from('test_medical_provider_charge')->where('provider_number', '=', $provider_number)->execute();
		$hcahps = \DB::select('*')->from('test_HCAHPS')->where('provider_number', '=', $provider_number)->execute();
		$efficiency = \DB::select('*')->from('test_efficiency')->where('provider_number', '=', $provider_number)->execute();
		
		//Fix with current user
		//$user = \DB::select('*')->from('users')->where('provider_number', '=', $provider_number)->execute();
		
		$safety_array = array();
		$safety_array = $safety->as_array();
		
		$tps_array = array();
		$tps_array = $tps->as_array();
		
		$clinical_care_array = array();
		$clinical_care_array = $clinical_care->as_array();
		
		$reimbursement_array = array();
		$reimbursement_array = $reimbursement->as_array();
		
		$hcahps_array = array();
		$hcahps_array = $hcahps->as_array();
		
		$efficiency_array = array();
		$efficiency_array = $efficiency->as_array();
		
		//$user_array = array();
		//$user_array = $user->as_array();
		
		$csv = array();
		
		//SAFETY
		$csv['psi90'] = [$safety_array[0]['psi_90_achievement_threshold'], $safety_array[0]['psi_90_benchmark'],$safety_array[0]['psi_90_baseline_rate'],$safety_array[0]['psi_90_performance_rate'],$safety_array[0]['psi_90_achievement_points'],$safety_array[0]['psi_90_improvement_points'],$safety_array[0]['psi_90_measure_score']] ;
		
		
		$csv['ha1'] = [$safety_array[0]['hai_1_achievement_threshold'], $safety_array[0]['hai_1_benchmark'],$safety_array[0]['hai_1_baseline_rate'],$safety_array[0]['hai_1_performance_rate'],$safety_array[0]['hai_1_achievement_points'],$safety_array[0]['hai_1_improvement_points'],$safety_array[0]['hai_1_measure_score']] ;
		$csv['ha2'] = [$safety_array[0]['hai_2_achievement_threshold'], $safety_array[0]['hai_2_benchmark'],$safety_array[0]['hai_2_baseline_rate'],$safety_array[0]['hai_2_performance_rate'],$safety_array[0]['hai_2_achievement_points'],$safety_array[0]['hai_2_improvement_points'],$safety_array[0]['hai_2_measure_score']] ;
		
		$csv['ha3'] = [$safety_array[0]['hai_3_achievement_threshold'], $safety_array[0]['hai_3_benchmark'],$safety_array[0]['hai_3_baseline_rate'],$safety_array[0]['hai_3_performance_rate'],$safety_array[0]['hai_3_achievement_points'],$safety_array[0]['hai_3_improvement_points'],$safety_array[0]['hai_3_measure_score']] ;
		
		$csv['ha4'] = [$safety_array[0]['hai_4_achievement_threshold'], $safety_array[0]['hai_4_benchmark'],$safety_array[0]['hai_4_baseline_rate'],$safety_array[0]['hai_4_performance_rate'],$safety_array[0]['hai_4_achievement_points'],$safety_array[0]['hai_4_improvement_points'],$safety_array[0]['hai_4_measure_score']] ;
		
		$csv['ha5'] = [$safety_array[0]['hai_5_achievement_threshold'], $safety_array[0]['hai_5_benchmark'],$safety_array[0]['hai_5_baseline_rate'],$safety_array[0]['hai_5_performance_rate'],$safety_array[0]['hai_5_achievement_points'],$safety_array[0]['hai_5_improvement_points'],$safety_array[0]['hai_5_measure_score']] ;
		
		$csv['ha6'] = [$safety_array[0]['hai_6_achievement_threshold'], $safety_array[0]['hai_6_benchmark'],$safety_array[0]['hai_6_baseline_rate'],$safety_array[0]['hai_6_performance_rate'],$safety_array[0]['hai_6_achievement_points'],$safety_array[0]['hai_6_improvement_points'],$safety_array[0]['hai_6_measure_score']] ;
		
		$csv['pc01'] = [$safety_array[0]['pc_01_achievement_threshold'], $safety_array[0]['pc_01_benchmark'],$safety_array[0]['pc_01_baseline_rate'],$safety_array[0]['pc_01_performance_rate'],$safety_array[0]['pc_01_achievement_points'],$safety_array[0]['pc_01_improvement_points'],$safety_array[0]['pc_01_measure_score']] ;
		
		$csv['combined_ssi'] = [$safety_array[0]['combined_ssi_measure_score']];
		
		$csv['safety_tps'] = [$tps_array[0]['unweighted_safety'], $tps_array[0]['unweighted_safety'], $tps_array[0]['weighted_safety']];
		
		//CLINICAL CARE
		$csv['mortAMI'] = [$clinical_care_array[0]['mort_30_ami_achievement_threshold'], $clinical_care_array[0]['mort_30_ami_benchmark'],$clinical_care_array[0]['mort_30_ami_baseline_rate'],$clinical_care_array[0]['mort_30_ami_performance_rate'],$clinical_care_array[0]['mort_30_ami_achievement_points'],$clinical_care_array[0]['mort_30_ami_improvement_points'],$clinical_care_array[0]['mort_30_ami_measure_score']] ;
		
		$csv['mortHF'] = [$clinical_care_array[0]['mort_30_hf_achievement_threshold'], $clinical_care_array[0]['mort_30_hf_benchmark'],$clinical_care_array[0]['mort_30_hf_baseline_rate'],$clinical_care_array[0]['mort_30_hf_performance_rate'],$clinical_care_array[0]['mort_30_hf_achievement_points'],$clinical_care_array[0]['mort_30_hf_improvement_points'],$clinical_care_array[0]['mort_30_hf_measure_score']] ;
		
		$csv['mortPN'] = [$clinical_care_array[0]['mort_30_pn_achievement_threshold'], $clinical_care_array[0]['mort_30_pn_benchmark'],$clinical_care_array[0]['mort_30_pn_baseline_rate'],$clinical_care_array[0]['mort_30_pn_performance_rate'],$clinical_care_array[0]['mort_30_pn_achievement_points'],$clinical_care_array[0]['mort_30_pn_improvement_points'],$clinical_care_array[0]['mort_30_pn_measure_score']] ;
		
		$csv['cc_tps'] = [$tps_array[0]['unweighted_clinical_care'], $tps_array[0]['unweighted_clinical_care'], $tps_array[0]['weighted_clinical_care']];
		
		$csv['hospital_name'] = [$tps_array[0]['hospital_name']];
		$csv['provider_number'] = [$provider_number]; 
		
		$csv['MSPB'] = [$efficiency_array[0]['mspb_1_achievement_threshold'], $efficiency_array[0]['mspb_1_benchmark'],$efficiency_array[0]['mspb_1_baseline_rate'],$efficiency_array[0]['mspb_1_performance_rate'],$efficiency_array[0]['mspb_1_achievement_points'],$efficiency_array[0]['mspb_1_improvement_points'],$efficiency_array[0]['mspb_1_measure_score']];
		
		$csv['efficiency_tps'] = $csv['efficiency_tps'] = [$tps_array[0]['unweighted_efficiency'], $tps_array[0]['unweighted_efficiency'], $tps_array[0]['weighted_efficiency']];
		
		$csv['nurses'] = [$hcahps_array[0]['communication_nurses_achievement_threshold'], $hcahps_array[0]['communication_nurses_benchmark'],$hcahps_array[0]['communication_nurses_baseline'],$hcahps_array[0]['communication_nurses_performace'],$hcahps_array[0]['communication_nurses_achievement_points'],$hcahps_array[0]['communication_nurses_improvement_points'],$hcahps_array[0]['communication_nurses_dimension_score']];
		
		$csv['doctors'] = [$hcahps_array[0]['communication_doctors_achievement_threshold'], $hcahps_array[0]['communication_doctors_benchmark'],$hcahps_array[0]['communication_doctors_baseline'],$hcahps_array[0]['communication_doctors_performace'],$hcahps_array[0]['communication_doctors_achievement_points'],$hcahps_array[0]['communication_doctors_improvement_points'],$hcahps_array[0]['communication_doctors_dimension_score']];
		
		$csv['staff'] = [$hcahps_array[0]['responsiveness_achievement_threshold'], $hcahps_array[0]['responsiveness_benchmark'],$hcahps_array[0]['responsiveness_baseline'],$hcahps_array[0]['responsiveness_performace'],$hcahps_array[0]['responsiveness_achievement_points'],$hcahps_array[0]['responsiveness_improvement_points'],$hcahps_array[0]['responsiveness_dimension_score']];
		
		$csv['care'] = [$hcahps_array[0]['care_transition_achievement_threshold'], $hcahps_array[0]['care_transition_benchmark'],$hcahps_array[0]['care_transition_baseline'],$hcahps_array[0]['care_transition_performace'],$hcahps_array[0]['care_transition_achievement_points'],$hcahps_array[0]['care_transition_improvement_points'],$hcahps_array[0]['care_transition_dimension_score']];
		
		$csv['medicine'] = [$hcahps_array[0]['communication_medicine_achievement_threshold'], $hcahps_array[0]['communication_medicine_benchmark'],$hcahps_array[0]['communication_medicine_baseline'],$hcahps_array[0]['communication_medicine_performace'],$hcahps_array[0]['communication_medicine_achievement_points'],$hcahps_array[0]['communication_medicine_improvement_points'],$hcahps_array[0]['communication_medicine_dimension_score']];
		
		$csv['cleanliness'] = [$hcahps_array[0]['cleanliness_achievement_threshold'], $hcahps_array[0]['cleanliness_benchmark'],$hcahps_array[0]['cleanliness_baseline'],$hcahps_array[0]['cleanliness_performace'],$hcahps_array[0]['cleanliness_achievement_points'],$hcahps_array[0]['cleanliness_improvement_points'],$hcahps_array[0]['cleanliness_dimension_score']];
		
		$csv['discharge'] = [$hcahps_array[0]['discharge_achievement_threshold'], $hcahps_array[0]['discharge_benchmark'],$hcahps_array[0]['discharge_baseline'],$hcahps_array[0]['discharge_performace'],$hcahps_array[0]['discharge_achievement_points'],$hcahps_array[0]['discharge_improvement_points'],$hcahps_array[0]['discharge_dimension_score']];
		
		$csv['overall'] = [$hcahps_array[0]['overall_achievement_threshold'], $hcahps_array[0]['overall_benchmark'],$hcahps_array[0]['overall_baseline'],$hcahps_array[0]['overall_performace'],$hcahps_array[0]['overall_achievement_points'],$hcahps_array[0]['overall_improvement_points'],$hcahps_array[0]['overall_dimension_score']];
		
		$csv['hcahps_tps'] = [$hcahps_array[0]['hcahps_base_score'], $tps_array[0]['unweighted_patient_caregiver_experience'], $tps_array[0]['weighted_patient_caregiver_experience']];
		
		$csv['tps'] = [$tps_array[0]['total_performance_score']];
		
		$csv['hcahps_consistency'] = [$hcahps_array[0]['hcahps_consistency_score']];
		
		$csv['hcahps_floor_data'] = [$hcahps[0]['communication_nurses_floor'], $hcahps[0]['communication_doctors_floor'], $hcahps[0]['responsiveness_floor'], $hcahps[0]['care_transition_floor'], $hcahps[0]['communication_medicine_floor'], $hcahps[0]['cleanliness_floor'], $hcahps[0]['discharge_floor'], $hcahps[0]['overall_floor']];
		
		$csv['username'] = [$username];
		
		//Calculate reimbursement
		$reim = 0;
		for ($i = 0; $i < sizeof($reimbursement_array); $i++){
			$temp = $reimbursement_array[$i]['average_medicare_payments'];
			$temp = str_replace("$", "", $temp);
			$temp = str_replace(",", "", $temp);
			$temp = doubleval($temp);
			$temp2 = $reimbursement_array[$i]['total_discharges'] * $temp;
			$reim = $reim + $temp2;
		}
		$penalty = $reim * 0.02;
		$money_back = ($tps['total_performance_score'] / 100) * $penalty;
		$total_reimbursement = $reim - $penalty + $money_back;
		
		$csv['reimbursement'] = [$reim, $penalty, $total_reimbursement];
		
		return $csv;
	}
	
	public static function put_data($filename, $data) {
            
		\DB::insert('test_user_saved_data')->set(array(
            'username' => $data['username'][0],
            'filename' => $filename,
            'provider_number' => $data['provider_number'][0],
            'hospital_name'=> $data['hospital_name'][0],
            'reimbursement' => $data['reimbursement'][0],
            'penalty' => $data['reimbursement'][1],
            'tps' => $data['tps'][0],
            'total_reimbursement' => $data['reimbursement'][2],
            'unweighted_clinical_care' => $data['cc_tps'][1],
            'weighted_clinical_care' => $data['cc_tps'][2],
            'unweighted_patient_caregiver_experience' => $data['hcahps_tps'][1],
            'weighted_patient_caregiver_experience' => $data['hcahps_tps'][2],
            'unweighted_safety' => $data['safety_tps'][1],
            'weighted_safety' => $data['safety_tps'][2],
            'unweighted_efficiency' => $data['efficiency_tps'][1],
            'weighted_efficiency' => $data['efficiency_tps'][2],
            'mort_30_ami_achievement_threshold' => $data['mortAMI'][0],
            'mort_30_ami_benchmark' => $data['mortAMI'][1],
            'mort_30_ami_baseline_rate' => $data['mortAMI'][2],
            'mort_30_ami_performance_rate' => $data['mortAMI'][3],
            'mort_30_ami_achievement_points' => $data['mortAMI'][4],
            'mort_30_ami_improvement_points' => $data['mortAMI'][5],
            'mort_30_ami_measure_score' => $data['mortAMI'][6],
            'mort_30_hf_achievement_threshold' => $data['mortHF'][0],
            'mort_30_hf_benchmark' => $data['mortHF'][1],
            'mort_30_hf_baseline_rate' => $data['mortHF'][2],
            'mort_30_hf_performance_rate' => $data['mortHF'][3],
            'mort_30_hf_achievement_points' => $data['mortHF'][4],
            'mort_30_hf_improvement_points' => $data['mortHF'][5],
            'mort_30_hf_measure_score' => $data['mortHF'][6],
            'mort_30_pn_achievement_threshold' => $data['mortPN'][0],
            'mort_30_pn_benchmark' => $data['mortPN'][1],
            'mort_30_pn_baseline_rate' => $data['mortPN'][2],
            'mort_30_pn_performance_rate' => $data['mortPN'][3],
            'mort_30_pn_achievement_points' => $data['mortPN'][4],
            'mort_30_pn_improvement_points' => $data['mortPN'][5],
            'mort_30_pn_measure_score' => $data['mortPN'][6],
            'communication_nurses_floor' => $data['hcahps_floor_data'][0],
            'communication_nurses_achievement_threshold' => $data['nurses'][0],
            'communication_nurses_benchmark' => $data['nurses'][1],
            'communication_nurses_baseline' => $data['nurses'][2],
            'communication_nurses_performace' => $data['nurses'][3],
            'communication_nurses_achievement_points' => $data['nurses'][4],
            'communication_nurses_improvement_points' => $data['nurses'][5],
            'communication_nurses_dimension_score' => $data['nurses'][6],
            'communication_doctors_floor' => $data['hcahps_floor_data'][1],
            'communication_doctors_achievement_threshold' => $data['doctors'][0],
            'communication_doctors_benchmark' => $data['doctors'][1],
            'communication_doctors_baseline' => $data['doctors'][2],
            'communication_doctors_performace' => $data['doctors'][3],
            'communication_doctors_achievement_points' => $data['doctors'][4],
            'communication_doctors_improvement_points' => $data['doctors'][5],
            'communication_doctors_dimension_score' => $data['doctors'][6],
            'responsiveness_floor' => $data['hcahps_floor_data'][2],
            'responsiveness_achievement_threshold' => $data['staff'][0],
            'responsiveness_benchmark' => $data['staff'][1],
            'responsiveness_baseline' =>$data['staff'][2],
            'responsiveness_performace' => $data['staff'][3],
            'responsiveness_achievement_points' => $data['staff'][4],
            'responsiveness_improvement_points' => $data['staff'][5],
            'responsiveness_dimension_score' => $data['staff'][6],
            'care_transition_floor' => $data['hcahps_floor_data'][3],
            'care_transition_achievement_threshold' => $data['care'][0],
            'care_transition_benchmark' => $data['care'][1],
            'care_transition_baseline' => $data['care'][2],
            'care_transition_performace' => $data['care'][3],
            'care_transition_achievement_points' => $data['care'][4],
            'care_transition_improvement_points' => $data['care'][5],
            'care_transition_dimension_score' => $data['care'][6],
            'communication_medicine_floor' => $data['hcahps_floor_data'][4],
            'communication_medicine_achievement_threshold' => $data['medicine'][0],
            'communication_medicine_benchmark' => $data['medicine'][1],
            'communication_medicine_baseline' => $data['medicine'][2],
            'communication_medicine_performace' => $data['medicine'][3],
            'communication_medicine_achievement_points' => $data['medicine'][4],
            'communication_medicine_improvement_points' => $data['medicine'][5],
            'communication_medicine_dimension_score' => $data['medicine'][6],
            'cleanliness_floor' => $data['hcahps_floor_data'][5],
            'cleanliness_achievement_threshold' => $data['cleanliness'][0],
            'cleanliness_benchmark' => $data['cleanliness'][1],
            'cleanliness_baseline' => $data['cleanliness'][2],
            'cleanliness_performace' =>  $data['cleanliness'][3],
            'cleanliness_achievement_points' => $data['cleanliness'][4],
            'cleanliness_improvement_points' => $data['cleanliness'][5],
            'cleanliness_dimension_score' => $data['cleanliness'][6],
            'discharge_floor' => $data['hcahps_floor_data'][6],
            'discharge_achievement_threshold' => $data['discharge'][0],
            'discharge_benchmark' => $data['discharge'][1],
            'discharge_baseline' => $data['discharge'][2],
            'discharge_performace' => $data['discharge'][3],
            'discharge_achievement_points' => $data['discharge'][4],
            'discharge_improvement_points' => $data['discharge'][5],
            'discharge_dimension_score' => $data['discharge'][6],
            'overall_floor' => $data['hcahps_floor_data'][7],
            'overall_achievement_threshold' => $data['overall'][0],
            'overall_benchmark' => $data['overall'][1],
            'overall_baseline' => $data['overall'][2],
            'overall_performace' => $data['overall'][3],
            'overall_achievement_points' => $data['overall'][4],
            'overall_improvement_points' => $data['overall'][5],
            'overall_dimension_score' => $data['overall'][6],
            'hcahps_base_score' => $data['hcahps_tps'][0],
            'hcahps_consistency_score' => $data['hcahps_tps'][1],
            'psi_90_achievement_threshold' => $data['psi90'][0],
            'psi_90_benchmark' => $data['psi90'][1],
            'psi_90_baseline_rate' => $data['psi90'][2],
            'psi_90_performance_rate' => $data['psi90'][3],
            'psi_90_achievement_points' => $data['psi90'][4],
            'psi_90_improvement_points' => $data['psi90'][5],
            'psi_90_measure_score' => $data['psi90'][6],
            'hai_1_achievement_threshold' => $data['ha1'][0],
            'hai_1_benchmark' => $data['ha1'][1],
            'hai_1_baseline_rate' => $data['ha1'][2],
            'hai_1_performance_rate' => $data['ha1'][3],
            'hai_1_achievement_points' => $data['ha1'][4],
            'hai_1_improvement_points' => $data['ha1'][5],
            'hai_1_measure_score' => $data['ha1'][6],
            'hai_2_achievement_threshold' => $data['ha2'][0],
            'hai_2_benchmark' => $data['ha2'][1],
            'hai_2_baseline_rate' => $data['ha2'][2],
            'hai_2_performance_rate' => $data['ha2'][3],
            'hai_2_achievement_points' => $data['ha2'][4],
            'hai_2_improvement_points' => $data['ha2'][5],
            'hai_2_measure_score' => $data['ha2'][6],
            'combined_ssi_measure_score' => $data['combined_ssi'][0],
            'hai_3_achievement_threshold' => $data['ha3'][0],
            'hai_3_benchmark' => $data['ha3'][1],
            'hai_3_baseline_rate' => $data['ha3'][2],
            'hai_3_performance_rate' => $data['ha3'][3],
            'hai_3_achievement_points' => $data['ha3'][4],
            'hai_3_improvement_points' => $data['ha3'][5],
            'hai_3_measure_score' => $data['ha3'][6],
            'hai_4_achievement_threshold' => $data['ha4'][0],
            'hai_4_benchmark' => $data['ha4'][1],
            'hai_4_baseline_rate' => $data['ha4'][2],
            'hai_4_performance_rate' => $data['ha4'][3],
            'hai_4_achievement_points' => $data['ha4'][4],
            'hai_4_improvement_points' => $data['ha4'][5],
            'hai_4_measure_score' => $data['ha4'][6],
            'hai_5_achievement_threshold' => $data['ha5'][0],
            'hai_5_benchmark' => $data['ha5'][1],
            'hai_5_baseline_rate' => $data['ha5'][2],
            'hai_5_performance_rate' => $data['ha5'][3],
            'hai_5_achievement_points' => $data['ha5'][4],
            'hai_5_improvement_points' => $data['ha5'][5],
            'hai_5_measure_score' => $data['ha5'][6],
            'hai_6_achievement_threshold' => $data['ha6'][0],
            'hai_6_benchmark' => $data['ha6'][1],
            'hai_6_baseline_rate' => $data['ha6'][2],
            'hai_6_performance_rate' => $data['ha6'][3],
            'hai_6_achievement_points' => $data['ha6'][4],
            'hai_6_improvement_points' => $data['ha6'][5],
            'hai_6_measure_score' => $data['ha6'][6],
            'pc_01_achievement_threshold' => $data['pc01'][0],
            'pc_01_benchmark' => $data['pc01'][1],
            'pc_01_baseline_rate' => $data['pc01'][2],
            'pc_01_performance_rate' => $data['pc01'][3],
            'pc_01_achievement_points' => $data['pc01'][4],
            'pc_01_improvement_points' => $data['pc01'][5],
            'pc_01_measure_score' => $data['pc01'][6],
            'mspb_1_achievement_threshold' => $data['MSPB'][0],
            'mspb_1_benchmark' => $data['MSPB'][1],
            'mspb_1_baseline_rate' => $data['MSPB'][2],
            'mspb_1_performance_rate' => $data['MSPB'][3],
            'mspb_1_achievement_points' => $data['MSPB'][4],
            'mspb_1_improvement_points' => $data['MSPB'][5],
            'mspb_1_measure_score' => $data['MSPB'][6],
            'comments' => $data['comments'][0],
            
            ))->execute();
            
	}
	
	
	public static function calculate($achievement, $benchmark, $baseline, $performance){
	
        if ($benchmark - $achievement == 0){
        
            $achievement_points = 0;
        }
        else {
            $achievement_points = round(9 * (($performance - $achievement)/($benchmark - $achievement)) + 0.5);
        
            if ($achievement_points >= 10){
                $achievement_points = 10;
            }
        
            if ($achievement_points <= 0){
                $achievement_points = 0;
            }
        }
        
        if ($benchmark - $baseline == 0){
            $improvement_points = 0;
        
        }
        else {
        
            $improvement_points = round(10 * (($performance - $baseline)/($benchmark - $baseline)) - 0.5);
        
            if ($improvement_points >= 9){
                $improvement_points = 9;
            }
        
            if ($improvement_points <= 0){
                $improvement_points = 0;
            }
        }
        
        if ($achievement_points >= $improvement_points){
            $measure_score = $achievement_points;
        }else{
            $measure_score = $improvement_points;
        }
	
		return [$achievement, $benchmark, $baseline, $performance, $achievement_points, $improvement_points, $measure_score];
	}
	public static function tps_domain($measure_scores){
		$total_measure = 0;
		for ($i = 0; $i < sizeof($measure_scores); $i++){
			$total_measure = $total_measure + $measure_scores[$i];
		}
		
		$unweighted_domain = ($total_measure / (10 * sizeof($measure_scores))) * 100;
		$weighted_domain = $unweighted_domain * 0.25;
	
		return [$total_measure, $unweighted_domain, $weighted_domain];
	
	}	
	
	public static function tps_HCAHPS($measure_scores){
		$total_measure = 0;
		for ($i = 0; $i < sizeof($measure_scores); $i++){
			$total_measure = $total_measure + $measure_scores[$i];
		}
		
		$consistency_score = 15;
		
		$unweighted_domain = ($total_measure + $consistency_score);
		$weighted_domain = $unweighted_domain * 0.25;
	
		return [$total_measure, $unweighted_domain, $weighted_domain];
	
	}	
	
	public static function tps($domain_scores){
		$total = 0;
		for ($i = 0; $i < sizeof($domain_scores); $i++){
			$total = $total + $domain_scores[$i];
		}
	
		return [$total];
	
	}	
	
	public static function reimbursement($reimbursement_data){
		$reimbursement = $reimbursement_data[0];
		$tps = $reimbursement_data[1];
		
		$penalty = $reimbursement * 0.02;
		$money_back = ($tps / 100) * $penalty;
		
		$total_reimbursement = $reimbursement - $penalty + $money_back;
	
		return [$reimbursement, $penalty, $total_reimbursement];
	
	}	
}
