<?php
namespace Ijdb;

class IjdbRoutes implements \Ninja\Routes
{

    public function getRoutes()
    {
        
        include __DIR__ . '/../../includes/DatabaseConnection.php';
        
        $albumsTable = new \Ninja\DatabaseTable($pdo, 'album', 'albumid');
        $artistsTable = new \Ninja\DatabaseTable($pdo, 'artist', 'id');
        $usersTable = new \Ninja\DatabaseTable($pdo, 'users', 'userid');

        $Musiccontroller = new \Ijdb\Controllers\Music($albumsTable, $artistsTable);
        $usersController = new \Ijdb\Controllers\Register($usersTable);
        
        
                $routes = [

                        'users/register' => [
                                'GET' => [
                                        'controller' => $usersController,
                                        'action' => 'registrationForm'
                                ],
                                'POST' => [
                                        'controller' => $usersController,
                                        'action' => 'registerUser'
                                ]
                        ],
                        'users/success' => [
                                'GET' => [
                                        'controller' => $usersController,
                                        'action' => 'success'
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
                        ]
                ];

                return $routes;
    }
}
