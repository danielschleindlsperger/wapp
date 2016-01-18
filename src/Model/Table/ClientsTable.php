<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ClientsTable extends Table
{
    public function initialize(array $config)
    {
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
