<?php

namespace School\Controller;

use Quantox\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SchoolController extends BaseController
{
    public function index(Request $request)
    {
        ob_start();

        $student = $this->container->get('student_repository')->findById(2);

        print(json_encode($student));

        return new Response(ob_get_clean());
    }
}
