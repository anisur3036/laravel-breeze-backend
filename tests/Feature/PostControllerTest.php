<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    use LazilyRefreshDatabase;

    /**
     * @test
     */
    public function it_shows_all_published_posts()
    {
        $post = Post::factory(10)->published()->create();

        $response = $this->getJson('/api/posts');

        $response->assertOk()
            ->assertJsonCount(10, 'data');
    }

    /**
     * @test
     */
    public function it_only_only_shows_published_posts()
    {
        $post = Post::factory(10)->create();
        $post = Post::factory(5)->published()->create();

        $response = $this->getJson('/api/posts');

        $response->assertJsonCount(5, 'data');
    }
}
