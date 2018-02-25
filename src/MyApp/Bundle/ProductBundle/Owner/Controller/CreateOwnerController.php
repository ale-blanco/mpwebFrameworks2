<?php

namespace MyApp\Bundle\ProductBundle\Owner\Controller;

use MyApp\Component\Product\Application\CommandHandlers\Owner\CreateOwner;
use MyApp\Component\Product\Application\Commands\Owner\CreateOwnerCommand;
use MyApp\Component\Product\Domain\Exception\ValidationException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CreateOwnerController extends Controller
{
    public function execute(Request $request)
    {
        try {
            $json = json_decode($request->getContent(), true);
            $command = new CreateOwnerCommand((string)$json['name'] ?? '');
            $repository = $this->getDoctrine()->getManager()->getRepository('ProductBundle:Owner');
            $handler = new CreateOwner($repository);
            $handler->__invoke($command);
        } catch (ValidationException $ex) {
            throw new HttpException(400, json_encode(['error' => $ex->getMessage()]));
        } catch (\Exception $ex) {
            throw new HttpException(500, json_encode(['error' => 'Error']));
        }
        return new Response('', 201);
    }
}
