<?php

namespace Http;

class Request
{
	
    const GET    = 'GET';
    const POST   = 'POST';
    const PUT    = 'PUT';
    const DELETE = 'DELETE';

    private $parameters = array();
    
    public function __construct(array $query = array(), array $request = array())
    {
        $this->parameters = array_merge($query, $request);
    }

	public function getParameter($name, $default = null)
    {
        if (false === isset($this->parameters[$name])) {
            return $default;
        }

        return $this->parameters[$name];
	}

    public function getMethod()
    {
		//A compléter. return la methode selon le verb HTTP
		//Cette methode est appelé dans le App.php
	
        $method = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : self::GET;
        
        if (self::POST === $method) {
            return $this->getParameter('_method', $method);
        }
        
        return $method;
    }
    
	/**
     * Returns the URI.
     *
     * @return String
     */
    public function getURI()
    {
		$uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';
        if ($pos = strpos($uri, '?')) {
                $uri = substr($uri, 0, $pos);
        }
        
        return $uri;
    }

    public static function createFromGlobals()
    {
		//TP3 : Modify the createFromGlobals() method to inject the global variables.
		return new self($_GET, $_POST);
    }
	
	
	
}
