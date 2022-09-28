<?php

namespace App\Repositories;

use App\Models\ArtWork;

interface ArtworkRepositoryInterface
{
    public function getAll($data=null);

    public function create();

    public function store($data);

    public function show(Artwork $artWork);

    public function edit(Artwork $artWork);

    public function update(Artwork $artWork, $data);

    public function delete(Artwork $artwork);
}
