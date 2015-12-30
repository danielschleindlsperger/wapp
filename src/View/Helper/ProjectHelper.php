<?php

namespace App\View\Helper;

use Cake\View\Helper;

class ProjectHelper extends Helper
{
    public function getColor($projects)
    {
        $statuses = self::getProjectsByStatus($projects);

        if ($statuses['stopped'] > 0) {
            return 'red';
        }
        if ($statuses['began'] > 0 && $statuses['stopped'] === 0) {
            return 'yellow';
        }
        if ($statuses['planned'] > 0 && $statuses['stopped'] + $statuses['began'] === 0) {
            return 'blue';
        }
        if ($statuses['completed'] > 0 && $statuses['stopped'] + $statuses['began'] + $statuses['planned'] === 0) {
            return 'green';
        }
        if ($statuses['cancelled'] > 0 && $statuses['stopped'] + $statuses['began'] + $statuses['planned'] + $statuses['completed'] === 0) {
            return 'black';
        } else {
            return 'gray';
        }
    }
    public function getProjectsByStatus($projects)
    {
        $stopped = 0;
        $began = 0;
        $planned = 0;
        $cancelled = 0;
        $completed = 0;
        foreach ($projects as $project) {
            switch ($project->status) {
              case 'stopped':
                ++$stopped;
                break;
              case 'began':
                ++$began;
                break;
              case 'planned':
                ++$planned;
                break;
              case 'cancelled':
                ++$cancelled;
                break;
              case 'completed':
                ++$completed;
                break;
              default:
                throw new Exception('Error Processing Request', 1);
          }
        }

        return array(
        'stopped' => $stopped,
        'began' => $began,
        'planned' => $planned,
        'cancelled' => $cancelled,
        'completed' => $completed,
      );
    }
}
