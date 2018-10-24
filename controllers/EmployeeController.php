<?php
namespace Controller;
use Model\Entity\Employee;

class EmployeeController
{
    protected $em;
  
    public function __construct() {
        $this->em = require_once('./config/entityManager.php');
    }

    public function getAll() {
        $employeeRepo = $this->em->getRepository(Employee::class);
        $emArray = $employeeRepo->findAll();
        return $emArray;
    }

    public function getOne($id) {
        $employeeRepo = $this->em->getRepository(Employee::class);
        $employee = $employeeRepo->find($id);
    }

    public function create() {
        $employee = new Employee();
        // FORM 
    }
    
}