<?
namespace App\Models;

use App\Base\Db;

class BaseModel
{
	private static $conn;

	protected function store($data){
		$id = self::getLink()->insert(static::$table, $data);
	}

	public static function getLink(){
		return Db::getInstance()->getConnection();
	}
}