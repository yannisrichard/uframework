<?php

namespace Http;

class Request
{
	
    const GET    = 'GET';
    const POST   = 'POST';
    const PUT    = 'PUT';
    const DELETE = 'DELETE';

    public function __construct()
    {
		
		
		
    }

    public function getMethod()
    {
		$method = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : self::GET;
		//A compléter. return la methode selon le verb HTTP
		//Cette methode est appelé dans le App.php

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

	
	
	
}
