<?php

namespace App\DataFixtures;

use App\Controller\DistrictController;
use App\Entity\User;
use App\Repository\DistrictRepository;
use App\Repository\ProfilRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder, DistrictRepository $districtRepo, ProfilRepository $profilRepo )
    {
        $this->encoder = $encoder;
        $this->districtRepo = $districtRepo;
        $this->profilRepo = $profilRepo;

    }

    public function load(ObjectManager $manager)
    {

         $user = new User();
         $district = $this->districtRepo->find(1);
         $profil = $this->profilRepo->find(1);
         $user->setEmail('rachedtest@gmail.com')
             ->setFirstName('Rached')
             ->setLastName('BENKHALIFA')
             ->setDistrict($district)
             ->setMatricule('19000')
             ->setProfil($profil)
             ->setPassword($this->encoder->encodePassword($user, '160481'))
            ;
         $manager->persist($user);

        $manager->flush();
    }
}
