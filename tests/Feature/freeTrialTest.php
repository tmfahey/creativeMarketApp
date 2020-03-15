<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class freeTrial extends TestCase
{

    /**
     * A basic feature test of display form endpoint.
     *
     * @return void
     */
    public function testDisplaysForm()
    {
        $this->get('/')->assertStatus(200);
    }

    /**
     * A test to ensure existing emails are handled properly
     *
     * @return void
     */
    public function testExistingUser(){
        Artisan::call('migrate');
        $users = factory('App\User')->create();
        $response = $this->post('/submitForm', [
            'email' => $users->email,
        ]);
        $response->
            assertStatus(200)->
            assertJson([
                'emailExists' => true,
            ]);
    }

    /**
     * A test to ensure non-existing emails are handled properly
     *
     * @return void
     */
    public function testNonexistingUser(){
        Artisan::call('migrate');
        $users = factory('App\User')->create();
        $response = $this->post('/submitForm', [
            'email' => 'random@aol.com',
        ]);
        $response->
            assertStatus(200)->
            assertJson([
                'emailExists' => false,
            ]);
    }

    /**
     * A test to ensure invalid emails are handled properly
     *
     * @return void
     */
    public function testInvalidEmails(){
        Artisan::call('migrate');
        $response = $this->json('POST', '/submitForm', ['email' => 'Sally']);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['email']);
        $response = $this->json('POST', '/submitForm', ['email' => 'Sally@']);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['email']);
        $response = $this->json('POST', '/submitForm', ['email' => '']);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['email']);
    }

}
