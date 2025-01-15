<?php

namespace Tests\Feature;

use App\Models\Status;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskStatusTest extends TestCase
{

    use RefreshDatabase;

    protected function setUp(): void
    {
        //
        //Зачем здесь создается здесь фабрика, которая не пишется в переменную???
        //
        parent::setUp();
        Status::factory()->count(2)->make();
    }

    public function testIndex()
    {
        $response = $this->get(route('task_statuses.index'));
        $response->assertOk();
    }

    public function testCreate()
    {
        $response = $this->get(route('task_statuses.create'));
        $response->assertOk();
    }

    public function testEdit()
    {
        $status = Status::factory()->create();
        $response = $this->get(route('task_statuses.edit', [$status]));
        $response->assertOk();
    }

    public function testStore()
    {
        $data = Status::factory()->make()->only('name');
        $response = $this->post(route('task_statuses.store'), $data);
        $response->assertRedirect(route('task_statuses.index'));
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('statuses', $data);
    }

    public function testUpdate()
    {
        $status = Status::factory()->create();
        $data = Status::factory()->make()->only('name');

        $response = $this->patch(route('task_statuses.update', $status), $data);
        $response->assertRedirect(route('task_statuses.index'));
        $response->assertSessionHasNoErrors();

        $data = array_merge($data, ['id' => $status->id]);
        $this->assertDatabaseHas('statuses', $data);
    }

    public function testDestroy()
    {
        $status = Status::factory()->create();
        $response = $this->delete(route('task_statuses.destroy', [$status]));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('task_statuses.index'));

        $this->assertDatabaseMissing('statuses', $status->only('id'));
    }
}
