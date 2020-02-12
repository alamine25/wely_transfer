<?php

namespace App\Controller;

use App\Entity\Depot;
use App\Entity\Compte;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;


    
class DepotController extends AbstractController
{
    private $tokenStorage;
    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
        
    }

    /**
     * @Route("/api/faire_depot", name="faire_depot", methods={"POST"})
     */
    public function faire_depot(Request $request, EntityManagerInterface $entityManager)
    {
        
        $values = json_decode($request->getContent());
        
        if(isset($values->montantDepot,$values->numeroCompte)) {
            // recuperer du compte a deposer
            $Comptereposit = $this->getDoctrine()->getRepository(Compte::class);
            $compte = $Comptereposit->findOneByNumeroCompte($values->numeroCompte);
            if ($compte) {
                $depot = new Depot();
                $depot->setDeposedAt(new \DateTime());
                $depot->setMontantDepot($values->montantDepot);
                
                // MIS A JOUR DU SOLDE AU NIVEAU DU COMPTE
                $nouveauSolde = ($compte->getSolde()+$values->montantDepot);
                $compte->setSolde($nouveauSolde);
            
                $depot->setCompte($compte);
                $depot->setUser($this->tokenStorage->getToken()->getUser());

                $entityManager->persist($depot);
                $entityManager->flush();

                $data = [
                    'status' => 201,
                    'message' => 'Le depot est effectuer avec success'
                ];

                return new JsonResponse($data, 201);
            }
            $data = [
                'status' => 500,
                'message' => 'desole!!! Le compte que vous avez saisie n existe pas'
            ];
            return new JsonResponse($data, 500);
        }
        $data = [
            'status' => 500,
            'message' => 'Vous devez renseigner le numero de compte ainsi que le montant a deposer'
        ];
        return new JsonResponse($data, 500);
    }
    
}