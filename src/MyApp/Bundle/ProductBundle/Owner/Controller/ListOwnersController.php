<?php

namespace MyApp\Bundle\ProductBundle\Owner\Controller;

use MyApp\Component\Product\Application\CommandHandlers\Owner\ListOwners;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ListOwnersController extends Controller
{
    public function execute()
    {
        try {
            $repository = $this->getDoctrine()->getRepository('ProductBundle:Owner');
            $handler = new ListOwners($repository);
        } catch (\Exception $ex) {
            throw new HttpException(500, json_encode(['error' => 'Error']));
        }
        return new JsonResponse($handler->__invoke());
    }
}
