<?php

namespace MyApp\Bundle\ProductBundle\Product\Controller;

use MyApp\Component\Product\Application\CommandHandlers\Product\ListProducts;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class ListProductsController extends Controller
{
    public function execute()
    {
        $handler = new ListProducts($this->getDoctrine()->getRepository('\MyApp\Component\Product\Domain\Product'));
        $productsAsArray = $handler->__invoke();
        return new JsonResponse($productsAsArray);
    }
}
