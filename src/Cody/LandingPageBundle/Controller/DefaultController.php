<?php

namespace Cody\LandingPageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Cody\LandingPageBundle\Entity\Record;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $data = array();
                
        $ip = $request->getClientIp();
        
        $form = $this->createFormBuilder($data)
                ->add('email', 'email')->add('save', 'submit', array(
    'attr' => array('class' => 'btn btn-primary sign-submit')))->getForm();
        
        $form->handleRequest($request);
        
        
        if ($form->isValid()) {
            $data = $form->getData();
            
//            $message = \Swift_Message::newInstance()
//                ->setSubject('Test Email')
//                ->setFrom('send@example.com')
//                ->setTo($data['email'])
//                ->setBody('Test') ;
//            $this->get('mailer')->send($message);
            $record = new Record();
            $record->setEmail($data['email']);
            $record->setIp($ip);
            $current_time = new \DateTime("now");
            $record->setPostedAt($current_time);

            $em = $this->getDoctrine()->getManager();
            $em->persist($record);
            $em->flush();
            
            
            return $this->redirect($this->generateUrl('task_success'));
        }
        return $this->render('CodyLandingPageBundle:Default:index.html.twig', array(
            'form' => $form->createView(), 'ip' => $ip));
    }
    
    public function ajax(Request $request)
    {
        $response = array("code" => 100, "success" => true);
         //you can return result as JSON
        return new Response(json_encode($response)); 
    }
}
