<?php

namespace School\Controller;

use Quantox\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class StudentController extends BaseController
{
    public function index()
    {
        ob_start();

        print('Go to /students/{id} URL. You can pick 1, 2, 3 or 4 as ID for test purpose.');
        print('<br/>Students 1 and 3 are CSM, students 2 and 4 are CSMB.');

        return new Response(ob_get_clean());
    }

    public function get(Request $request, int $id)
    {
        ob_start();

        $student = $this->container->get('student_repository')->findById($id);
        
        $this->container->get('student_report_service')->execute($student);

        return new Response(ob_get_clean());
    }
}
