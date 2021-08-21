<?
namespace App\Controllers;

use App\Base\Session;

class Controller{

	private $main_path; 
	public $needAuth = false;

	function __construct(){
		$this->main_path = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'App/Views/'.DIRECTORY_SEPARATOR;
	}

	function loadView($page, $data = array()) {

		$eform = Session::getErrorForm();
		$data['form_errors'] = isset($eform['errors']) ? $eform['errors'] : [];
		$data['form_data'] = isset($eform['data']) ? $eform['data'] : [];
		$data['alerts'] = Session::getFlashMessages();
		$data['is_logined'] = Session::isLogined();

	    extract($data);
	    $path = $this->main_path.$page.'.php';

		ob_start();
		require($this->main_path.'layout/header.php');
		require($path);
		require($this->main_path.'layout/footer.php');

		$strView = ob_get_contents();
		ob_end_clean();
		return $strView;
	}

}