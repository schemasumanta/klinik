<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aplikasi extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
	
		$this->load->view('tampilan_setting');
		redirect('aplikasi/mode');
	}

	public function mode()
	{
		var_dump($_SERVER['mode']);
	}

	function setting_database() {
    // write database.php
		$data_db = file_get_contents('config/database.php');
    // session_start();
		$temporary = str_replace("%DATABASE%", $_POST['dbname'],   $data_db);
		$temporary = str_replace("%USERNAME%", $_POST['username'], $temporary);
		$temporary = str_replace("%PASSWORD%", $_POST['password'], $temporary);
		$temporary = str_replace("%HOSTNAME%", $_POST['hostname'], $temporary);
    // Write the new database.php file
		$output_path = './application/config/database.php';
		$handle = fopen($output_path,'w+');
    // Chmod the file, in case the user forgot
		@chmod($output_path,0777);
    // Verify file permissions
		if(is_writable($output_path)) {
        // Write the file
			if(fwrite($handle,$temporary)) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}


}
