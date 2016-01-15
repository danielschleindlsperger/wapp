<?php

namespace App\View\Helper;

use Cake\View\Helper;

class DashboardHelper extends Helper
{
  public function getTopClientsByProjectNumber($clients){
    $orderedClients = [];
    foreach ($clients as $client){
      $temp = [];

      $temp['client_name'] = $client->client_name;
      $temp['id'] = $client->id;

      // Count projects
      $projectsCount = 0;
      foreach($client->projects as $project){
        $projectsCount++;
      }

      $temp['NumberOfProjects'] = $projectsCount;

      array_push($orderedClients, $temp);
    }

    usort($orderedClients, function($a, $b) {
    return $b['NumberOfProjects'] - $a['NumberOfProjects'];
    });

    if(count($orderedClients, 0) < 5){
      return $orderedClients;
    }else{
      $returnArray = [];

      for($i=0;$i<=4;$i++){
        $returnArray[$i] = $orderedClients[$i];
      }
      return $returnArray;
    }
  }

  public function getTopClientsBySales($clients){
    $orderedClients = [];
    foreach ($clients as $client){
      $temp = [];

      $temp['client_name'] = $client->client_name;
      $temp['id'] = $client->id;

      // Count sales
      $sales = 0;
      foreach($client->projects as $project){
        $sales+= $project->contract_amount;
      }

      $temp['sales'] = $sales;

      $orderedClients[] = $temp;

    }

    usort($orderedClients, function($a, $b) {
    return $b['sales'] - $a['sales'];
    });

    if(count($orderedClients, 0) < 5){
      return $orderedClients;
    }else{
      $returnArray = [];

      for($i=0;$i<=4;$i++){
        $returnArray[$i] = $orderedClients[$i];
      }
      return $returnArray;
    }
  }

  public function getTopRunningProjects($projects){
    $orderedProjects = array();
    foreach ($projects as $project){
      if($project->status === 'began'){
        $temp = array();

        $temp['project_name'] = $project->project_name;
        $temp['id'] = $project->id;

        $temp['sales'] = $project->contract_amount;

        $orderedProjects[] = $temp;
      }
    }

    usort($orderedProjects, function($a, $b) {
    return $b['sales'] - $a['sales'];
    });
    if(count($orderedProjects) < 4){
      return $orderedProjects;
    }else{
      $returnArray = [];

      for($i=0;$i<=4;$i++){
        $returnArray[$i] = $orderedProjects[$i];
      }
      return $returnArray;
    }
  }

  public function getTopStoppedProjects($projects){
    $orderedProjects = array();
    foreach ($projects as $project){
      if($project->status === 'stopped'){
        $temp = array();

        $temp['project_name'] = $project->project_name;
        $temp['id'] = $project->id;

        $temp['sales'] = $project->contract_amount;

        $orderedProjects[] = $temp;
      }
    }

    usort($orderedProjects, function($a, $b) {
    return $b['sales'] - $a['sales'];
    });
    if(count($orderedProjects) < 4){
      return $orderedProjects;
    }else{
      $returnArray = [];

      for($i=0;$i<=4;$i++){
        $returnArray[$i] = $orderedProjects[$i];
      }
      return $returnArray;
    }
  }

  public function getTopPlannedProjects($projects){
    $orderedProjects = array();
    foreach ($projects as $project){
      if($project->status === 'planned'){
        $temp = array();

        $temp['project_name'] = $project->project_name;
        $temp['id'] = $project->id;

        $temp['sales'] = $project->contract_amount;

        $orderedProjects[] = $temp;
      }
    }

    usort($orderedProjects, function($a, $b) {
    return $b['sales'] - $a['sales'];
    });
    if(count($orderedProjects) < 4){
      return $orderedProjects;
    }else{
      $returnArray = [];

      for($i=0;$i<=4;$i++){
        $returnArray[$i] = $orderedProjects[$i];
      }
      return $returnArray;
    }
  }
}
