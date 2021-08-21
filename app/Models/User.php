<?
namespace App\Models;

class User extends BaseModel
{
	protected static $table = 'users';

	public static function getByUsername($username){
		$db = self::getLink();
		$db->where ("username", $username);
		$user = $db->getOne (self::$table);
		return $user;
	}
}