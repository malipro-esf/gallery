<?php
namespace Tests\Feature\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

trait ModelHelperTesting
{

    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testInsertData()
    {
        $model = $this->model();
        $table = $model->getTable();

        $data = $model::factory()->make()->toArray();

        if($model instanceof User)
            $data['password'] = '$2y$10$vAUDmkFQZqUdVmu./PtuGujgoybkTFHj4Q6v2x4W.Mj.jxe.R8dPK';

        $model::create($data);

        $this->assertDatabaseHas($table, $data);
    }

    abstract protected function model(): Model;
}
