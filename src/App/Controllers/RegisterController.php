<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\ValidatorServices;


class RegisterController
{

  public function __construct(private TemplateEngine $view, private ValidatorServices $validatorServices)
  {
  }

  public function  register()
  {

    echo $this->view->render("/register.php");
  }

  public function registerData()
  {
    $this->validatorServices->validateRegister($_POST);
  }
}
