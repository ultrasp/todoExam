<?
namespace App\Models;

class Todo extends BaseModel
{
	const STATUS_DRAFT = 'draft';
	const STATUS_FINISHED = 'finished';

	protected static $table = 'todos';

	public static function save($username,$email,$description,$id = null){
		$item = new Todo();
		$item->store([
			"username" => $username,
           	"email" => $email,
           	"description" => $description,
           	'status' => self::STATUS_DRAFT,
		]);
	}

	public static function update($id,$description,$isFinished = 0){
		$item = self::get($id);
		$db = self::getLink();
		$db->where ('id', $id);
		$db->update (self::$table, [
			'description' => $description,
			'status' => $isFinished ? self::STATUS_FINISHED : self::STATUS_DRAFT,
			'is_admin_changed' => ($item['description'] == $description ) ? 0 : 1
		]);
	}

	public static function getItems($page, $orderBy,$orderType ,$pageLimit = 3){
		$page = $page ?? 1;
		$orderBy = $orderBy ?? 'id';
		$orderType = $orderType ?? 'desc';

		$db = self::getLink();
		$db->pageLimit = $pageLimit;
		$db->orderBy($orderBy,$orderType);
		$items = $db->arraybuilder()->paginate(self::$table, $page);
		return [
			'items' => $items,
			'total' => $db->totalPages,
			'pagenum' => $page,
			'orderBy' => $orderBy,
			'orderType' => $orderType
		];
	}

	public static function get($id){
		$db = self::getLink();
		$db->where ("id", $id);
		$item = $db->getOne (self::$table);
		return $item;
	}
}
