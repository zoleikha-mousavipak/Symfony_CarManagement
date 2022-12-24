<?php

namespace App\Service;

use App\Model\Person as ModelPerson;

class PersonFactory
{

    public function createPerson(): ModelPerson
    {
        return new ModelPerson('Mousavi');
    }

}


