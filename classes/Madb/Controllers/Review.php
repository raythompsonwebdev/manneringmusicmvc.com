<?php
namespace Madb\Controllers;
use \Ninja\DatabaseTable;
use \Ninja\Authentication;

class Review {
	private $authorsTable;
	private $reviewsTable;
	private $categoriesTable;
	private $authentication;

	public function __construct(DatabaseTable $reviewsTable, DatabaseTable $authorsTable, DatabaseTable $categoriesTable, Authentication $authentication) {
		$this->reviewsTable = $reviewsTable;
		$this->authorsTable = $authorsTable;
		$this->categoriesTable = $categoriesTable;
		$this->authentication = $authentication;
	}

	public function list() {

		$page = $_GET['page'] ?? 1;

		$offset = ($page-1)*10;

		if (isset($_GET['category'])) {
			$category = $this->categoriesTable->findById($_GET['category']);
			$reviews = $category->getReviews(10, $offset);
			$totalReviews = $category->getNumReviews();
		}
		else {
			$reviews = $this->reviewsTable->findAll('reviewdate DESC', 10, $offset);
			$totalReviews = $this->reviewsTable->total();
		}		

		$title = 'Review list';

		

		$author = $this->authentication->getUser();

		return ['template' => 'reviews.html.php', 
				'title' => $title, 
				'variables' => [
						'totalReviews' => $totalReviews,
						'reviews' => $reviews,
						'user' => $author,
						'categories' => $this->categoriesTable->findAll(),
						'currentPage' => $page,
						'categoryId' => $_GET['category'] ?? null
					]
				];
	}

	public function home() {
		$title = 'Internet Review Database';

		return ['template' => 'home.html.php', 'title' => $title];
	}

	
	public function delete() {

		$author = $this->authentication->getUser();

		$review = $this->reviewsTable->findById($_POST['id']);

		if ($review->authorId != $author->id && !$author->hasPermission(\Madb\Entity\Author::DELETE_REVIEWS) ) {
			return;
		}
		

		$this->reviewsTable->delete($_POST['id']);

		header('location: /review/list'); 
	}

	public function saveEdit() {
		$author = $this->authentication->getUser();

		$review = $_POST['review'];
		$review['reviewdate'] = new \DateTime();

		$reviewEntity = $author->addReview($review);

		$reviewEntity->clearCategories();

		foreach ($_POST['category'] as $categoryId) {
			$reviewEntity->addCategory($categoryId);
		}

		header('location: /review/list'); 
	}

	public function edit() {
		$author = $this->authentication->getUser();
		$categories = $this->categoriesTable->findAll();

		if (isset($_GET['id'])) {
			$review = $this->reviewsTable->findById($_GET['id']);
		}

		$title = 'Edit review';

		return ['template' => 'editreview.html.php',
				'title' => $title,
				'variables' => [
						'review' => $review ?? null,
						'user' => $author,
						'categories' => $categories
					]
				];
	}
	
}