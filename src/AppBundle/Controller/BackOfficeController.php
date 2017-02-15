<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Tests\Fixtures\Validation;

class BackOfficeController extends Controller
{

    /**
    * @Route("/admin", name="backoffice")
    */
    public function backofficeAction()
    {
      return new Response('<html><body>Admin page!</body></html>');
    }

    }
