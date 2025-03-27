<?php

namespace Tests\Feature\Furniture;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Furniture;
use Tests\TestCase;

class FurnitureModelTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_furniture_can_be_created()
    {
        $furniture = Furniture::create([
            'name' => 'Wooden Chair',
            'category'=> 'Seating',
            'description'=> 'A comfortable wooden chair',
            'price' => 50.00,
            'height'=> 1.2, 
            'width'=> 0.5,
            'depth'=> 0.5,
        ]);

        $this->assertDatabaseHas('furniture', [
            'name' => 'Wooden Chair',
            'price' => 50.00,
        ]);
    }

    /** @test */
    public function test_furniture_can_be_updated()
    {
        $furniture = Furniture::create([
            'name' => 'Wooden Chair',
            'category'=> 'Seating',
            'description'=> 'A comfortable wooden chair',
            'price' => 50.00,
            'height'=> 1.2, 
            'width'=> 0.5,
            'depth'=> 0.5,
        ]);

        $furniture->update(['price' => 60.00]);

        $this->assertDatabaseHas('furniture', [
            'price' => 60.00,
        ]);
    }

    /** @test */
    public function test_furniture_can_be_deleted()
    {
        $furniture = Furniture::create([
            'name' => 'Wooden Chair',
            'category'=> 'Seating',
            'description'=> 'A comfortable wooden chair',
            'price' => 50.00,
            'height'=> 1.2, 
            'width'=> 0.5,
            'depth'=> 0.5,
        ]);

        $furniture->delete();

        $this->assertDatabaseMissing('furniture', [
            'name' => 'Wooden Chair',
        ]);
    }
}
