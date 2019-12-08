<?php
namespace Ijdb;
class IjdbRoutes implements \Ninja\Routes{
	private $albumsTable;
	private $reviewsTable;
	private $authorsTable;
	private $artistsTable;
	private $audioTable;
	private $categoriesTable;
	private $reviewsCategoriesTable;
	private $authentication;

	public function __construct(){
			
		include __DIR__ . '/../../includes/DatabaseConnection.php';

		$this->albumsTable = new \Ninja\DatabaseTable($pdo, 'album', 'albumid', '\Ijdb\Entity\Album', [&$this->artistsTable, &$this->audioTable] );

		$this->reviewsTable = new \Ninja\DatabaseTable($pdo, 'reviews', 'reviewsId', '\Ijdb\Entity\Review',	[&$this->authorsTable, &$this->reviewsCategoriesTable]);

		$this->authorsTable = new \Ninja\DatabaseTable($pdo, 'author', 'authorId', '\Ijdb\Entity\Author', [&$this->reviewsTable]);

		$this->artistsTable = new \Ninja\DatabaseTable($pdo, 'artist', 'id', '\Ijdb\Entity\Artist', [&$this->albumsTable, &$this->audioTable]);

		$this->audioTable = new \Ninja\DatabaseTable($pdo, 'audio', 'audioid', '\Ijdb\Entity\Audio', [&$this->albumsTable, &$this->artistsTable]);

		$this->categoriesTable = new \Ninja\DatabaseTable($pdo, 'categories', 'categoriesId', '\Ijdb\Entity\Category', [&$this->reviewsTable, &$this->reviewsCategoriesTable]);

 		$this->reviewsCategoriesTable = new \Ninja\DatabaseTable($pdo, 'reviews_categories', 'categoriesId');

		$this->authentication = new \Ninja\Authentication($this->authorsTable, 'email', 'password');
	}
	public function getRoutes(): array{
			
		$musicController = new \Ijdb\Controllers\Music($this->albumsTable,  $this->artistsTable, $this->audioTable, $this->authorsTable, $this->reviewsTable, $this->categoriesTable, $this->authentication);

		$authorController = new \Ijdb\Controllers\Register($this->authorsTable);
		
		$loginController = new \Ijdb\Controllers\Login($this->authentication);

		$categoryController = new \Ijdb\Controllers\Category($this->categoriesTable);
						
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
							'controller' => $musicController,
							'action' => 'saveEdit'
					],
					'GET' => [
							'controller' => $musicController,
							'action' => 'edit'
					],
					'login' => true
					
			],
			'deletereviews' => [
					'POST' => [
							'controller' => $musicController,
							'action' => 'delete'
					],
					'login' => true
			],
			'reviews' => [
					'GET' => [
							'controller' => $musicController,
							'action' => 'reviewslist'
					],
					'login' => true
			],

			//login 
			'loginerror' => [
				'GET' => [
					'controller' => $loginController,
					'action' => 'error'
				]
			],
			'login/permissionserror' => [
				'GET' => [
					'controller' => $loginController,
					'action' => 'permissionsError'
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

				//Permissions

				'permissions' => [
						'GET' => [
						'controller' => $authorController,
						'action' => 'permissions'
					],
						'POST' => [
						'controller' => $authorController,
						'action' => 'savePermissions'
					],
					'login' => true
				],

				'list' => [
					'GET' => [
						'controller' => $authorController,
						'action' => 'list'
					],
					'login' => true,
					'permissions' => \Ijdb\Entity\Author::EDIT_USER_ACCESS
				],

			//categories
			'editcategories' => [
				'POST' => [
					'controller' => $categoryController,
					'action' => 'saveEdit'
				],
				'GET' => [
					'controller' => $categoryController,
					'action' => 'edit'
				],
				'login' => true,
				'permissions' => \Ijdb\Entity\Author::EDIT_CATEGORIES
			],
			'deletecategories' => [
				'POST' => [
					'controller' => $categoryController,
					'action' => 'delete'
				],
				'login' => true,
				'permissions' => \Ijdb\Entity\Author::REMOVE_CATEGORIES
			],
			'list' => [
				'GET' => [
					'controller' => $categoryController,
					'action' => 'list'
				],
				'login' => true,
				'permissions' => \Ijdb\Entity\Author::EDIT_CATEGORIES
			],

			//pages
			'' => [
					'GET' => [
							'controller' => $musicController,
							'action' => 'home',
							
					]
					
			],
			'about' => [
					'GET' => [
							'controller' => $musicController,
							'action' => 'about'
					]
			],
			'search' => [
					'GET' => [
							'controller' => $musicController,
							'action' => 'search'
					]
			],
			'video' => [
					'GET' => [
							'controller' => $musicController,
							'action' => 'video'
					]
			],
			'contact' => [
					'GET' => [
							'controller' => $musicController,
							'action' => 'contact'
					]
			],
			'singleresult' => [
					'GET' => [
							'controller' => $musicController,
							'action' => 'singleresult'
					]
			],


		];

		return $routes;
	}

	public function getAuthentication(): \Ninja\Authentication {
		return $this->authentication;
	}

	public function checkPermission($permission): bool {
		$user = $this->authentication->getUser();
		if ($user && $user->hasPermission($permission)) {
		return true;
		} else {
		return false;
		}
	}
}
