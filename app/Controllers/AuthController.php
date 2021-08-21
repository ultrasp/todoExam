<?
namespace App\Controllers;
use App\Models\User;
use App\Base\Validation;
use App\Base\Session;

class AuthController extends Controller
{
	public function showForm($request){
		if(Session::isLogined()){
			header('Location: /');
		}
		return $this->loadView('auth/login',$data);
	}

	public function login($request){
		$rules = [
			'username' => 'required',
			'password' => 'required',
		];
		if(Validation::validate($rules,$request)){
			if($user_id = $this->isValidLogin($request->getInput('username'),$request->getInput('password'))){
				Session::logined($user_id);
				header('Location: /admin/todos');
			}else{
				Session::storeErrorForm(['username' => ['Incorrect username or password']]);
			}
		}
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	public function logout($request){
		Session::clear();
		header('Location: /');
	}

	public function isValidLogin($username,$password){
		$user = User::getByUsername($username);
		if(empty($user)){
			return false;
		}
		return password_verify($password,$user['password']) ? $user['id'] : false;
	}
}
