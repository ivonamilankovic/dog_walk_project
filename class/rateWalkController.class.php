<?php


class RateWalkController extends RateWalk {

    private $rate;
    private $id_walk;

    //constructor
    public function __construct($rate, $id_walk)
    {
        $this->rate = $rate;
        $this->id_walk = $id_walk;
    }

    //function for sending data to make new user
    public function rate()
    {
        $this->setRate($this->rate, $this->id_walk);
    }



}