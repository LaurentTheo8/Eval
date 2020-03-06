<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 0; $i < 10; $i++){
            $entity = new Article();
            $entity->setTitle("name$i");
            //$entity->setPhoto("photo$i");
            $entity->setPhoto('photo'.$i.'.jpg');
            $entity->setText("text$i");
            $entity->setSlug("name$i");

            $manager->persist($entity);
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
