<?php

namespace App\Repositories;

interface ProposedPriceRepositoryInterface
{
    public function getAll();

    public function show();

    public function update();

    public function delete();
}
