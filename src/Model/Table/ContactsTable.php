<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ContactsTable extends Table
{
    public function initialize(array $config)
    {
    }

    public function validationDefault(Validator $validator)
    {
        return $validator
            ->requirePresence('first_name')
            ->notEmpty('first_name', 'A first name is required')
            ->requirePresence('last_name')
            ->notEmpty('last_name', 'A last name is required')
            ->requirePresence('email')
            ->notEmpty('email', 'An email adress is required')
            ->requirePresence('fax')
            ->notEmpty('fax', 'A fax number is required')
            ->requirePresence('phone')
            ->notEmpty('phone', 'A phone number is required');
    }
}
