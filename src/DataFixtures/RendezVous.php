<?php

namespace App\DataFixtures;
use App\Enum\Status;
use App\Enum\Specialite;



use App\Entity\RendezVous as EntityRendezVous;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RendezVous extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 5; $i++) {
            $rendezVous = new EntityRendezVous;
            $rendezVous->setDate(new \DateTime(sprintf('+%d days', rand(1, 30))));
            $rendezVous->setMotif('Consultation de routine');
            $rendezVous->setStatus(Status::EN_ATTENTE);
            $rendezVous->setSpecialite(Specialite::CARDIOLOGIE);
           $manager->persist($rendezVous);

        

        $manager->flush();
    }}
}
