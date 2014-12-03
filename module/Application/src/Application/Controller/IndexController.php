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

    public function indexAction()
    {
        return new ViewModel();
    }
    public function loginAction()
    {

    	$this->results = array(
    		'promocao' => 'Comprei o dobro pela metade do preço !',
    		'valor' => '209,99',
            'albums' => $this->getUser()->fetchAll()
    		);

    	return new ViewModel($this->results);
    }
    public function getUser()
    {
        
        if(!$this->usuarioTable){
            $sm = $this->getServiceLocator();
            $this->usuarioTable = $sm->get('Application\Model\UsuarioTable');
        }
        return $this->usuarioTable;
    }
}
