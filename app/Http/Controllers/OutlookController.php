<?php

namespace App\Http\Controllers;

use Microsoft\Graph\Graph;
use Microsoft\Graph\Model;
use App\Http\Controllers\Controller;

class OutlookController extends Controller
{
  public function mail()
  {
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  $tokenCache = new \App\TokenStore\TokenCache;

  $graph = new Graph();
  $graph->setAccessToken($tokenCache->getAccessToken());

  $user = $graph->createRequest('GET', '/me')
                ->setReturnType(Model\User::class)
                ->execute();

  echo 'User: '.$user->getDisplayName().' - '.$user->getMail();
  }

}
