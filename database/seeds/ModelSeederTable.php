<?php

use Illuminate\Database\Seeder;

class ModelSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $model = array(
      ['model_type' => '2.5m', 'created_at' => new DateTime, 'updated_at' => new DateTime,],
      ['model_type' => 'Large', 'created_at' => new DateTime, 'updated_at' => new DateTime,],
      ['model_type' => '7ft', 'created_at' => new DateTime, 'updated_at' => new DateTime,],
      ['model_type' => '7ft6', 'created_at' => new DateTime, 'updated_at' => new DateTime,],
      ['model_type' => '3m', 'created_at' => new DateTime, 'updated_at' => new DateTime,],
      ['model_type' => 'Rear Mount 7ft', 'created_at' => new DateTime, 'updated_at' => new DateTime,],
      ['model_type' => 'Rear Mount 8ft', 'created_at' => new DateTime, 'updated_at' => new DateTime,],
      ['model_type' => 'Large 3m', 'created_at' => new DateTime, 'updated_at' => new DateTime,],
    );

    DB::table('model')->insert($model);
    }
}
