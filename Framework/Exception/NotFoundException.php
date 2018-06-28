<?php
namespace App\Framework\Exception;


class NotFoundException extends \Exception{
  protected $message = "Page introuvable";
}
