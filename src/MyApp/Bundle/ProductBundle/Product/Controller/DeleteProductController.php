<?php

namespace MyApp\Bundle\ProductBundle\Product\Controller;;

use MyApp\Component\Product\Application\CommandHandlers\Product\DeleteProduct;
use MyApp\Component\Product\Application\Commands\Product\DeleteProductCommand;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DeleteProductController extends Controller
{

    public function execute($id)
    {
        $command = new DeleteProductCommand($id);
        $handler = new DeleteProduct($this->getDoctrine()->getRepository('ProductBundle:Product'));
        $handler->__invoke($command);
        return new Response('', 200);
    }

}