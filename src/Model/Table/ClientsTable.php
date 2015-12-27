<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ClientsTable extends Table
{
    public function initialize(array $config)
    {
        $this->hasOne('Contacts');
    }

    public function validationDefault(Validator $validator)
    {
        return $validator
            ->requirePresence('client_name')
            ->notEmpty('client_name', 'A company name is required')
            ->requirePresence('area_code')
            ->notEmpty('area_code', 'An area code is required')
            ->add('area_code', 'numeric', [
                'rule' => 'numeric',
                'message' => 'Area code has to be a numeric value',
            ])
            ->requirePresence('city')
            ->notEmpty('city', 'A city is required')
            ->requirePresence('country')
            ->notEmpty('country', 'A country is required')
            ->requirePresence('street')
            ->notEmpty('street', 'A street is required')
            ->requirePresence('street_number')
            ->notEmpty('street_number', 'A street number is required')
            ->add('street_number', 'numeric', [
                'rule' => 'numeric',
                'message' => 'Street number has to be a numeric value',
            ]);
    }
}
