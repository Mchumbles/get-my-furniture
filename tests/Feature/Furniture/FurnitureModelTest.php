<?php

namespace Tests\Feature\Furniture;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use App\Models\User;
use App\Models\Furniture;
use Tests\TestCase;

class FurnitureModelTest extends TestCase
{
    use RefreshDatabase;

    
    #[Test]
    public function test_furniture_can_be_created()
    {
        $user = User::factory()->create(); 

        $furniture = Furniture::factory()->create([
            'user_id' => $user->id, 
        ]);

        $this->assertDatabaseHas('furniture', [
            'name' => $furniture->name,
            'price' => $furniture->price,
            'user_id' => $user->id, 
        ]);
    }

    #[Test]
    public function test_furniture_can_be_updated()
    {
        $user = User::factory()->create();

        $furniture = Furniture::factory()->create([
            'user_id' => $user->id, 
        ]);

        $furniture->update(['price' => 60.00]);

        $this->assertDatabaseHas('furniture', [
            'id' => $furniture->id, 
            'price' => 60.00,
        ]);
    }

    #[Test]
    public function test_furniture_can_be_deleted()
    {
        $user = User::factory()->create(); 

        $furniture = Furniture::factory()->create([
            'user_id' => $user->id, 
        ]);

        $furniture->delete();

        $this->assertDatabaseMissing('furniture', [
            'id' => $furniture->id,
        ]);
    }

    #[Test]
    public function test_user_has_many_furniture()
    {
        $user = User::factory()->create(); 

        $furniture1 = Furniture::factory()->create(['user_id' => $user->id]);
        $furniture2 = Furniture::factory()->create(['user_id' => $user->id]);

        $user->load('furniture');

        $this->assertCount(2, $user->furniture); 
    }
}
