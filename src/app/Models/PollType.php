<?php

namespace app\Models;

use core\PDO;

class PollType
{
    public array $attributes = [];

    public function isDraft(): bool
    {
        return $this->attributes['status'] === 'draft';
    }

    public function isPublished(): bool
    {
        return $this->attributes['status'] === 'published';
    }

    public function fill(array $attributes): PollType
    {
        $this->attributes = $attributes;

        return $this;
    }
    public function create(): bool
    {
        $stmt = PDO::init()->prepare("INSERT INTO poll_types (name, status) VALUES (:name, :status)");


        return $stmt->execute($this->attributes);
    }

    public  function update()
    {


    }


    /*
     * STATIC METHODS
     */

    public static function make(): PollType
    {
        return new static();
    }

    public static function all(): array
    {



        return array_map(
            fn($item) => self::make()->fill($item),
            PDO::init()->query('SELECT * FROM poll_types')->fetchAll()
        );


    }

    public static function find(int $id): PollType
    {
        $stmt = PDO::init()->prepare('SELECT * FROM poll_types WHERE id = :id');
        $stmt->execute(['id' => $id]);

        return self::make()->fill($stmt->fetch()) ;

    }


}