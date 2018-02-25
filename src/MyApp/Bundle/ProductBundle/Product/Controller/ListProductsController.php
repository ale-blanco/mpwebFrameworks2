<?php

namespace MyApp\Bundle\ProductBundle\Product\Controller;

use MyApp\Component\Product\Application\CommandHandlers\Product\ListProducts;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ListProductsController extends Controller
{
    public function execute()
    {
        try {
            $handler = new ListProducts($this->getDoctrine()->getRepository('\MyApp\Component\Product\Domain\Product'));
            $productsAsArray = $handler->__invoke();
        } catch (\Exception $ex) {
            throw new HttpException(500, json_encode(['error' => 'Error']));
        }
        return new JsonResponse($productsAsArray);
    }
}
