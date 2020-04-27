<?php

namespace Entity;

use Entity\User;

class Opening
{
    public $id;
    public $anime;
    public $song;
    public $group;
    public $description;
    public $url_song;
    public $picture;
    public User $user;
}
