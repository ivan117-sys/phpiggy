<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\{ValidatorServices, UserService};


class RegisterController
{

  public function __construct(private TemplateEngine $view, private ValidatorServices $validatorServices, private UserService $userService)
  {
  }

  public function  register()
  {

    echo $this->view->render("/register.php");
  }

  public function registerData()
  {
    $this->validatorServices->validateRegister($_POST);

    $this->userService->isEmailTaken($_POST['email']);

    $this->userService->registerUser($_POST);

    redirectTo('/');
  }

  public function  login()
  {

    echo $this->view->render("/login.php");
  }

  public function loginData()
  {
    $this->validatorServices->validateLogin($_POST);

    $this->userService->login($_POST);

    redirectTo('/');
  }

  public function logout()
  {
    $this->userService->logout();

    redirectTo('/login');
  }
}
