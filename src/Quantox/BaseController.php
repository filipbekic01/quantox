<?php

namespace Quantox;

class BaseController
{
    protected $container;

    /**
     * I don't really have time to investigate how to inject
     * container into framework, so i will just call a global
     * for testing purpose. It works!
     * 
     * I think i can just make custom controller resolver and
     * pass container inside framework instance.
     */

    public function __construct()
    {
        global $container;

        $this->container = $container;
    }
}
