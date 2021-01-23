<?php

class Excel_import extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('excel_import_model');
		$this->load->library('excel');
		$this->load->database();
	}

	function index()
	{
		$this->load->view('excel_import');
	}
	
	function fetch()
	{
		//echo "in";exit;

		$data = $this->excel_import_model->select_students();
		//print_r($data); exit;
		$output = '
		<h3 align="center">Total Data - '.$data->num_rows().'</h3>
		<table class="table table-striped table-bordered">
			<tr>
				<th>id</th>
				<th>inst_name</th>
				<th>reg_no</th>
				<th>uname</th>
				<th>password</th>
			</tr>
		';
	//	print_r($data->result());
		foreach($data->result() as $row)
		{
			$output .= '
			<tr>
				<td>'.$row->id.'</td>
				<td>'.$row->inst_name.'</td>
				<td>'.$row->reg_no.'</td>
				<td>'.$row->uname.'</td>
				<td>'.$row->password.'</td>
			</tr>
			';
		}
		$output .= '</table>';
		echo $output;
	}

	function import()
	{
		if(isset($_FILES["file"]["name"]))
		{
			$path = $_FILES["file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				// Edit the number of rows you want to get from that excel sheet
				// $highestRow = $worksheet->getHighestRow();
				$highestRow = 20;
				
				$highestColumn = $worksheet->getHighestColumn();
				for($row=2; $row<=$highestRow; $row++)
				{
					$id = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					echo $id;
					$inst_name = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$reg_no = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$uname = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$password = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$data[] = array(
						'id'		=>	$id,
						'inst_name'	=>	$inst_name,
						'reg_no'	=>	$reg_no,
						'uname'		=>	$uname,
						'password'	=>	$password
					);
				}
			}
			$this->excel_import_model->insert($data);
			echo 'Data Imported successfully';
		}	
	}
}

?>