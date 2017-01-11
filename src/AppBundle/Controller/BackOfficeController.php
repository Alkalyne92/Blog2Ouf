<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BackOfficeController extends Controller
{

    /**
    * @Route("/backoffice", name="backoffice")
    */
    public function backofficeAction(Request $request)
    {
      return $this->render('backoffice/index.html.twig');
    }
}
