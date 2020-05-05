<?php

namespace App\Data;

use App\Entity\Language;
use App\Entity\Level;
use App\Entity\Approach;

class SearchData
{
      /**
     * @var int
     */
    public $page = 1;
   
    /**
     * @var string
     */
    public $q = '';

    /**
     * @var Language[]
     */
    public $languages = [];

     /**
     * @var Level[]
     */
    public $levels = [];

     /**
     * @var Approach[]
     */
    public $approachs = [];

    /**
     * @var null|integer
     */
    public $max;

    /**
     * @var null|integer
     */
    public $min;


}