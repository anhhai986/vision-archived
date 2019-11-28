<?php
namespace App\Repositories;

class BoardRepository extends Repository {

    /**
     * Specify Model class name
     *
     * @return string
     */
    function model()
    {
        return "App\\Models\\Board";
    }
}