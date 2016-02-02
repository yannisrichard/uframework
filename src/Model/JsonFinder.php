<?php

namespace Model;

class JsonFinder implements FinderInterface
{
	const FOLDER = '/../../data/';
    const FILE = 'statuses';
    const EXT = 'json';

    /**
     * Returns all elements.
     *
     * @return array
     */
    public function findAll(){
		$fileContent = file_get_contents(__DIR__.self::FOLDER.self::FILE.'.'.self::EXT);
		$array_decode = json_decode($fileContent, true);
		
		return $array_decode;
	}

    /**
     * Retrieve an element by its id.
     *
     * @param  mixed      $id
     * @return null|mixed
     */
    public function findOneById($id){
		$fileContent = file_get_contents(__DIR__.self::FOLDER.self::FILE.'.'.self::EXT);
		$array_decode = json_decode($fileContent, true);
		
		return $array_decode[$id];
	}
	
	public function create($user, $message)
    {
		$array = $this->findAll();
		array_push($array, $user.' : ' .$message);
		
        if (false === file_put_contents(__DIR__.self::FOLDER.self::FILE.'.'.self::EXT, json_encode($array), LOCK_EX)) {
            throw new HttpException(500, 'Data file writing is impossible.');
        }
    }
    
	public function delete($id)
    {
		$array = $this->findAll();
		unset($array[$id]);
		$array = array_values($array);

		if (false === file_put_contents(__DIR__.self::FOLDER.self::FILE.'.'.self::EXT, json_encode($array), LOCK_EX)) {
            throw new HttpException(500, 'Data file writing is impossible.');
        }
    }
}

