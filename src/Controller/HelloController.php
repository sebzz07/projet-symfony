<?php

namespace App\Controller;

use App\Taxes\Calculator;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HelloController
{
    protected $logger;
    protected $calculator;

    public function __construct(LoggerInterface $logger, Calculator $calculator)
    {
        $this->logger = $logger;
        $this->calculator = $calculator;
    }
    /**
     * @Route("/hello/{prenom<[a-zA-Z]+>}", name="hello", methods={"GET"}, host="localhost", schemes={"https", "http"})
     **/
    public function hello(Request $request, $prenom = "World")
    {
        $this->logger->error("mon message de log");
        //dd($request);
        //$age = $request->attributes->get('age', 0);
        $prix = 100;
        $tva = $this->calculator->calcul($prix);


        return new Response("Hello $prenom, la tva de $prix euros est de $tva euros");
    }
}
