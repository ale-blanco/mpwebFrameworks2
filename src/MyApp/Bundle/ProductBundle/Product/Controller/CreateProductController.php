<?php

namespace MyApp\Bundle\ProductBundle\Product\Controller;

use MyApp\Component\Product\Application\CommandHandlers\Product\CreateProduct;
use MyApp\Component\Product\Application\Commands\Product\CreateProductCommand;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateProductController extends Controller
{

    public function execute(Request $request)
    {

        $json = json_decode($request->getContent(), true);
        $command = new CreateProductCommand($json['name'], $json['price'], $json['description'], $json['ownerId']);
        $handler = new CreateProduct(
            $this->getDoctrine()->getRepository('ProductBundle:Owner'),
            $this->getDoctrine()->getRepository('ProductBundle:Product')
        );
        $handler->__invoke($command);
        return new Response('', 201);

    }

}