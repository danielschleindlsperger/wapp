<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ProjectsTable extends Table
{
    public function initialize(array $config)
    {
        $this->hasOne('Clients');
    }

    public function validationDefault(Validator $validator)
    {
        return $validator
            ->requirePresence('project_name')
            ->notEmpty('project_name', 'A project name is required')
            ->requirePresence('start_date')
            ->notEmpty('start_date', 'A start date is required')
            ->add('start_date', 'date', [
                'rule' => ['date', 'dmy'],
                'message' => 'Start date has to be in a date format',
            ])
            ->requirePresence('end_date')
            ->notEmpty('end_date', 'An end date is required')
            ->add('end_date', 'date', [
                'rule' => ['date', 'dmy'],
                'message' => 'End date has to be in a date format',
            ])
            ->requirePresence('internal_cost')
            ->notEmpty('internal_cost', 'Internal cost is required')
            ->requirePresence('contract_amount')
            ->notEmpty('contract_amount', 'Internal cost is required');
    }
}
