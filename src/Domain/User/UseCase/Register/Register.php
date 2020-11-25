<?php

namespace App\Domain\User\UseCase\Register;

use App\Domain\User\Entity\User;
use App\Domain\User\Exception\RegisterFailedException;
use App\Domain\User\Repository\UserRepositoryInterface;
use App\Domain\User\Validator\RegisterValidatorInterface;

class Register
{
    private UserRepositoryInterface $userRepository;

    private RegisterValidatorInterface $registerValidator;

    public function __construct(UserRepositoryInterface $userRepository, RegisterValidatorInterface $registerValidator)
    {
        $this->userRepository = $userRepository;
        $this->registerValidator = $registerValidator;
    }

    public function execute(RegisterRequest $request): RegisterResponse
    {
        $response = new RegisterResponse();
        $this->validate($request, $response);

        if (empty($response->errors)) {
            $this->register($request, $response);
        }

        return $response;
    }

    private function register(RegisterRequest $request, RegisterResponse $response): void
    {
        $user = new User($request->username, $request->email, $request->password);
        $user = $this->userRepository->addUser($user);

        if (!$user || empty($user->getUuid())) {
            throw new RegisterFailedException();
        }

        $response->user = $user;
    }

    private function validate(RegisterRequest $request, RegisterResponse $response)
    {
        $violations = $this->registerValidator->validate($request);
        foreach ($violations as $key => $violation) {
            $response->errors[$key] = $violation;
        }
        $this->checkDuplication($request, $response);
    }

    private function checkDuplication(RegisterRequest $request, RegisterResponse $response)
    {
        $duplicate = $this->userRepository->getUserByEmail($request->email);
        if (!empty($duplicate)) {
            $response->errors['email'] = sprintf("Email %s already exists", $request->email);
        }
    }

    /**
     * Pure implementation of concept
     */
//    public function execute(RegisterRequest $request, RegisterPresenterInterface $presenter): RegisterResponse
//    {
//        $response = new RegisterResponse();
//        $this->validate($request, $response);
//
//        if (empty($response->errors)) {
//            $this->register($request, $response);
//        }
//
//        $presenter->present($response);
//    }
}
