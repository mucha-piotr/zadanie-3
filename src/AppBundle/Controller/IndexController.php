<?php
/**
 * Created by PhpStorm.
 * User: muszkin
 * Date: 18.09.2017
 * Time: 16:03
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends Controller
{
    /**
     * @Route("/",name="index")
     */
    public function indexAction()
    {
        $api = $this->get('random.user.me');

        $randomUsers = $api->getUsers();
        
        $names = $api->generateNamesFromResults($randomUsers);

        $namesManager = $this->get('names');
        
        $group = $namesManager->groupNames($names);

        $prettyArray = $namesManager->prettyArray($group);

        return $this->render("@App/index.html.twig",[
            "names" => $prettyArray
        ]);
    }   
}