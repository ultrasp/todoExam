<?
namespace App\Controllers;
use App\Models\Todo;
use App\Base\Validation;
use App\Base\Session;

class AdminController extends Controller
{
	public $needAuth = true;

	public function listItem($request){
		$id = $request->getParam('id');
		$t = null;
		$t = (!empty($id)) ?  Todo::get($id) : null;
		$data = Todo::getItems($request->getParam('page'),$request->getQuery('orderBy'),$request->getQuery('orderType') );
		$data['curItem'] = $t;
		return $this->loadView('todo/admin',$data);
	}

	public function updateTodo($request){
		$rules = [
			'description' => 'required',
		];
		if(Validation::validate($rules,$request)){
			Todo::update($request->getInput('id'),$request->getInput('description'),$request->getInput('isFinished'));
			Session::storeMessage('success','Data saved');
		}
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

}
