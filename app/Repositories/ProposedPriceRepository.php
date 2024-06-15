<?php

namespace App\Repositories;

use App\Models\ProposedPrice;

class ProposedPriceRepository implements ProposedPriceRepositoryInterface
{
    public function getAll()
    {
        return ProposedPrice::with('artwork')->paginate(15);

    }

    public function show()
    {
        // TODO: Implement show() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }
}
