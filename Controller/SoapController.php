<?php

namespace Raducorp\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Zend\Soap\AutoDiscover;
use Zend\Soap\Server;

class SoapController extends Controller
{
    // return wsdl
    public function wsdlAction()
    {
        $uri = $this->generateUrl('path_to_controller_action_soap_handler'); // 'http://site.com/api/soap/doSomething'

        // No cache
        ini_set('soap.wsdl_cache_enable', 0);
        ini_set('soap.wsdl_cache_ttl', 0);
        
        $autodiscover = new AutoDiscover();
        $autodiscover->setClass(Service::class);
        $autodiscover->setUri($uri);
        
        $response = new Response();
        $response->headers->set('Content-Type', 'text/xml; charset=ISO-8859-1');
        ob_start();
        $autodiscover->handle();
        $response->setContent(ob_get_clean());
        
        return $response;
    }
    
    public function soap()
    {
        $uri = $this->generateUrl('path_to_controller_action_soap_handler'); // 'http://site.com/api/soap/doSomething'
        
        $soap = new Server(null, ['location' => $uri, 'uri' => $uri]);
        $soap->setClass($this->get(Service::ID));
        
        $response = new Response();
        $response->headers->set('Content-Type', 'text/xml; charset=ISO-8859-1');
        ob_start();
        $soap->handle();
        $response->setContent(ob_get_clean());
        
        return $response;
    }
}
