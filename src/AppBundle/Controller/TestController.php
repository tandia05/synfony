<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

Class TestController extends Controller
{

     /**
     * @Route("/test", name="testpage")
     */

      // la syntaxe (Request $request) equivaut a 
    // $request = nex request;
     public function testAction(Request $request)
     {
        $res = new Response('<html><head><body><p>Test reussi</p></body></head></html>');
        return $res;
     }
}
