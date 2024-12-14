<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Channel;

class QuickRoutesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the application correctly redirects from the user quick route to the correct route.
     */
    public function test_user_quick_route(): void
    {
        $user = User::factory()->makeOne();
        $user->handle = 'test_user';
        $user->save();

        $response = $this->get('/u/' . $user->handle);

        $response->assertRedirect('/users/' . $user->id);
    }

    /**
     * Test the application correctly redirects from the channel quick route to the correct route.
     */
    public function test_channel_quick_route(): void
    {
        $channel = Channel::factory()
            ->forUser()
            ->makeOne();
        $channel->handle = 'test_channel';
        $channel->save();

        $response = $this->get('/ch/' . $channel->handle);

        $response->assertRedirect('/channels/' . $channel->id);
    }
}
