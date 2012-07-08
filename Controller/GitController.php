<?php

namespace Lidaa\GitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
 
class GitController extends Controller 
{

    /**
     * @Route("/_lidaa_git/index", name="_lidaa_git_index")
     * @Template()
     */
    public function indexAction()
    {
    		
    		$form = $this->createFormBuilder(null)
    			->add('command', 'text', array('attr' => array('style' => 'width:80%;')))
    			->add('result', 'textarea', array('read_only' => 'read_only', 'attr' => array('style' => 'width:100%;height:100%')))
    			->getForm();

			$request = $this->getRequest();
			if($request->getMethod() == 'POST')
			{
				$form->bindRequest($request);
				
	    		$git_shell = $this->get('lidaa_git.shell');
				$result = $git_shell->run($form->get('command')->getData());

				$form->setData($result);
			}

			$parameters = array('form' => $form->createView());

			return $parameters;
    }
}
