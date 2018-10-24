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
}