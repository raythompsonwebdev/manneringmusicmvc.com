<?php
namespace Ijdb\Controllers;

class Category {
	
	private $categoriesTable;

	public function __construct(\Ninja\DatabaseTable $categoriesTable) {
		$this->categoriesTable = $categoriesTable;
	}

	public function edit() {

		//$author = $this->authentication->getUser();
		//$categories = $this->categoriesTable->findAll();

		if (isset($_GET['categoriesId'])) {

			$category = $this->categoriesTable->findById($_GET['categoriesId']);
		}

		$title = 'Edit Category';

		return ['template' => 'editcategory.html.php',
				'title' => $title,
				'variables' => [
					'category' => $category ?? null
				]
		];
	}

	public function saveEdit() {

		$category = $_POST['categories'];

		$this->categoriesTable->save($category);

		header('location: /list');
	}

	public function list() {

		$categories = $this->categoriesTable->findAll();

		$title = 'Reviews Categories';

		return ['template' => 'categories.html.php', 
			'title' => $title, 
			'variables' => [
			    'categories' => $categories
			  ]
		];
	}

	public function delete() {

		$this->categoriesTable->delete($_POST['id']);

		header('location: /list'); 
	}
}