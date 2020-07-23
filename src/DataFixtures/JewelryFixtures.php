<?php


namespace App\DataFixtures;


use App\Entity\Jewelry;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class JewelryFixtures extends Fixture implements DependentFixtureInterface
{
    const JEWELRIES = [
        'Double mat bleues' => [
            'price'         => '7.50',
            'identifier'    => 'BD01',
            'description'   => 'Perles bleues, monture argentées sans présence de nickel',
            'picture'       => 'https://www.cjoint.com/doc/20_07/JGwtlD3AU2A_Double-mat-4.jpg',
            'category'      => 'category_0',
        ],
        'Fleur'             => [
            'price'         => '5.00',
            'identifier'    => 'BD02',
            'description'   => 'pâte polymère, idéal pour les plus jeunes',
            'picture'       => 'https://www.cjoint.com/doc/20_07/JGwwLxMwxGA_BD18.2.jpg',
            'category'      => 'category_0',
        ],
        'Parure Ethnique'   => [
            'price'         => '12.00',
            'identifier'    => 'PA01',
            'description'   => 'Jolie parure style ethnique comprenant une paire de boucles d\'oreilles et un collier assorti.',
            'picture'       => 'https://www.cjoint.com/doc/20_07/JGwwMTmX40A_PA-02.1.jpg',
            'category'      => 'category_1',
        ],
        'Parure Jaune'      => [
            'price'         => '12.00',
            'identifier'    => 'PA02',
            'description'   => 'Parure contenant des perles jaunes et grises, sur une monture doré (sans nickel)',
            'picture'       => 'https://www.cjoint.com/doc/20_07/JGwwRv0t6MA_PA1.4.jpg',
            'category'      => 'category_1',
        ],
        'Estampe d\'été'    => [
            'price'         => '7.00',
            'identifier'    => 'BD03',
            'description'   => 'Estampes argentées, accompagnées de perles rocailles bordeaux',
            'picture'       => 'https://www.cjoint.com/doc/20_07/JGwwWkgugzA_BD19-1.3.jpg',
            'category'      => 'category_0',
        ]

    ];
    public function getDependencies()
    {
        return [CategoryFixtures::class];
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $i = 1;
        foreach (self::JEWELRIES as $name => $data) {
            $jewelry = new Jewelry();
            $jewelry->setName($name);
            $jewelry->setPrice($data['price']);
            $jewelry->setIdentifier($data['identifier']);
            $jewelry->setPicture($data['picture']);
            $jewelry->setDescription($data['description']);
            $jewelry->setCategory($this->getReference($data['category']));
            $manager->persist($jewelry);
            $this->addReference('jewelry_' . $i, $jewelry);
            $i++;
        }
        $manager->flush();
    }
}
