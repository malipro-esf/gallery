<?php

namespace App\Repositories;

interface ContactRepositoryInterface
{
    public function getAll();

    public function reply($data);
}
