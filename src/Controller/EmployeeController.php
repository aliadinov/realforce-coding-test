<?php
/**
 * Created by PhpStorm.
 * User: eldar
 * Date: 28.06.2020
 * Time: 17:31
 */

namespace App\Controller;

use App\Entity\Employee;
use App\Form\EmployeeFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EmployeeController extends AbstractController
{
    /** @var EntityManagerInterface */
    private $entityManager;

    /** @var \Doctrine\Common\Persistence\ObjectRepository */
    private $employeeRepository;

    /**
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->employeeRepository = $entityManager->getRepository('App:Employee');
    }

    /**
     * @Route("/", name="employee_index")
     * @return Response
     */
    public function actionIndex()
    {
        $employees = $this->employeeRepository->findAll();
        return $this->render('employees/index.html.twig', [
            'employees' => $employees
        ]);
    }

    /**
     * @Route("/create", name="employee_create")
     * @return Response
     */
    public function create(Request $request)
    {
        $employee = new Employee();

        $form = $this->createForm(EmployeeFormType::class, $employee);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
             $employee = $form->getData();

             $entityManager = $this->getDoctrine()->getManager();
             $entityManager->persist($employee);
             $entityManager->flush();

            return $this->redirectToRoute('employee_index');
        }

        return $this->render('employees/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }


}