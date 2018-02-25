<?php

namespace MyApp\Bundle\ProductBundle\Product\Controller;

use MyApp\Component\Product\Application\CommandHandlers\Product\DeleteProduct;
use MyApp\Component\Product\Application\Commands\Product\DeleteProductCommand;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class DeleteProductController extends Controller
{
    public function execute($id)
    {
        try {
            $command = new DeleteProductCommand($id);
            $handler = new DeleteProduct($this->getDoctrine()->getRepository('ProductBundle:Product'));
            $handler->__invoke($command);
        } catch (\Exception $ex) {
            throw new HttpException(500, json_encode(['error' => 'Error']));
        }
        return new Response('', 200);
    }
}
