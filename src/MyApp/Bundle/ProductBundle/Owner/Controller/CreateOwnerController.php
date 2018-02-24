<?php

namespace MyApp\Bundle\ProductBundle\Owner\Controller;

use MyApp\Component\Product\Application\CommandHandlers\CreateOwner;
use MyApp\Component\Product\Application\Commands\Owner\CreateOwnerCommand;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateOwnerController extends Controller
{
    public function execute(Request $request)
    {
        $json = json_decode($request->getContent(), true);
        $command = new CreateOwnerCommand((string)$json['name']);
        $repository = $this->getDoctrine()->getManager()->getRepository('ProductBundle:Owner');
        $handler = new CreateOwner($repository);
        $handler->__invoke($command);
        return new Response('', 201);
    }
}
