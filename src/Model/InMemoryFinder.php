<?php

namespace Model;

class InMemoryFinder implements FinderInterface
{
	private $statuses = array();
	

	public function __construct()
    {
		$this->statuses[] = "Coucou toto";
		$this->statuses[] = "Coucou Bernard";
		$this->statuses[] = "Salut Maurice";
    }
	
    /**
     * Returns all elements.
     *
     * @return array
     */
    public function findAll(){
		return $this->statuses;	
	}

    /**
     * Retrieve an element by its id.
     *
     * @param  mixed      $id
     * @return null|mixed
     */
    public function findOneById($id){
		return $this->statuses[$id];	
	}
}
