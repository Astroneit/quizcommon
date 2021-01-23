<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Result extends CI_Controller {

	 function __construct()
	 {
	   parent::__construct();
	   $this->load->database();
	   $this->load->model("result_model");
	   $this->lang->load('basic', $this->config->item('language'));
		// redirect if not loggedin
		if(!$this->session->userdata('logged_in')){
			redirect('login');
			
		}
		$logged_in=$this->session->userdata('logged_in');
		if($logged_in['base_url'] != base_url()){
		$this->session->unset_userdata('logged_in');		
		redirect('login');
		}
	 }

	public function index($limit='0',$status='0')
	{
		
	$uid=$this->session->userdata('uid');
		$data['limit']=$limit;
		$data['status']=$status;
		$data['title']=$this->lang->line('resultlist');
		// fetching result list
		$data['result']=$this->result_model->result_list($limit,$status);
		// print_r($data['result']);
		// fetching quiz list
		$data['quiz_list']=$this->result_model->quiz_list();
		$data['quiz_cat']=$this->result_model->quiz_cat();
		// group list
		 $this->load->model("user_model");
		$data['group_list']=$this->user_model->group_list();
		
	 /*
	 $get_result = $this->result_model->get_all_result($uid);
	 $value=array();
     $value[]=array('Quiz Name','Percentage (%)');
     foreach($get_result as $val){
     $value[]=array($val['quiz_name'].' ('.$val['first_name']." ".$val['last_name'].')',intval($val['percentage_obtained']));
     }
     $data['value']=json_encode($value);
	 */
	 
	 $data['ind_result'] = $this->result_model->get_ind_cat_all($uid);

		/*  $data['ind_result'] = $this->result_model->get_ind_cat_all($uid); */
		
		$this->load->view('header',$data);
		$this->load->view('result_list',$data);
	//	$this->load->view('footer',$data);
		
	}
	


	
	public function remove_result($rid){

			$logged_in=$this->session->userdata('logged_in');
			if($logged_in['su']!='1'){
				exit($this->lang->line('permission_denied'));
			} 
			
			if($this->result_model->remove_result($rid)){
                        $this->session->set_flashdata('message', "<div class='alert alert-success'>".$this->lang->line('removed_successfully')." </div>");
					}
					else{
						    $this->session->set_flashdata('message', "<div class='alert alert-danger'>".$this->lang->line('error_to_remove')." </div>");
						
					}
					redirect('result');
                     
			
		}
	

	
	function generate_report(){
		$this->load->helper('download');		
		$quid=$this->input->post('quid');
		$gid=$this->input->post('gid');
		$qcat=$this->input->post('qcat');
		$result=$this->result_model->generate_report($quid,$gid,$qcat);
		
		$csvdata=$this->lang->line('result_id').",".$this->lang->line('email').",".$this->lang->line('first_name').",".$this->lang->line('group_name').",Compiler,Department,Regno,".$this->lang->line('score_obtained').",".$this->lang->line('percentage_obtained').",".$this->lang->line('status').",Department,Date,\r\n";
		
		foreach($result as $rk => $val){
			$ccount=$this->result_model->com_count($val['rid']);
			$form = $val['categories'];
            $salary = str_replace(',', '/', $form);
		$csvdata.=$val['rid'].",".$val['email'].",".$val['first_name'].",".$val['group_name'].",".$ccount.",".$val['dept'].",".$val['reg_no'].",".$val['score_obtained'].",".$val['percentage_obtained'].",".$val['result_status'].",".$val['dept'].",".date('Y-m-d H:i:s',$val['start_time'])."\r\n";
		}
		
		$filename=time().'.csv';
		force_download($filename, $csvdata);

	}
	
	function generate_report_test(){
		$this->load->helper('download');		
		$quid=$this->input->post('quid');
		$gid=$this->input->post('gid');
		$qcat=$this->input->post('qcat');
		$result=$this->result_model->generate_report_test();
		
		$csvdata=$this->lang->line('result_id').",".$this->lang->line('email').",".$this->lang->line('first_name').",".$this->lang->line('group_name').",Compiler,Department,Regno,".$this->lang->line('score_obtained').",".$this->lang->line('percentage_obtained').",".$this->lang->line('status').",Department,Date,All,\r\n";
		
		foreach($result as $rk => $val1){
			
			$val=$this->result_model->generate_result1($val1['uid'],$gid,$quid);
			
			//$ccount=$this->result_model->com_count($val['rid']);
			$form = $val['categories'];
            $salary = str_replace(',', '/', $form);
		$csvdata.=$val1['uid'].",".$val1['email'].",".$val1['first_name'].",".$val['group_name'].",0,".$val1['dept'].",".$val1['reg_no'].",".$val['score_obtained'].",".$val['percentage_obtained'].",".$val['result_status'].",".$val['sec_result'].",".date('Y-m-d H:i:s',$val['start_time'].",".$val['sec_result'])."\r\n";
		}
		
		$filename=time().'.csv';
		force_download($filename, $csvdata);

	}
	
	
	
	
	
	
	function view_result($rid){
		
		$logged_in=$this->session->userdata('logged_in');
			
		$data['result']=$this->result_model->get_result($rid);
	//	print_r($data['result']); exit;
		$data['title']=$this->lang->line('result_id').' '.$data['result']['rid'];
		if($data['result']['view_answer']=='1' || $logged_in['su']=='1') {
		$this->load->model("quiz_model");
		$data['saved_answers']=$this->quiz_model->saved_answers($rid);
		$data['questions']=$this->quiz_model->get_questions($data['result']['r_qids']);
		$data['options']=$this->quiz_model->get_options($data['result']['r_qids']);
		}
		// top 10 results of selected quiz
	$last_ten_result = $this->result_model->last_ten_result($data['result']['quid'],$data['result']['uid']);
	$value=array();
     $value[]=array('Quiz Name','Percentage(%)');
     foreach($last_ten_result as $val){
     $value[]=array($val['quiz_name'].' ('.$val['first_name']." ".$val['last_name'].')',intval($val['percentage_obtained']));
     }
     $data['value']=json_encode($value);
	 
	 $data['sub_skill_result']=$this->result_model->get_sub_skill_result($rid);
	 $data['skill_result']=$this->result_model->get_skill_result($rid);
	 
	 
	
	// time spent on individual questions
	$correct_incorrect=explode(',',$data['result']['score_individual']);
	 $qtime[]=array($this->lang->line('question_no'),'Time Taken','Min Time','Max Time');
	 $correctcount=0;
		$incorrectcount=0;
		$unattempted=0;
		$pending_evaluation=0;
		$q_string=explode(",",$data['result']['r_qids']);
    foreach(explode(",",$data['result']['individual_time']) as $key => $val){
//echo $data['result']['student_level'];
//echo $q_string[$key];
		$qu_time=$this->result_model->get_max_time_question($q_string[$key],$data['result']['student_level']);
	
	if($val=='0'){
		$val=1;
	}
	 if($correct_incorrect[$key]=="1"){
		 $correctcount=$correctcount+1; 
	 //$qtime[]=array($this->lang->line('q')." ".($key+1).") - ".$q_string[$key]." ",intval($val), 10);
	 $qtime[]=array($this->lang->line('q')." ".($key+1).") - ".$this->lang->line('correct')." ",intval($val), intval($qu_time['min_time']),intval($qu_time['max_time']));
	 }
	 else if($correct_incorrect[$key]=='2' ){
		 $incorrectcount=$incorrectcount+1;
	 $qtime[]=array($this->lang->line('q')." ".($key+1).") - ".$this->lang->line('incorrect')."",intval($val), intval($qu_time['min_time']),intval($qu_time['max_time']));
	 }
	 else if($correct_incorrect[$key]=='0' ){
		 $unattempted=$unattempted+1;
	 $qtime[]=array($this->lang->line('q')." ".($key+1).") -".$this->lang->line('unattempted')." ",intval($val), intval($qu_time['min_time']),intval($qu_time['max_time']));
	 }
	 else if($correct_incorrect[$key]=='3' ){
		 $pending_evaluation=$pending_evaluation+1;
	 $qtime[]=array($this->lang->line('q')." ".($key+1).") - ".$this->lang->line('pending_evaluation')." ",intval($val), intval($qu_time['min_time']),intval($qu_time['max_time']));
	 }
	 }
	 $data['correctcount']=$correctcount;
	 $data['incorrectcount']=$incorrectcount;
	 $data['unattempted']=$unattempted;
	 $data['pending_evaluation']=$pending_evaluation;
	 
	 
	 
	 
	 
	 //print_r( $qtime);
	  $data['qtime']=json_encode($qtime);
	  $data['qtimes']=$qtime;
	  
	
	  
	  
	// $data['percentile'] = $this->result_model->get_percentile($data['result']['quid'], $data['result']['uid'], $data['result']['score_obtained']);

	/*  $data['ind_result']= $this->result_model->get_ind_cat($rid,$data['result']['uid']); */
	 
	 
	 $ind_result = $this->result_model->get_ind_cat($rid,$data['result']['uid']);
	 $values=array();
	  $values[]=array('Quiz Name','Marks');
	 foreach($ind_result as $ind_result1){
     $values[]=array($ind_result1['category_name'].'',intval($ind_result1['cnt']));
    
     }

	 // $data['values1'] = $this->result_model->ex_get_ind_cat($rid,$data['result']['uid']);
	//  $values1=array();
	  // $values1[]=array('Quiz Name','Percentage');
	/*  foreach($ind_result1 as $ind_result2){
     $values1[]=array($ind_result2['category_name'].'',intval($ind_result2['sec_percentage']));
    
     }  */
	 
	 $data['ind_result'] = $this->result_model->ex_get_ind_cat($rid,$data['result']['uid']);
	 $data['values']=json_encode($values);


$data['compiler']=$this->result_model->get_compiler($rid,$data['result']['uid']);
		$this->load->view('header',$data);
		$this->load->view('view_result',$data);
	//	$this->load->view('view_result_backup',$data);
	//	$this->load->view('footer',$data);	
		
	}
	
	
	
	function view_result1(){
		
		$logged_in=$this->session->userdata('logged_in');
		
		
$quid=$this->input->post('quid');
		$gid=$this->input->post('gid');
		$qcat=$this->input->post('qcat');
		
		
		// top 10 results of selected quiz
			if($this->session->userdata('gid')==0)
		{
	$data['last_ten_result'] = $this->result_model->last_ten_result1($quid,$gid,$qcat);
		}
		else{
			
			$data['last_ten_result'] = $this->result_model->last_ten_result11($quid,$gid,$qcat);
		}
	 /*$value=array();
     
     foreach($last_ten_result as $val){
     $value[]=array($val['quiz_name'].' ('.$val['first_name']." ".$val['last_name'].')',intval($val['percentage_obtained']),'silver');
     }
     $data['value']=json_encode($value); */
	 
		$this->load->view('header',$data);
		$this->load->view('view_chart',$data);
	//	$this->load->view('footer',$data);	
		
	}
	
	
	function view_group_result($rid){
		
		$logged_in=$this->session->userdata('logged_in');

	 
	   $grp_resultdd = $this->result_model->get_group_cat($rid);
	   
	 $data['grp_name'] = $this->result_model->get_group_name($rid);
	 

	 $values=array();
	  $values[]=array('Result','Pass','Fail');
	 foreach($grp_resultdd as $grp_resultres){
		 
     $values[]=array($grp_resultres['quiz_name'],intval($grp_resultres['pass_count']),intval($grp_resultres['fail_count']));
	 
     } 
	

	 $data['values']=json_encode($values);
	

	 
		$this->load->view('header',$data);
		$this->load->view('view_result_group',$data);
	//	$this->load->view('footer',$data);	
		
	}
	
	
	
	
	function generate_certificate($rid){
	$data['result']=$this->result_model->get_result($rid);
	
	if($data['result']['gen_certificate']=='0'){
		exit();
	}
		// save qr 
	$enu=urlencode(site_url('login/verify_result/'.$rid));

	$qrname="./upload/".time().'.jpg';
	$durl="https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=".$enu."&choe=UTF-8";
	copy($durl,$qrname);
	 
	
	$certificate_text=$data['result']['certificate_text'];
	$certificate_text=str_replace('{qr_code}',"<img src='".$qrname."'>",$certificate_text);
	$certificate_text=str_replace('{email}',$data['result']['email'],$certificate_text);
	$certificate_text=str_replace('{first_name}',$data['result']['first_name'],$certificate_text);
	$certificate_text=str_replace('{last_name}',$data['result']['last_name'],$certificate_text);
	$certificate_text=str_replace('{percentage_obtained}',$data['result']['percentage_obtained'],$certificate_text);
	$certificate_text=str_replace('{score_obtained}',$data['result']['score_obtained'],$certificate_text);
	$certificate_text=str_replace('{quiz_name}',$data['result']['quiz_name'],$certificate_text);
	$certificate_text=str_replace('{status}',$data['result']['result_status'],$certificate_text);
	$certificate_text=str_replace('{result_id}',$data['result']['rid'],$certificate_text);
	$certificate_text=str_replace('{generated_date}',date('Y-m-d H:i:s',$data['result']['end_time']),$certificate_text);
	
	$data['certificate_text']=$certificate_text;
	// $this->load->view('view_certificate',$data);
	$this->load->library('pdf');
	$this->pdf->load_view('view_certificate',$data);
	$this->pdf->render();
	$filename=date('Y-M-d_H:i:s',time()).".pdf";
	$this->pdf->stream($filename);

	
	}
	
	
	function preview_certificate($quid){
		 $this->load->model("quiz_model");
	  
	$data['result']=$this->quiz_model->get_quiz($quid);
	if($data['result']['gen_certificate']=='0'){
		exit();
	}
		// save qr 
	$enu=urlencode(site_url('login/verify_result/0'));
$tm=time();
	$qrname="./upload/".$tm.'.jpg';
	$durl="https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=".$enu."&choe=UTF-8";
	copy($durl,$qrname);
	 $qrname2=base_url('/upload/'.$tm.'.jpg');
	
	
	$certificate_text=$data['result']['certificate_text'];
	$certificate_text=str_replace('{qr_code}',"<img src='".$qrname2."'>",$certificate_text);
	$certificate_text=str_replace('{result_id}','1023',$certificate_text);
	$certificate_text=str_replace('{generated_date}',date('Y-m-d H:i:s',time()),$certificate_text);
	
	$data['certificate_text']=$certificate_text;
	  $this->load->view('view_certificate_2',$data);
	 
	
	}
	
	function final_yr_project()
	{
	    $this->load->model("user_model");
	    $data['title']=$this->lang->line('finalyr_project');
	    $data['ieee_desc']=$this->user_model->get_ieee_desc();
	    $this->load->view('header',$data);
		$this->load->view('finalyr_prjctlist',$data);
	}
	
	function project_request()
{
 $this->load->model("user_model");
 $data['pro_req']=$this->user_model->project_req();
 $this->load->view('ajax_final_project',$data);
}

function download_pdf($rid)
{
	  
	$logged_in=$this->session->userdata('logged_in');
			
		$data['result']=$this->result_model->get_result($rid);
		$data['title']=$this->lang->line('result_id').' '.$data['result']['rid'];
		if($data['result']['view_answer']=='1' || $logged_in['su']=='1') {
		$this->load->model("quiz_model");
		$data['saved_answers']=$this->quiz_model->saved_answers($rid);
		$data['questions']=$this->quiz_model->get_questions($data['result']['r_qids']);
		$data['options']=$this->quiz_model->get_options($data['result']['r_qids']);
		}
		// top 10 results of selected quiz
	$last_ten_result = $this->result_model->last_ten_result($data['result']['quid'],$data['result']['uid']);
	$value=array();
     $value[]=array('Quiz Name','Percentage(%)');
     foreach($last_ten_result as $val){
     $value[]=array($val['quiz_name'].' ('.$val['first_name']." ".$val['last_name'].')',intval($val['percentage_obtained']));
     }
     $data['value']=json_encode($value);

	 
	 
	// time spent on individual questions
	$correct_incorrect=explode(',',$data['result']['score_individual']);
	 $qtime[]=array($this->lang->line('question_no'),$this->lang->line('time_in_sec'));
    foreach(explode(",",$data['result']['individual_time']) as $key => $val){
	if($val=='0'){
		$val=1;
	}
	 if($correct_incorrect[$key]=="1"){
	 $qtime[]=array($this->lang->line('q')." ".($key+1).") - ".$this->lang->line('correct')." ",intval($val));
	 }
	 else if($correct_incorrect[$key]=='2' ){
	 $qtime[]=array($this->lang->line('q')." ".($key+1).") - ".$this->lang->line('incorrect')."",intval($val));
	 }
	 else if($correct_incorrect[$key]=='0' ){
	 $qtime[]=array($this->lang->line('q')." ".($key+1).") -".$this->lang->line('unattempted')." ",intval($val));
	 }
	 else if($correct_incorrect[$key]=='3' ){
	 $qtime[]=array($this->lang->line('q')." ".($key+1).") - ".$this->lang->line('pending_evaluation')." ",intval($val));
	 }
	 }
	  $data['qtime']=json_encode($qtime);
	 $data['percentile'] = $this->result_model->get_percentile($data['result']['quid'], $data['result']['uid'], $data['result']['score_obtained']);

	/*  $data['ind_result']= $this->result_model->get_ind_cat($rid,$data['result']['uid']); */
	 
	 
	 $ind_result = $this->result_model->get_ind_cat($rid,$data['result']['uid']);
	 $values=array();
	  $values[]=array('Quiz Name','Marks');
	 foreach($ind_result as $ind_result1){
     $values[]=array($ind_result1['category_name'].'',intval($ind_result1['cnt']));
    
     }


	 $data['ind_result'] = $this->result_model->ex_get_ind_cat($rid,$data['result']['uid']);
	 $data['values']=json_encode($values);

        //load the view and saved it into $html variable
        $html=$this->load->view('view_result', $data, true);
 
        //this the the PDF filename that user will get to download
        $pdfFilePath = $rid."_Result.pdf";
 
        //load mPDF library
        $this->load->library('m_pdf');
 
       //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($html);
 $mpdf->debug = true;
        //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, "D");        
    
}
	function my_DOMPDF($rid){
			$logged_in=$this->session->userdata('logged_in');
			
		$data['result']=$this->result_model->get_result($rid);
		$data['title']=$this->lang->line('result_id').' '.$data['result']['rid'];
		if($data['result']['view_answer']=='1' || $logged_in['su']=='1') {
		$this->load->model("quiz_model");
		$data['saved_answers']=$this->quiz_model->saved_answers($rid);
		$data['questions']=$this->quiz_model->get_questions($data['result']['r_qids']);
		$data['options']=$this->quiz_model->get_options($data['result']['r_qids']);
		}
		// top 10 results of selected quiz
	$last_ten_result = $this->result_model->last_ten_result($data['result']['quid'],$data['result']['uid']);
	$value=array();
     $value[]=array('Quiz Name','Percentage(%)');
     foreach($last_ten_result as $val){
     $value[]=array($val['quiz_name'].' ('.$val['first_name']." ".$val['last_name'].')',intval($val['percentage_obtained']));
     }
     $data['value']=json_encode($value);
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	// time spent on individual questions
	$correct_incorrect=explode(',',$data['result']['score_individual']);
	 $qtime[]=array($this->lang->line('question_no'),$this->lang->line('time_in_sec'));
    foreach(explode(",",$data['result']['individual_time']) as $key => $val){
	if($val=='0'){
		$val=1;
	}
	 if($correct_incorrect[$key]=="1"){
	 $qtime[]=array($this->lang->line('q')." ".($key+1).") - ".$this->lang->line('correct')." ",intval($val));
	 }
	 else if($correct_incorrect[$key]=='2' ){
	 $qtime[]=array($this->lang->line('q')." ".($key+1).") - ".$this->lang->line('incorrect')."",intval($val));
	 }
	 else if($correct_incorrect[$key]=='0' ){
	 $qtime[]=array($this->lang->line('q')." ".($key+1).") -".$this->lang->line('unattempted')." ",intval($val));
	 }
	 else if($correct_incorrect[$key]=='3' ){
	 $qtime[]=array($this->lang->line('q')." ".($key+1).") - ".$this->lang->line('pending_evaluation')." ",intval($val));
	 }
	 }
	  $data['qtime']=json_encode($qtime);
	 $data['percentile'] = $this->result_model->get_percentile($data['result']['quid'], $data['result']['uid'], $data['result']['score_obtained']);

	/*  $data['ind_result']= $this->result_model->get_ind_cat($rid,$data['result']['uid']); */
	 
	 
	 $ind_result = $this->result_model->get_ind_cat($rid,$data['result']['uid']);
	 $values=array();
	  $values[]=array('Quiz Name','Marks');
	 foreach($ind_result as $ind_result1){
     $values[]=array($ind_result1['category_name'].'',intval($ind_result1['cnt']));
    
     }


	 $data['ind_result'] = $this->result_model->ex_get_ind_cat($rid,$data['result']['uid']);
	 $data['values']=json_encode($values);
  $this->load->library('pdf');
  $this->pdf->load_view('view_result',$data);
  $this->pdf->render();
  $this->pdf->stream("welcom.pdf");
 }
 
 
 
 
 
 //jothi



function overallreport()
{



	
	 $logged_in=$this->session->userdata('logged_in');



	if($logged_in['su']=='1'){
		
			 $data['results']=$this->result_model->get_result_overall();

		     
	
	}
	
	
	else{
		$userid=$this->uri->segment(3);
		$data['results']=$this->result_model->get_result_overall_single($userid);
       
	  
	}	
	
	//echo $data[0]['results']['score_individual']; exit;
	
	 
	
	
$this->load->view('header',$data);

	$this->load->view('view_result_overall1');

}	













function groupreport()
{

	$logged_in=$this->session->userdata('logged_in');
	
 $selgrp_id=$this->input->post('grouprep');
 $selquiz_id=$this->input->post('selquiz');
		
			$data['result']=$this->result_model->get_result_groupall($selgrp_id,$selquiz_id);
			$data['results']=$this->result_model->get_result_groupall($selgrp_id,$selquiz_id);
			
	
	
//	$data['compiler']=$this->result_model->get_compiler($rid,$data['result']['uid']);	

	$this->load->view('header',$data);
	//$this->load->view('view_groupwise_result');
	$this->load->view('view_groupwise_result1');
}	


function quizwise_report()
{
	

	$logged_in=$this->session->userdata('logged_in');
	
 $quiz_id=$this->input->post('selquiz');
 


$data['qw_result']=$this->result_model->get_result_quizall($quiz_id);
			
	$data['quiz_lists']=$this->result_model->quiz_list_single($quiz_id);

	$this->load->view('header',$data);
	$this->load->view('quizwise_result');
}	


function selquiz_groupwise()
{
	

	$logged_in=$this->session->userdata('logged_in');
	
	
	$group_id=$this->input->post('data');
 
 


$tt['gw_qw_result']=$this->result_model->get_result_gw_quizall($group_id);
	
$dat=$this->load->view('quiz_ajax',$tt);	
	

	
}

	
function group_quiz_report()
{
	

	$logged_in=$this->session->userdata('logged_in');
	
 $group_id=$this->input->post('group_id');
 $quiz_id=$this->input->post('quiz_id');
 


$data['qw_gw_result']=$this->result_model->get_result_gw_quizres($group_id,$quiz_id);
			
	

	$this->load->view('header',$data);
	$this->load->view('group_quiz_result');
}	



function fake()
{
		
 $res_id=$this->input->post('res_id');
$this->result_model->fake_attempt($res_id);


}




 
}
?>