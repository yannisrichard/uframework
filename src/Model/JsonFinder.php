<?php

namespace Model;

class JsonFinder implements FinderInterface
{
    private $file;
    public function __construct($fileName)
    {
        $this->file = $fileName;
    /*
        $this->json_encode_object($fileName, $status1);
        $this->json_encode_object($fileName, $status2);
        $this->json_encode_object($fileName, $status3);
    * */
    }

    /**
     * Returns all elements.
     *
     * @return array
     */
    public function findAll(){
		$array_decode = json_decode(file_get_contents($this->file), true);
		
		return $array_decode;
	}

    /**
     * Retrieve an element by its id.
     *
     * @param  mixed      $id
     * @return null|mixed
     */
    public function findOneById($id){
		$array_decode = json_decode(file_get_contents($this->file), true);
		
		return $array_decode[$id];
	}
}

