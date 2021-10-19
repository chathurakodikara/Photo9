<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Photo;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PhotoTest extends TestCase
{
    use RefreshDatabase;
    /**
     * run test on photo model and its routes
     *
     * @return void
     */
   

    public function test_guest_users_cannot_visit_photos_page()
    {
        $response = $this->get('/photos');
        /**test fail without login user */
        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
    }


    public function test_oauth_users_can_visit_photos_page()
    {
        
        $this->actingAs($user = User::factory()->create());
        $response = $this->get('/photos');
        $response->assertStatus(200);

    }

    /**
     * /photos get request has photos variable
     */
    public function test_photos_page_fetch_photos_from_db()
    {
   
        $this->actingAs($user = User::factory()->create());
        $response = $this->get('/photos');
        $response->assertViewHas('photos');
    }

   

  
}
