<?php 

namespace Hcode\DB;

class Connection {

	// putenv('DISPLAY_ERRORS_DETAILS=' . true);

	// putenv('DB_ECOMMERCE_MYSQL_HOST=localhost');
	// putenv('DB_ECOMMERCE_MYSQL_DBNAME=db_ecommerce');
	// putenv('DB_ECOMMERCE_MYSQL_USER=root');
	// putenv('DB_ECOMMERCE_MYSQL_PASSWORD=');
	// putenv('DB_ECOMMERCE_MYSQL_PORT=3306');

	private $pdo;

	public function __construct() {

		$host = 'localhost';
		$port = '3306';
		$user = 'root';
		$pass = '';
		$dbname = 'db_ecommerce';

		$dsn = "mysql:host={$host};dbname={$dbname};port={$port}";

		$this->pdo = new \PDO($dsn, $user, $pass);
		$this->pdo->setAttribute(
			\PDO::ATTR_ERRMODE,
			\PDO::ERRMODE_EXCEPTION
		);
	}

	//Users

	public function getUsers() {

		$users = $this->pdo
			->query('SELECT * FROM tb_users;')
			->fetchAll(\PDO::FETCH_ASSOC);

		echo "<pre>";
		foreach($users as $user) {
			var_dump($user);
			//echo $user["deslogin"];
		}
		die;
	}

	public function login($login, $password) {

		$desloginUsers = $this->pdo
			->query('SELECT * FROM tb_users;')
			->fetchAll(\PDO::FETCH_ASSOC);

		foreach($desloginUsers as $deslogin) {
			if ($login == $deslogin["deslogin"]) {
				$despasswordUsers = $this->pdo
					->query('SELECT * FROM tb_users')
					->fetchAll(\PDO::FETCH_ASSOC);
				foreach($despasswordUsers as $despassword) {
					if ($password == $despassword["despassword"]) {
						header("Location: /Udemy/PHP/ecommerce/admin");
						die();
					} else echo "Senha inválida!";
				}
			} else echo "Login inválido!";

		}
	
	}
}


 ?>