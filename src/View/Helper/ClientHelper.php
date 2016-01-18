<?php

namespace App\View\Helper;

use Cake\View\Helper;

class ClientHelper extends Helper
{
  // Return adress as string from client data
  public function getAddressString($client){
    return '<span class="address-element">'.$client->street.' '.$client->street_number.'</span>'.'&nbsp;&nbsp;'.
    '<span class="address-element">'.$client->area_code.' '.$client->city.'</span>';
  }
}
