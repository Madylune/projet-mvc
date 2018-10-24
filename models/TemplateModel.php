<?php
namespace Model;
require_once('vendor/autoload.php');
use Controller\EmployeeController;

class TemplateModel
{
    private $loader;
    private $twig;

    public function __construct() {
        $this->loader = new \Twig_Loader_Filesystem('views/templates');
        $this->twig = new \Twig_Environment($this->loader);
    }
      
    public function load($page) {
        switch($page) {
            case 'home':
                $template = $this->twig->loadTemplate('index.html');
                echo $template->render(array(
                    'page' => 'Home'
                )); 
            break;
            case 'employeesList':
                $employees = new EmployeeController;
                $employeesList = $employees->getAll();
                $template = $this->twig->loadTemplate('list.html');
                echo $template->render(array(
                    'page' => 'Employees\' list'
                    // Ajouter la liste des employés
                )); 
            break;
            default:
                echo 'No Page found';
        }

    }
}
