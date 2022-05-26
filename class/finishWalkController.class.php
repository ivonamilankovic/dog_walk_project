<?php


class FinishWalkController extends FinishWalk {

    private $path, $id_walk, $customer_email;

    //test!!!
    //constructor
    public function __construct($path, $id_walk, $customer_email)
    {
        $this->path = $path;
        $this->id_walk = $id_walk;
        $this->customer_email = $customer_email;
    }

    //function for sending data to make new user
    public function finishWalk()
    {
        $this->finishW($this->path, $this->id_walk, $this->customer_email);
    }



}