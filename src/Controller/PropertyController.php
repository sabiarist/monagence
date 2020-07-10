<?php
namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PropertyController extends AbstractController {
    /**
     * @var PropertyRepository
     */
    private $repository;
    /**
     * @var ObjectManager
     */
    private $em;

    public function __construct(PropertyRepository $repository, ObjectManager $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("/biens", name="property.index")
     * @return Response
     */
    public function index():Response{
        /*$property = new Property();
        $property->setTitle('Mon premier bien')
            ->setAddress('22 Rue Mermoz')
            ->setBedrooms(3)
            ->setCity('Dakar')
            ->setDescription('Une petite description')
            ->setHeat(1)
            ->setFloor(4)
            ->setPostalCode(12500)
            ->setPrice(200000)
            ->setSurface(60)
            ->setRooms(4);
        //Creer le gestionnaire d'entités
        $em = $this->getDoctrine()->getManager();
        // Persister l'entité property
        $em->persist($property);
        //porter tous les changement faits sur l'entity manager dans la base de donnee
        $em->flush();*/
        //recuperer proprietes par id
        //$property = $this->repository->find(1);
        //recuperer all properties
        //$property = $this->repository->findAll();
        //recuperer all properties where ...
        //$property = $this->repository->findOneBy(['floor' => 4]);

        //recuperer all properties non vendue
        /*$property = $this->repository->findAllVisible();
        dump($property);*/

        //Modifier entité
       /* $property[0]->setSold(true);
        $this->em->flush();*/

        return $this->render('property/index.html.twig', [
            'current_menu' => 'properties'
        ]);
    }

    /**
     * @Route("/biens/{slug}-{id}", name="property.show", requirements={"slug":"[a-zA-Z0-9\-]*"})
     * @param Property $property
     * @param string $slug
     * @return Response
     */
    //Affiche la propriete avec son slug et son id dans le lien
    public function show(Property $property, string $slug):Response{
        //verifie si les slug correspondent Si non corrige le bon et fait une redirect permanante sur le lien canonique
        if ($property->getSlug() !== $slug){
            return $this->redirectToRoute('property.show',[
               'id' =>$property->getId(),
                'slug' =>$property->getSlug()
            ], 301);
        }
        return $this->render('property/show.html.twig', [
            'property' => $property,
           'current_menu' => 'properties'
        ]);
    }
}