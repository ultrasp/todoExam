<?
namespace App\Controllers;
use App\Models\Todo;
use App\Base\Validation;
use App\Base\Session;

class TodoController extends Controller
{
	public function listItem($request){

		$data = Todo::getItems($request->getParam('page'),$request->getQuery('orderBy'),$request->getQuery('orderType') );

		return $this->loadView('todo/list',$data);
	}

	public function store($request){
		$rules = [
			'username' => 'required',
			'email' => 'required|email',
			'description' => 'required',
		];
		if(Validation::validate($rules,$request)){
			Todo::save($request->getInput('username'),$request->getInput('email'),$request->getInput('description'));
			Session::storeMessage('success','Data saved');
		}
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

}
