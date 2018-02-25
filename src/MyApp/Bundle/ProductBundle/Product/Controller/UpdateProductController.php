<?php

namespace MyApp\Bundle\ProductBundle\Product\Controller;

use MyApp\Component\Product\Application\CommandHandlers\Product\UpdateProduct;
use MyApp\Component\Product\Application\Commands\Product\UpdateProductCommand;
use MyApp\Component\Product\Domain\Exception\ValidationException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class UpdateProductController extends Controller
{
    public function execute(Request $request, $id)
    {
        try {
            $json = json_decode($request->getContent(), true);
            $command = new UpdateProductCommand(
                $id,
                $json['name'] ?? '',
                $json['price'] ?? 0,
                $json['description'] ?? ''
            );
            $handler = new UpdateProduct($this->getDoctrine()->getRepository('ProductBundle:Product'));
            $handler->__invoke($command);
        } catch (ValidationException $ex) {
            throw new HttpException(400, json_encode(['error' => $ex->getMessage()]));
        } catch (\Exception $ex) {
            throw new HttpException(500, json_encode(['error' => 'Error']));
        }
        return new Response('', 200);
    }
}
