<?php

include_once 'autoload.php';

class ClientRepository extends Repository
{
    public function __construct()
    {
        parent::__construct('client');
    }

}