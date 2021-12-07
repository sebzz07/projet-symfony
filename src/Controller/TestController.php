<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController
{
    /**
     * @Route("/", name="index", methods={"GET", "POST"}, host="localhost", schemes={"https", "http"})
     **/
    public function index()
    {
        dd("Ca fonctionne");
    }

    /**
     * @Route("/test/{age<\d+>?0}", name="test", methods={"GET", "POST"}, host="localhost", schemes={"https", "http"})
     **/
    public function test(Request $request, $age)
    {

        //dd($request);
        //$age = $request->attributes->get('age', 0);

        return new Response("vous avez $age ans");
    }
}
