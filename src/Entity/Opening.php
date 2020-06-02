<?php

namespace Entity;

use Entity\User;
use ludk\Utils\Serializer;

class Opening
{
    public int $id;
    public string $anime;
    public string $song;
    public string $group;
    public string $description;
    public string $url_song;
    public string $picture;
    public User $user;

    use Serializer;
}
