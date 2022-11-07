<?php

namespace Tests\Feature\Categories;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AddingCategoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_adding_category()
    {
        $this->withExceptionHandling();

        $response = $this->post('http://127.0.0.1:8001/api/category/store', [
            'name' =>"test category",
        ]);

        $response->assertStatus(200);
    }


}
