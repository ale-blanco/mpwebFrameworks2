<?php

namespace MyApp\Bundle\ProductBundle\Product\Controller;

use MyApp\Component\Product\Application\CommandHandlers\Product\CreateProduct;
use MyApp\Component\Product\Application\Commands\Product\CreateProductCommand;
use MyApp\Component\Product\Domain\Exception\ValidationException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CreateProductController extends Controller
{

    public function execute(Request $request)
    {
        try {
            $json = json_decode($request->getContent(), true);
            $command = new CreateProductCommand(
                $json['name'] ?? '',
                $json['price'] ?? 0,
                $json['description'] ?? '',
                $json['ownerId'] ?? ''
            );
            $handler = new CreateProduct(
                $this->getDoctrine()->getRepository('ProductBundle:Owner'),
                $this->getDoctrine()->getRepository('ProductBundle:Product')
            );
            $handler->__invoke($command);
        } catch (ValidationException $ex) {
            throw new HttpException(400, json_encode(['error' => $ex->getMessage()]));
        } catch (\Exception $ex) {
            throw new HttpException(500, json_encode(['error' => 'Error']));
        }
        return new Response('', 201);
    }
}
