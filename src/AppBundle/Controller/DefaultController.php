<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
class DefaultController extends Controller
{
    /**
     * @Route("/ ", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
    /**
     * Show the user.
     */
    public function showAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException(
                'This user does not have access to this section.');
        }

        return $this->container->get('templating')
            ->renderResponse('FOSUserBundle:Profile:show.html.'.$this->container
                    ->getParameter('fos_user.template.engine'), array('user' => $user));
    }
}
