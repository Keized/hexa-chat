<?php

namespace App\UI\Presenter\Register;

use App\Domain\User\UseCase\Register\RegisterPresenterInterface;
use App\Domain\User\UseCase\Register\RegisterResponse;

class RegisterJsonPresenter implements RegisterPresenterInterface
{
    private RegisterJsonViewModel $viewModel;

    public function present(RegisterResponse $response): void
    {
        $this->viewModel = new RegisterJsonViewModel();
        if (!empty($response->errors)) {
            $this->viewModel->notifications['errors'] = $response->errors;
        } else {
            $this->viewModel->notifications['data'] = $response->user;
        }
    }

    public function viewModel()
    {
        return $this->viewModel;
    }

}
