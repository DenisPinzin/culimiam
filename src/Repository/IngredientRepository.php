<?php

namespace App\Repository;

use App\Entity\Ingredient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Ingredient>
 */
class IngredientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ingredient::class);
    }


    public function searchByName(string $texteRecherche): array
    {
        // ajout de % pour chercher le texte partout
        $motRecherche = '%' . $texteRecherche . '%';

        return $this->createQueryBuilder('ingredient')

            // cherche les ingrédients contenant le texte
            ->where('ingredient.nom LIKE :motRecherche')

            // remplace "motRecherche" par la vrai valeur
            ->setParameter('motRecherche', $motRecherche)

            // limite à 10 résultat
            ->setMaxResults(10)

            ->getQuery()

            ->getResult();
    }
    //    /**
    //     * @return Ingredient[] Returns an array of Ingredient objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('i')
    //            ->andWhere('i.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('i.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Ingredient
    //    {
    //        return $this->createQueryBuilder('i')
    //            ->andWhere('i.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
