<?php

namespace Models;

use Silex\Application;

class Books
{
    public $id;
    public $title;
    public $authorId;
    public $genreId;
    public $year;
    public $description;

    /**
     * Class constructor
     * @param int $id
     * @param string $title
     * @param int $authorId
     * @param int $genreId
     * @param int $year
     * @param string $description
     */
    public function __construct($id, $title, $authorId, $genreId, $year, $description)
    {
        $this->id = $id;
        $this->title = $title;
        $this->authorId = $authorId;
        $this->genreId = $genreId;
        $this->year = $year;
        $this->description = $description;
    }

}