<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Channel;
use App\Models\Community;
use App\Models\Group;

class QuickRoutesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the application correctly redirects from the user quick route to the correct route.
     */
    public function test_user_quick_route(): void
    {
        $users = User::factory(5)->create();

        foreach ($users as $user) {
            $response = $this->get('/u/' . $user->handle);

            $response->assertRedirect('/users/' . $user->id);
        }
    }

    /**
     * Test the application correctly redirects from the channel quick route to the correct route.
     */
    public function test_channel_quick_route(): void
    {
        $channels = Channel::factory(5)
            ->forUser()
            ->create();

        foreach ($channels as $channel) {
            $response = $this->get('/ch/' . $channel->handle);

            $response->assertRedirect('/channels/' . $channel->id);
        }
    }

    /**
     * Test the application correctly redirects from the group quick route to the correct route.
     */
    public function test_group_quick_route(): void
    {
        $groups = Group::factory(5)
            ->forUser()
            ->create();

        foreach ($groups as $group) {
            $response = $this->get('/g/' . $group->handle);

            $response->assertRedirect('/groups/' . $group->id);
        }
    }

    /**
     * Test the application correctly redirects from the community quick route to the correct route.
     */
    public function test_community_quick_route(): void
    {
        $communities = Community::factory(5)
            ->forUser()
            ->create();

        foreach ($communities as $community) {
            $response = $this->get('/co/' . $community->handle);

            $response->assertRedirect('/communities/' . $community->id);
        }
    }
}
