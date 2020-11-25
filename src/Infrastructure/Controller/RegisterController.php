<?php

namespace App\Infrastructure\Controller;

use App\Domain\User\UseCase\Register\Register;
use App\Domain\User\UseCase\Register\RegisterRequest;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class RegisterController
{
    public function __invoke(Request $request, Register $register, NormalizerInterface $normalizer)
    {
        $registerRequest = new RegisterRequest($request->request->get('username'), $request->request->get('email'), $request->request->get('password'));
        $response = $register->execute($registerRequest);

        return new JsonResponse($normalizer->normalize($response->user));
    }
}
