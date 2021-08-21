<?
namespace App\Base;

class Db 
{
    private static $instance;
	private $conn;

 	private function __construct(){}
 	private function __clone(){}

 	public static function getInstance(){
        if (self::$instance == null){
            self::$instance = new self;
        }

        return self::$instance;
    }

	private function initConnection()
	{
		// $this->con = new \MysqliDb ('127.0.0.1', 'ultrasp', 'Danger@2016', 'ultrasp');
		$this->con = new \MysqliDb ('127.0.0.1', 'root', '', 'todos');
		return $this->con;
	}

	public function getConnection(){
		return empty($this->conn) ? $this->initConnection()  : $this->conn;
	}
}