<?php
namespace Madb;

class MadbRoutes implements \Ninja\Routes {

	private $albumsTable;
	private $artistsTable;
	private $audioTable;
		
	private $authorsTable;
	private $reviewsTable;
	private $categoriesTable;
	private $reviewCategoriesTable;
	private $authentication;

	public function __construct() {
		include __DIR__ . '/../../includes/DatabaseConnection.php';

		//Music
		$this->albumsTable = new \Ninja\DatabaseTable($pdo, 'album', 'albumid', '\Madb\Entity\Album', [&$this->artistsTable, &$this->audioTable]);

		$this->artistsTable = new \Ninja\DatabaseTable($pdo, 'artist', 'id', '\Madb\Entity\Artist', [&$this->albumsTable, &$this->audioTable]);

		$this->audioTable = new \Ninja\DatabaseTable($pdo, 'audio', 'audioid', '\Madb\Entity\Audio', [&$this->albumsTable, &$this->artistsTable]);



		$this->reviewsTable = new \Ninja\DatabaseTable($pdo, 'review', 'id', '\Madb\Entity\Review', [&$this->authorsTable, &$this->reviewCategoriesTable]);

		 $this->authorsTable = new \Ninja\DatabaseTable($pdo, 'author', 'id', '\Madb\Entity\Author', [&$this->reviewsTable]);
		 
		 $this->categoriesTable = new \Ninja\DatabaseTable($pdo, 'category', 'id', '\Madb\Entity\Category', [&$this->reviewsTable, &$this->reviewCategoriesTable]);
		 
 		$this->reviewCategoriesTable = new \Ninja\DatabaseTable($pdo, 'review_category', 'categoryId');
		$this->authentication = new \Ninja\Authentication($this->authorsTable, 'email', 'password');
	}

	public function getRoutes(): array {

		//Music
		$musicController = new \Madb\Controllers\Music($this->albumsTable, $this->artistsTable, $this->audioTable);

		$reviewController = new \Madb\Controllers\Review($this->reviewsTable, $this->authorsTable, $this->categoriesTable, $this->authentication);

		$authorController = new \Madb\Controllers\Register($this->authorsTable);

		$loginController = new \Madb\Controllers\Login($this->authentication);
		
		$categoryController = new \Madb\Controllers\Category($this->categoriesTable);

		$routes = [
			'author/register' => [
				'GET' => [
					'controller' => $authorController,
					'action' => 'registrationForm'
				],
				'POST' => [
					'controller' => $authorController,
					'action' => 'registerUser'
				]
			],
			'author/success' => [
				'GET' => [
					'controller' => $authorController,
					'action' => 'success'
				]
			],
			'author/permissions' => [
				'GET' => [
					'controller' => $authorController,
					'action' => 'permissions'
				],
				'POST' => [
					'controller' => $authorController,
					'action' => 'savePermissions'
				],
				'login' => true,
				'permissions' => \Madb\Entity\Author::EDIT_USER_ACCESS
			],
			'author/list' => [
				'GET' => [
					'controller' => $authorController,
					'action' => 'list'
				],
				'login' => true,
				'permissions' => \Madb\Entity\Author::EDIT_USER_ACCESS
			],

			'review/edit' => [
				'POST' => [
					'controller' => $reviewController,
					'action' => 'saveEdit'
				],
				'GET' => [
					'controller' => $reviewController,
					'action' => 'edit'
				],
				'login' => true
			],
			'review/delete' => [
				'POST' => [
					'controller' => $reviewController,
					'action' => 'delete'
				],
				'login' => true
			],
			'review/list' => [
				'GET' => [
					'controller' => $reviewController,
					'action' => 'list'
				]
			],


			'login/error' => [
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
			'login/success' => [
				'GET' => [
					'controller' => $loginController,
					'action' => 'success'
				]
			],
			'logout' => [
				'GET' => [
					'controller' => $loginController,
					'action' => 'logout'
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
			
			'category/edit' => [
				'POST' => [
					'controller' => $categoryController,
					'action' => 'saveEdit'
				],
				'GET' => [
					'controller' => $categoryController,
					'action' => 'edit'
				],
				'login' => true,
				'permissions' => \Madb\Entity\Author::EDIT_CATEGORIES
			],
			'category/delete' => [
				'POST' => [
					'controller' => $categoryController,
					'action' => 'delete'
				],
				'login' => true,
				'permissions' => \Madb\Entity\Author::REMOVE_CATEGORIES
			],
			'category/list' => [
				'GET' => [
					'controller' => $categoryController,
					'action' => 'list'
				],
				'login' => true,
				'permissions' => \Madb\Entity\Author::EDIT_CATEGORIES
			],
			
			//pages
				'' => [
					'GET' => [
									//'controller' => $reviewController,
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