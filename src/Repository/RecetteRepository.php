<?php

namespace App\Repository;

use App\Entity\Recette;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\User;


/**
 * @extends ServiceEntityRepository<Recette>
 */
class RecetteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Recette::class);
    }


    public function findFiltered(?User $user = null, ?int $typeId = null): array
    {
        // creation du builder sur l'entité recette "r" devient l'alias de Recette
        $qb = $this->createQueryBuilder('r')

        // jointure avec typerepas
        ->leftJoin('r.typerepas', 't')
        ->addSelect('t')

        // jointure avec User
        ->leftJoin('r.user', 'u')
        ->addSelect('u');

        //FILTRE RECETTE
        // si un utilisateur est envoyé à la méthode alors on filtre uniquement ses recettes
        if ($user) {

            $qb->andWhere('r.user = :user')

                // Remplace :user par l'utilisateur connecté
                ->setParameter('user', $user);
        }

        //FILTRE TYPE REPAS
        // si un type de repas est sélectionné
        if ($typeId) {

            $qb->andWhere('r.typerepas = :typeId')

                // Remplace typeId par l'id du type sélectionné
                ->setParameter('typeId', $typeId);
        }

        return $qb

            // recettes de la plus récente à la plus ancienne
            ->orderBy('r.id', 'DESC')

            // execute la requête SQL
            ->getQuery()

            // retourne les résultats
            ->getResult();
    }

    //    /**
    //     * @return Recette[] Returns an array of Recette objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('r.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Recette
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
