<?php

namespace App\View\Helper;

use Cake\View\Helper;

class DashboardHelper extends Helper
{
  public function getTopClientsByProjectNumber($clients){
    $clientCount = [];
    foreach ($clients as $client){
      $temp = [];
      array_push($temp, $client->client_name);
      array_push($temp, count($client->projects));

      array_push($clientCount, $temp);
    }
    return $clientCount;
  }
}
