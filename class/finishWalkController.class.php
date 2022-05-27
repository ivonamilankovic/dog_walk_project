<?php


class FinishWalkController extends FinishWalk {

    private $path, $id_walk;

    //constructor
    public function __construct($path, $id_walk)
    {
        $this->path = $path;
        $this->id_walk = $id_walk;
    }

    //function for sending data to make new user
    public function finish()
    {
        $this->setPath($this->path, $this->id_walk);
    }



}