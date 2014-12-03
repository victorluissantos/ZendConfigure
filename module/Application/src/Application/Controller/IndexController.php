<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{

    protected $usuarioTable;

    public function __construct(){

    }

    public function indexAction()
    {
        return new ViewModel();
    }

    public function loginAction()
    {
    	return new ViewModel();
    }

    public function authentifhAction()
    {
        try{
            if(!$this->usuarioTable){
                $sm = $this->getServiceLocator();
                $this->usuarioTable = $sm->get('Application\Model\UsuarioTable');
            }
            /*Coletando valores*/
            $email = (string) $_POST['email'];
            $senha = (string) $_POST['senha'];

            $this->ususario = $this->usuarioTable->findUserByEmailAndPass($email, $senha);

            if(!$this->ususario){
                return $this->redirect()->toRoute('login', array(
                    'login' => $this->params()->fromRoute('login')
                ));
            }

            /*Caso tenha encontrado o usuario crias as sessoes*/
            //header("location:http://www.google.com");
            return $this->redirect()->toRoute('home', array(
                'home' => $this->params()->fromRoute('home')
            ));
            /*retireciona para pagina interna do sistema*/
        
        } catch (Exception $e) {
            echo "Exceção pega: ",  $e->getMessage(), "\n";
        }
    
    }
}
