<?php

namespace App\DataFixtures;

use App\Entity\Ordinateurs;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class OrdinateursFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $marques = [
            'Lenovo', 'Dell', 'HP', 'Asus', 'Acer',
            'Apple', 'Microsoft', 'Razer', 'Samsung', 'Toshiba',
            'MSI', 'Huawei', 'LG', 'Sony', 'Xiaomi',
            'Google', 'Fujitsu', 'Panasonic', 'Vaio', 'ZTE'
        ];

        $modeles = [
            '82HT', 'XPS 13', 'Pavilion 15', 'ZenBook 14', 'Aspire 5',
            'MacBook Air', 'Surface Laptop', 'Blade 15', 'Galaxy Book', 'Satellite C',
            'GF63', 'MateBook D', 'Gram 14', 'VAIO SX14', 'Mi Notebook',
            'Pixelbook Go', 'Lifebook U937', 'Let’s note CF-SV8', 'Dynabook Tecra', 'K8',
            'XPS 15'
        ];

        for ($i = 0; $i < 20; $i++) {
            $ordinateur = new Ordinateurs();
            $ordinateur->setMarque($marques[$i]);
            $ordinateur->setModèle($modeles[$i]);
            $manager->persist($ordinateur);
        }
       

        

        $manager->flush();
    }
}
