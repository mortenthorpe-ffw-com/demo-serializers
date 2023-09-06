<?php

namespace App\Factory;

use App\Resources\Entity\SerializeTestObj;

class SerializeTestObjFactory
{
    public function create() : SerializeTestObj
    {
        $objToTransform = new SerializeTestObj();
        $objToTransform->setAge(35)
            ->setFirstName('Hjalte')
            ->setLastNames('Illenborg Tester')
            ->setBirthDate(new \DateTimeImmutable());

        return $objToTransform;
    }

}