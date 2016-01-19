<?php

namespace Model;

class InMemoryFinder implements FinderInterface
{
	private $statuses = array();
	
	$this->statuses[0] = "Coucou toto";
	$this->statuses[1] = "Coucou Bernard";
	$this->statuses[2] = "Salut Maurice";
	
	
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
