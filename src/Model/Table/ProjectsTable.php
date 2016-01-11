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
            ->requirePresence('end_date')
            ->notEmpty('end_date', 'An end date is required')
            ->requirePresence('internal_cost')
            ->notEmpty('internal_cost', 'Internal cost is required')
            ->requirePresence('contract_amount')
            ->notEmpty('contract_amount', 'First name is required')
            ->requirePresence('contact_first_name')
            ->notEmpty('contact_first_name', 'First name is required')
            ->requirePresence('contact_last_name')
            ->notEmpty('contact_last_name', 'Last name is required')
            ->requirePresence('contact_email')
            ->notEmpty('contact_email', 'Contact email is required')
            ->requirePresence('contact_phone')
            ->notEmpty('contact_phone', 'Contact phone numer is required')
            ->requirePresence('contact_fax')
            ->notEmpty('contact_fax', 'Contact fax number is required');
    }
}
