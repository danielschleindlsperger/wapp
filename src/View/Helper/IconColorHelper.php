<?php

namespace App\View\Helper;

use Cake\View\Helper;

class IconColorHelper extends Helper
{
    public function getColor($projects)
    {
        $stopped = 0;
        $began = 0;
        $planned = 0;
        $cancelled = 0;
        $completed = 0;
        foreach ($projects as $project) {
            if ($project->status === 'stopped') {
                ++$stopped;
            }
            if ($project->status === 'began') {
                ++$began;
            }
            if ($project->status === 'planned') {
                ++$planned;
            }
            if ($project->status === 'cancelled') {
                ++$cancelled;
            }
            if ($project->status === 'completed') {
                ++$completed;
            }
        }
        if ($stopped > 0) {
            return 'red';
        }
        if ($began > 0 && $stopped === 0) {
            return 'yellow';
        }
        if ($planned > 0 && $stopped + $began === 0) {
            return 'blue';
        }
        if ($completed > 0 && $stopped + $began + $planned === 0) {
            return 'green';
        }
        if ($cancelled > 0 && $stopped + $began + $planned + $completed === 0) {
            return 'black';
        } else {
            return 'gray';
        }
    }
}
