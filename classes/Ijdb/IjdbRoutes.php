<?php
namespace Ijdb;
class IjdbRoutes implements \Ninja\Routes{
	private $albumsTable;
	private $artistsTable;
	private $authorsTable;
	private $authentication;

	public function __construct(){
			
		include __DIR__ . '/../../includes/DatabaseConnection.php';

		$this->albumsTable = new \Ninja\DatabaseTable($pdo, 'album', 'albumid');
		$this->artistsTable = new \Ninja\DatabaseTable($pdo, 'artist', 'id');
		$this->authorsTable = new \Ninja\DatabaseTable($pdo, 'author', 'id');
		$this->authentication = new \Ninja\Authentication($this->authorsTable, 'email', 'password');
	}
	public function getRoutes(): array{
			
		$Musiccontroller = new \Ijdb\Controllers\Music($this->albumsTable, $this->artistsTable, $this->authorsTable);
		$authorController = new \Ijdb\Controllers\Register($this->authorsTable);
		$loginController = new \Ijdb\Controllers\Login($this->authentication);
						
		$routes = [

			'register' => [
				'GET' => [
						'controller' => $authorController,
						'action' => 'registrationForm'
				],
				'POST' => [
						'controller' => $authorController,
						'action' => 'registerUser'
				]
			],
			'success' => [
				'GET' => [
					'controller' => $authorController,
					'action' => 'success'
				]
			],

			'edit' => [
					'POST' => [
							'controller' => $Musiccontroller,
							'action' => 'saveEdit'
					],
					'GET' => [
							'controller' => $Musiccontroller,
							'action' => 'edit'
					],
					'login' => true
					
			],
			'delete' => [
					'POST' => [
							'controller' => $Musiccontroller,
							'action' => 'delete'
					],
					'login' => true
			],
			'list' => [
					'GET' => [
							'controller' => $Musiccontroller,
							'action' => 'list'
					]
			],
			'error' => [
					'GET' => [
							'controller' => $loginController,
							'action' => 'error'
					]
			],
			'login/success' => [
					'GET' => [
							'controller' => $loginController,
							'action' => 'success'
					]
			],
			'login' => [
					'GET' => [
							'controller' => $loginController,
							'action' => 'loginForm'
					],
					'POST' => [
							'controller' => $loginController,
							'action' => 'processLogin'
					]
			],
	
			'' => [
					'GET' => [
							'controller' => $Musiccontroller,
							'action' => 'home'
					]
			],
			'about' => [
					'GET' => [
							'controller' => $Musiccontroller,
							'action' => 'about'
					]
			],
			'search' => [
					'GET' => [
							'controller' => $Musiccontroller,
							'action' => 'search'
					]
			],
			'audio' => [
					'GET' => [
							'controller' => $Musiccontroller,
							'action' => 'audio'
					]
			],
			'video' => [
					'GET' => [
							'controller' => $Musiccontroller,
							'action' => 'video'
					]
			],
			'contact' => [
					'GET' => [
							'controller' => $Musiccontroller,
							'action' => 'contact'
					]
			],
			'addtocart' => [
					'GET' => [
							'controller' => $Musiccontroller,
							'action' => 'addtocart'
					]
			],


		];

		return $routes;
	}

	public function getAuthentication(): \Ninja\Authentication {
		return $this->authentication;
	}
}
