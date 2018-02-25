<?php

namespace MyApp\Bundle\ProductBundle\Product\Controller;

use MyApp\Component\Product\Application\CommandHandlers\Product\UpdateProduct;
use MyApp\Component\Product\Application\Commands\Product\UpdateProductCommand;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UpdateProductController extends Controller
{
    public function execute(Request $request, $id)
    {
        $json = json_decode($request->getContent(), true);
        $command = new UpdateProductCommand($id, $json['name'], $json['price'], $json['description']);
        $handler = new UpdateProduct($this->getDoctrine()->getRepository('ProductBundle:Product'));
        $handler->__invoke($command);
        return new Response('', 200);
    }
}
