<?php
namespace Ijdb;
class IjdbRoutes implements \Ninja\Routes{
	private $albumsTable;
	private $reviewsTable;
	private $authorsTable;
	private $artistsTable;
	private $authentication;

	public function __construct(){
			
		include __DIR__ . '/../../includes/DatabaseConnection.php';

		$this->albumsTable = new \Ninja\DatabaseTable($pdo, 'album', 'albumid');
		$this->authorsTable = new \Ninja\DatabaseTable($pdo, 'author', 'id');
		$this->reviewsTable = new \Ninja\DatabaseTable($pdo, 'reviews', 'reviewsid');
		$this->artistsTable = new \Ninja\DatabaseTable($pdo, 'artist', 'id');
		$this->authentication = new \Ninja\Authentication($this->authorsTable, 'email', 'password');
	}
	public function getRoutes(): array{
			
		$Musiccontroller = new \Ijdb\Controllers\Music($this->albumsTable, $this->authorsTable, $this->reviewsTable, $this->artistsTable, $this->authentication);
		$authorController = new \Ijdb\Controllers\Register($this->authorsTable);
		$loginController = new \Ijdb\Controllers\Login($this->authentication);
						
		$routes = [

			//register
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
			'registersuccess' => [
				'GET' => [
					'controller' => $authorController,
					'action' => 'success'
				]
			],

			//reviews 
			'editreviews' => [
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
			'deletereviews' => [
					'POST' => [
							'controller' => $Musiccontroller,
							'action' => 'delete'
					],
					'login' => true
			],
			'reviews' => [
					'GET' => [
							'controller' => $Musiccontroller,
							'action' => 'reviews'
					]
			],

			//login 
			'loginerror' => [
				'GET' => [
					'controller' => $loginController,
					'action' => 'error'
				]
			],
			'loginsuccess' => [
				'GET' => [
					'controller' => $loginController,
					'action' => 'loginsuccess'
				],
				'login' => true
				
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
			'logout' => [
				'GET' => [
				'controller' => $loginController,
				'action' => 'logout'
				]
			],

			//pages
			'' => [
					'GET' => [
							'controller' => $Musiccontroller,
							'action' => 'home',
							
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
			'singleresult' => [
					'GET' => [
							'controller' => $Musiccontroller,
							'action' => 'singleresult'
					]
			],


		];

		return $routes;
	}

	public function getAuthentication(): \Ninja\Authentication {
		return $this->authentication;
	}
}
