<?php

namespace Tests\Feature;

use Illuminate\Support\Str;
use Tests\TestCase;

class SendMailTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {

        $this->withoutExceptionHandling();

        $response = $this->post(route('api.contact'), [
            'name' => Str::random(10),
            'email' => 'bt.' . Str::random(5) . '@teste.com',
            'phoneNumber' => '84999289436',
            'subject' => Str::random(6),
            'messageBody' => Str::random(100),
        ]);

        $response->assertStatus(200);
    }
}
