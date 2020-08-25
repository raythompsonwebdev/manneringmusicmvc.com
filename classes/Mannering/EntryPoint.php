<?php
namespace Mannering;

class EntryPoint
{
    private $route;
    private $method;
    private $routes;

    public function __construct(string $route, string $method, \Mannering\Routes $routes)
    {
        $this->route = $route;
        $this->routes = $routes;
        $this->method = $method;
        $this->checkUrl();
    }

    //check if url entered by user is lowercase if not convert to lowercase.
    private function checkUrl()
    {
        if ($this->route !== strtolower($this->route)) {
            http_response_code(301); //send redirect response code
            header('location: ' . strtolower($this->route)); //re-direct page
        }
    }

     //load page template to index,php.
    private function loadTemplate($templateFileName, $variables = [])
    {
        extract($variables);

        ob_start();
        include  __DIR__ . '/../../templates/' . $templateFileName;

        return ob_get_clean();
    }

    public function run()
    {

        $routes = $this->routes->getRoutes();

        $authentication = $this->routes->getAuthentication();

        if (isset($routes[$this->route]['login']) && !$authentication->isLoggedIn()) {
            header('location: /login/error');
        } elseif (isset($routes[$this->route]['permissions']) && !$this->routes->checkPermission($routes[$this->route]['permissions'])) {
            header('location: /login/permissionserror');
        } else {
            $controller = $routes[$this->route][$this->method]['controller'];
            $action = $routes[$this->route][$this->method]['action'];
            $page = $controller->$action();

            $title = $page['title'];

            if (isset($page['variables'])) {
                $output = $this->loadTemplate($page['template'], $page['variables']);
            } else {
                $output = $this->loadTemplate($page['template']);
            }

            echo $this->loadTemplate('layout.html.php', ['loggedIn' => $authentication->isLoggedIn(),
                                                         'output' => $output,
                                                         'title' => $title
                                                        ]);
        }
    }
}
