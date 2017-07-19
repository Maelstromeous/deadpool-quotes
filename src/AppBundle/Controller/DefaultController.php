<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Quote;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $max = $em->createQueryBuilder()
            ->select('t')
            ->from('AppBundle:Quote', 't')
            ->orderBy('t.id', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
        $max = $max->getId();

        $id = rand(1, $max);

        $repo = $this->getDoctrine()->getRepository(Quote::class);
        $quote = $repo->find($id);

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'quote' => $quote->getQuote()
        ]);
    }

    /**
     * @Route("/create", name="create")
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $date = new \DateTime();

        $quote = new Quote();
        $quote->setQuote('Well I say!');
        $quote->setAdded($date);

        $em->persist($quote);

        $em->flush();
    }
}
