<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Candidacy;
use AppBundle\Form\CandidacyType;
use Doctrine\Common\Persistence\ObjectManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/admin", name="admin")
     */
    public function adminAction(Request $request)
    {

        $data = new Candidacy();
        $form = $this->createForm(CandidacyType::class, $data);

        $form->handleRequest($request);

        if (!$form->isSubmitted() || !$form->isValid()) {
            return $this->render('default/admin.html.twig', [
                'form' => $form->createView(),
            ]);
        }

        $em = $this->getEntityManager();

        $candidacy = $form->getData();
        $em->persist($candidacy);
        $em->flush();

        //@todo: redirect to cv page
        return $this->redirectToRoute('admin');
    }

    /**
     * @Route("/{company}", name="home")
     */
    public function candidacyAction(Request $request, $company)
    {
        $repo = $this->getEntityManager()->getRepository('AppBundle:Candidacy');
        $candidacy = $repo->findOneBy(['company' => $company]);

        return $this->render('default/candidacy.html.twig', [
            'candidacy' => $candidacy,
        ]);
    }

    /**
     * @return ObjectManager
     */
    private function getEntityManager()
    {
        return $this->getDoctrine()->getManager();
    }
}
