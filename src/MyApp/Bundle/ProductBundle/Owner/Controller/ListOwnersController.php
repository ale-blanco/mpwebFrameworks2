<?php

namespace MyApp\Bundle\ProductBundle\Owner\Controller;

use MyApp\Component\Product\Application\CommandHandlers\ListOwners;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class ListOwnersController extends Controller
{
    public function execute()
    {
        $repository = $this->getDoctrine()->getRepository('ProductBundle:Owner');
        $handler = new ListOwners($repository);
        return new JsonResponse($handler->__invoke());
    }
}
