<?php

include_once 'autoload.php';

class WorkerRepository extends Repository
{
    public function __construct()
    {
        parent::__construct('worker');
    }

}