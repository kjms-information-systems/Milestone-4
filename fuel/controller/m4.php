<?php
use \Model\Vbp;
class Controller_M4 extends Controller_Template {
#pages belong her and live inside of the view folder
	public function action_index() {
		$data = array();
		$this->template->title = 'KJMS';
		$this->template->subtitle = 'Home';
		$this->template->content = View::forge('m4/index', $data);
	}
	public function action_about() {
        $data = array();
		$this->template->title = 'KJMS';
		$this->template->subtitle = 'About';
		$this->template->content = View::forge('m4/about', $data);
	}
	
    public function action_moreinformation() {
        $data = array();
		$this->template->title = 'KJMS';
		$this->template->subtitle = 'More Information';
		$this->template->content = View::forge('m4/moreinformation', $data);
	}
	public function action_bg() {
	}
	
	public function action_register() {
        $data = array();
		$this->template->title = 'KJMS';
		$this->template->subtitle = 'Register';
		$this->template->content = View::forge('m4/register', $data);
	}
	public function post_register() {
		$data = array();
		$username = Input::post('username');
		$pass = Input::post('password');
		$email = Input::post('email');
		$fullname = Input::post('fullname');
		$id = Auth::create_user($username,$pass,$email,5, array( 'fullname' => $fullname));
		Response::redirect_back('');
	}
	public function action_login() {
        $data = array();
		// Input from post?
		if (Input::post()) {
			
			// get the username & password
			$username = Input::post('username');
			$password_hash = Input::post('password');
		
			// Check the credentials
			if( Auth::login($username, $password_hash) ) {
				// redirect if successful
				$data['login_error'] = "Successful!";
    	    }
        	else {
				// add an error to the page
				$data['login_error'] = 'Wrong username/password combo. Try again';
			}
    	}
    	// then show regular login page
		$this->template->title = 'KJMS';
		$this->template->subtitle = 'Login';
		$this->template->content = View::forge('m4/login', $data);
	}
	
	public function action_logout() {
		$data = array();
		$this->template->title = 'Logout';
		if( Auth::check() ) {
			Auth::logout();
			$this->template->subtitle = 'Logged out successfully';
		}
		else {
			$this->template->subtitle = 'You must be logged in to log out';
		}
		$this->template->content = View::forge('m4/logout', $data);
	}
	
	public function action_management() {
        	$data = array();
		$this->template->title = 'KJMS';
		$this->template->subtitle = 'Management';
		$this->template->content = View::forge('m4/management', $data);

	}
	
// FORM EXAMPLE -------------------------------------------
	public function action_list() {
	}
// --------------------------------------------------------
//VBP Modeling
public function action_vbp_modeling() {
		$data = array();
		$this->template->title = 'KJMS';
		$this->template->subtitle = 'VBP Model';
		
		$id_info = Auth::get_user_id();
        $username = ['test'];
        
        $username = Auth::get_screen_name();
		
		$prov = Security::strip_tags(Input::post('pNum'));
		if($prov == null){
			$prov = '060034';
		}
		
        $data = Vbp::get_data($prov, $username);
		//Output data to site
		$this->template->content = View::forge('m4/vbp_modeling', $data); 
	
	}
		
public function action_vbp_modeling_calculate(){
		$data = array();
		$this->template->title = 'KJMS';
		$this->template->subtitle = 'VBP Model';
		
		$id_info = Auth::get_user_id();
        $username = ['test'];
        
        $username = Auth::get_screen_name();
		
		$prov = Security::strip_tags(Input::post('pNum'));
		
		
		if($prov == null){
			$prov = '060034';
		}
		
		
		
		$data = Vbp::get_data($prov, $username);
		
		//SAFETY DOMAIN
		
		//Calculating PSI90
		
		$b_psi90 = Security::strip_tags(Input::post('b_psi90'));
		if($b_psi90 != null){
            $data['psi90'][2] = $b_psi90;
		}
		$p_psi90 = Security::strip_tags(Input::post('p_psi90'));
		
		if($p_psi90 != null){
            $data['psi90'][3] = $p_psi90;
		}
		$data['psi90'] = Vbp::calculate($data['psi90'][0], $data['psi90'][1], $data['psi90'][2], $data['psi90'][3]);
		
		//Calculating HA1
		$b_ha1 = Security::strip_tags(Input::post('b_ha1'));
		if($b_ha1 != null){
            $data['ha1'][2] = $b_ha1;
		}
		$p_ha1 = Security::strip_tags(Input::post('p_ha1'));
		
		if($p_ha1 != null){
            $data['ha1'][3] = $p_ha1;
		}
		$data['ha1'] = Vbp::calculate($data['ha1'][0], $data['ha1'][1],$data['ha1'][2], $data['ha1'][3]);
		
    
		//Calculating HA2
		$b_ha2 = Security::strip_tags(Input::post('b_ha2'));
		if($b_ha2 != null){
            $data['ha2'][2] = $b_ha2;
		}
		$p_ha2 = Security::strip_tags(Input::post('p_ha2'));
		
		if($p_ha2 != null){
            $data['ha2'][3] = $p_ha2;
		}
		$data['ha2'] = Vbp::calculate($data['ha2'][0], $data['ha2'][1], $data['ha2'][2], $data['ha2'][3]);
    
    
		//Calculating ha3
		$b_ha3 = Security::strip_tags(Input::post('b_ha3'));
		if($b_ha3 != null){
            $data['ha3'][2] = $b_ha3;
		}
		$p_ha3 = Security::strip_tags(Input::post('p_ha3'));
		
		if($p_ha3 != null){
            $data['ha3'][3] = $p_ha3;
		}
		$data['ha3'] = Vbp::calculate($data['ha3'][0], $data['ha3'][1], $data['ha3'][2], $data['ha3'][3]);
		
		//Calculating ha4
		$b_ha4 = Security::strip_tags(Input::post('b_ha4'));
		if($b_ha4 != null){
            $data['ha4'][2] = $b_ha4;
		}
		$p_ha4 = Security::strip_tags(Input::post('p_ha4'));
		
		if($p_ha4 != null){
            $data['ha4'][3] = $p_ha4;
		}
		$data['ha4'] = Vbp::calculate($data['ha4'][0], $data['ha4'][1], $data['ha4'][2], $data['ha4'][3]);
		
		
		//Calculating ha5
		$b_ha5 = Security::strip_tags(Input::post('b_ha5'));
		if($b_ha5 != null){
            $data['ha5'][2] = $b_ha5;
		}
		$p_ha5 = Security::strip_tags(Input::post('p_ha5'));
		
		if($p_ha5 != null){
            $data['ha5'][3] = $p_ha5;
		}
		$data['ha5'] = Vbp::calculate($data['ha5'][0], $data['ha5'][1], $data['ha5'][2], $data['ha5'][3]);
		
		
		//Calculating ha6
		$b_ha6 = Security::strip_tags(Input::post('b_ha6'));
		if($b_ha6 != null){
            $data['ha6'][2] = $b_ha6;
		}
		$p_ha6 = Security::strip_tags(Input::post('p_ha6'));
		
		if($p_ha6 != null){
            $data['ha6'][3] = $p_ha6;
		}
		$data['ha6'] = Vbp::calculate($data['ha6'][0], $data['ha6'][1], $data['ha6'][2], $data['ha6'][3]);
		
		
		//Calculating pc01
		$b_pc01 = Security::strip_tags(Input::post('b_pc01'));
		if($b_pc01 != null){
            $data['pc01'][2] = $b_pc01;
		}
		$p_pc01 = Security::strip_tags(Input::post('p_pc01'));
		
		if($p_pc01 != null){
            $data['pc01'][3] = $p_pc01;
		}
		$data['pc01'] = Vbp::calculate($data['pc01'][0], $data['pc01'][1], $data['pc01'][2], $data['pc01'][3]);
		
		//Calculating TPS scores for Safety
		
		$safety_tps = [$data['psi90'][6], $data['ha1'][6], $data['ha2'][6], $data['ha3'][6], $data['ha4'][6], $data['ha5'][6], $data['ha6'][6], $data['pc01'][6], $data['combined_ssi'][0]];
		// $data['safety_tps'][8]
		
		$data['safety_tps'] = Vbp::tps_domain($safety_tps);
		
		
		//CLINICAL CARE DOMAIN
		
		//Calculating mortAMI
		$b_mortAMI = Security::strip_tags(Input::post('b_mortAMI'));
		if($b_mortAMI != null){
            $data['mortAMI'][2] = $b_mortAMI;
		}
		$p_mortAMI = Security::strip_tags(Input::post('p_mortAMI'));
		
		if($p_mortAMI != null){
            $data['mortAMI'][3] = $p_mortAMI;
		}
		$data['mortAMI'] = Vbp::calculate($data['mortAMI'][0], $data['mortAMI'][1], $data['mortAMI'][2], $data['mortAMI'][3]);
		
		//Calculating mortHF
		$b_mortHF = Security::strip_tags(Input::post('b_mortHF'));
		if($b_mortHF != null){
            $data['mortHF'][2] = $b_mortHF;
		}
		$p_mortHF = Security::strip_tags(Input::post('p_mortHF'));
		
		if($p_mortHF != null){
            $data['mortHF'][3] = $p_mortHF;
		}
		$data['mortHF'] = Vbp::calculate($data['mortHF'][0], $data['mortHF'][1], $data['mortHF'][2], $data['mortHF'][3]);
		
		//Calculating mortPN
		$b_mortPN = Security::strip_tags(Input::post('b_mortPN'));
		if($b_mortPN != null){
            $data['mortPN'][2] = $b_mortPN;
		}
		$p_mortPN = Security::strip_tags(Input::post('p_mortPN'));
		
		if($p_mortPN != null){
            $data['mortPN'][3] = $p_mortPN;
		}
		$data['mortPN'] = Vbp::calculate($data['mortPN'][0], $data['mortPN'][1], $data['mortPN'][2], $data['mortPN'][3]);
		
		//Calculating TPS scores for Clinical Care
		$cc_tps = [$data['mortAMI'][6], $data['mortHF'][6], $data['mortPN'][6]];
		
		$data['cc_tps'] = Vbp::tps_domain($cc_tps);
		
		
		//EFFICIENCY DOMAIN
		
		//Calculating MSPB
		$b_MSPB = Security::strip_tags(Input::post('b_MSPB'));
		if($b_MSPB != null){
            $data['MSPB'][2] = $b_MSPB;
		}
		$p_MSPB = Security::strip_tags(Input::post('p_MSPB'));
		
		if($p_MSPB != null){
            $data['MSPB'][3] = $p_MSPB;
		}
		$data['MSPB'] = Vbp::calculate($data['MSPB'][0], $data['MSPB'][1], $data['MSPB'][2], $data['MSPB'][3]);	
	
		//Calculating TPS scores for Clinical Care
		$efficiency_tps = [$data['MSPB'][6]];
		
		$data['efficiency_tps'] = Vbp::tps_domain($efficiency_tps);
		
		
		//HCAHPS DOMAIN
		
		//Calculating nurses
		$b_nurses = Security::strip_tags(Input::post('b_nurses'));
		if($b_nurses != null){
            $data['nurses'][2] = $b_nurses;
		}
		$p_nurses = Security::strip_tags(Input::post('p_nurses'));
		
		if($p_nurses != null){
            $data['nurses'][3] = $p_nurses;
		}
			
		$data['nurses'] = Vbp::calculate($data['nurses'][0], $data['nurses'][1], $data['nurses'][2], $data['nurses'][3]);	
		
		//Calculating doctors
		$b_doctors = Security::strip_tags(Input::post('b_doctors'));
		if($b_doctors != null){
            $data['doctors'][2] = $b_doctors;
		}
		$p_doctors = Security::strip_tags(Input::post('p_doctors'));
		
		if($p_doctors != null){
            $data['doctors'][3] = $p_doctors;
		}
		$data['doctors'] = Vbp::calculate($data['doctors'][0], $data['doctors'][1], $data['doctors'][2], $data['doctors'][3]);
		
		//Calculating staff
		$b_staff = Security::strip_tags(Input::post('b_staff'));
		if($b_staff != null){
            $data['staff'][2] = $b_staff;
		}
		$p_staff = Security::strip_tags(Input::post('p_staff'));
		
		if($p_staff != null){
            $data['staff'][3] = $p_staff;
		}
		$data['staff'] = Vbp::calculate($data['staff'][0], $data['staff'][1], $data['staff'][2], $data['staff'][3]);
		
		//Calculating care
		$b_care = Security::strip_tags(Input::post('b_care'));
		if($b_care != null){
            $data['care'][2] = $b_care;
		}
		$p_care = Security::strip_tags(Input::post('p_care'));
		
		if($p_care != null){
            $data['care'][3] = $p_care;
		}
		$data['care'] = Vbp::calculate($data['care'][0], $data['care'][1], $data['care'][2], $data['care'][3]);
		
		//Calculating medicine
		$b_medicine = Security::strip_tags(Input::post('b_medicine'));
		if($b_medicine != null){
            $data['medicine'][2] = $b_medicine;
		}
		$p_medicine = Security::strip_tags(Input::post('p_medicine'));
		
		if($p_medicine != null){
            $data['medicine'][3] = $p_medicine;
		}
		$data['medicine'] = Vbp::calculate($data['medicine'][0], $data['medicine'][1], $data['medicine'][2], $data['medicine'][3]);
		
		//Calculating cleanliness
		$b_cleanliness = Security::strip_tags(Input::post('b_cleanliness'));
		if($b_cleanliness != null){
            $data['cleanliness'][2] = $b_cleanliness;
		}
		$p_cleanliness = Security::strip_tags(Input::post('p_cleanliness'));
		
		if($p_cleanliness != null){
            $data['cleanliness'][3] = $p_cleanliness;
		}
		$data['cleanliness'] = Vbp::calculate($data['cleanliness'][0], $data['cleanliness'][1], $data['cleanliness'][2], $data['cleanliness'][3]);
		
		//Calculating discharge
		$b_discharge = Security::strip_tags(Input::post('b_discharge'));
		if($b_discharge != null){
            $data['discharge'][2] = $b_discharge;
		}
		$p_discharge = Security::strip_tags(Input::post('p_discharge'));
		
		if($p_discharge != null){
            $data['discharge'][3] = $p_discharge;
		}
		$data['discharge'] = Vbp::calculate($data['discharge'][0], $data['discharge'][1], $data['discharge'][2], $data['discharge'][3]);
		
		//Calculating overall
		$b_overall = Security::strip_tags(Input::post('b_overall'));
		if($b_overall != null){
            $data['overall'][2] = $b_overall;
		}
		$p_overall = Security::strip_tags(Input::post('p_overall'));
		
		if($p_overall != null){
            $data['overall'][3] = $p_overall;
		}
		$data['overall'] = Vbp::calculate($data['overall'][0], $data['overall'][1], $data['overall'][2], $data['overall'][3]);
		
		//Calculating TPS scores for HCAHPS
		$hcahps_tps = [$data['nurses'][6], $data['doctors'][6], $data['staff'][6], $data['care'][6], $data['medicine'][6], $data['cleanliness'][6], $data['discharge'][6], $data['overall'][6]];
		
		$data['hcahps_tps'] = Vbp::tps_HCAHPS($hcahps_tps);
		
		
		//TOTAL TPS
		$domain_scores = [$data['cc_tps'][2], $data['hcahps_tps'][2], $data['safety_tps'][2], $data['efficiency_tps'][2]];
		$data['tps'] = Vbp::tps($domain_scores);
		
		//REIMBURSEMENT
		
		$b_reim = Security::strip_tags(Input::post('b_reim'));
		if($b_reim != null){
            $data['reimbursement'][0] = $b_reim;
		}
		
		$reimbursement_data = [$data['reimbursement'][0], $data['tps'][0]];
		$data['reimbursement'] = Vbp::reimbursement($reimbursement_data);
		
		$data['comments'] = array();
		$data['comments'][0] = Security::strip_tags(Input::post('com'));
        
        $data['fileName'] = array();
		$data['fileName'][0] = Security::strip_tags(Input::post('fs'));
		
        $test = $data['fileName'][0];
        
        $contents = File::read_dir(DOCROOT, 0, array(
                '\.csv$' => 'file', // or css files
        ));
    	if ( Auth::check())
	{
       		 //Saving files
        	$load_name = Security::strip_tags(Input::post('load_name'));
        
		//Vbp::put_data("$test.csv", $data);
		
		 $save_name = Security::strip_tags(Input::post('fs'));
		 
        	if ($save_name == null){
            
        	}else{
     
            		Vbp::put_data($save_name, $data);
        	}
	}
		
		
		//Output data to site
		$this->template->content = View::forge('m4/vbp_modeling', $data); 
	}
	
}
