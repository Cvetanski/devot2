<?php

namespace Tests\Feature\Expenses;

use App\Models\Expense;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExpenseTest extends TestCase
{
    use RefreshDatabase;

    public function test_add_expense_logged_user()
    {
        $this->withExceptionHandling();

        $user = User::factory()->create();

        $response = $this->post('http://127.0.0.1:8001/api/expenses/store',[
            "amount" => "1984",
            "description" => "test",
            "category" => "kola",
        ]);

        $this->actingAs($user);

        $expense = Expense::first();
        $this->assertEquals(1,Expense::count());

        $this->assertEquals("1984",$expense->amount);
        $this->assertEquals("test",$expense->description);
//        $this->assertEquals($user->id,$expense->user->id);
        $this->assertEquals("kola",$expense->category);
        $this->assertInstanceOf(User::class,$expense->user);



        $response->assertStatus(200);
    }
}
