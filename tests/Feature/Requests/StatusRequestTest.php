<?php

namespace Tests\Feature\Requests;

use App\Http\Requests\StatusRequest;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class StatusRequestTest extends TestCase
{
    public function test_status_request_validation_rules(): void
    {
        $rules = (new StatusRequest())->rules();

        $validator = Validator::make(
            ['name' => ''],
            $rules
        );

        $this->assertFalse($validator->passes());
        $this->assertArrayHasKey('name', $validator->errors()->messages());
    }
}
