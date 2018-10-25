<?php
namespace Controller;
use Model\TemplateModel as Template;

class RouteController
{
    public function home() {
        $template = new Template;
        $template->load(__FUNCTION__);
    }

    static public function employeesList() {
        $template = new Template;
        $template->load(__FUNCTION__);
    }
    static public function employee($id) {
        $employee = new employeeController;
        $employee->getOne($id);
    }

    public function delete($id) {
        $entityManager = $this->em;
        $employeeRepo = $entityManager->getRepository(Employee::class);
        $employee = $employeeRepo->find($id);
        $entityManager->remove($employee);
        $entityManager->flush($employee);
    }

    public function create() {
        // wait for form data
        $newEmployee = new Employee();
        $newEmployee->setFirstname("Testez5");
        $newEmployee->setLastname("Allo");
        $newEmployee->setRole("Collabo");
        $this->em->persist($newEmployee);
        $this->em->flush();
    }
}