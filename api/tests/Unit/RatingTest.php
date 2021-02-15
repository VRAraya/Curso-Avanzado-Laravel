<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Models\User;
use App\Models\Product;
use App\Models\Rating;

class RatingTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_rating_a_product()
    {
        /** @var User $user */
        $user = User::factory()->create();

        /** @var Product $product */
        $product = Product::factory()->create();

        $user->rate($product, 5);

        // dd($user->ratings()->get());
        // dd($product->ratings()->get());

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $user->ratings(Product::class)->get());
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $product->qualifiers(User::class)->get());
    }

    public function test_average_rating_users_to_product()
    {
        /** @var User $user */
        $user = User::factory()->create();

        /** @var User $user2 */
        $user2 = User::factory()->create();

        /** @var Product $product */
        $product = Product::factory()->create();

        $user->rate($product, 5);
        $user2->rate($product, 10);

        $this->assertEquals(7.5, $product->averageRating(User::class));
    }

    public function test_rating_model_user_to_product()
    {
        /** @var User $user */
        $user = User::factory()->create();

        /** @var Product $product */
        $product = Product::factory()->create();

        $user->rate($product, 5);

        /** @var Rating $rating */
        $rating = Rating::first();

        $this->assertInstanceOf(Product::class, $rating->rateable);
        $this->assertInstanceOf(User::class, $rating->qualifier);
    }

    public function test_user_rating_another_user()
    {
        /** @var User $user */
        $user = User::factory()->create();

        /** @var User $user2 */
        $user2 = User::factory()->create();

        $user->rate($user2, 5);

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $user->ratings(User::class)->get());
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $user2->qualifiers(User::class)->get());
    }

    public function test_average_rating_users_to_user()
    {
        /** @var User $user */
        $user = User::factory()->create();

        /** @var User $user2 */
        $user2 = User::factory()->create();

        /** @var User $user3 */
        $user3 = User::factory()->create();

        $user->rate($user3, 1);
        $user2->rate($user3, 10);

        $this->assertEquals(5.5, $user3->averageRating(User::class));
    }

    public function test_rating_model_user_to_user()
    {
        /** @var User $user */
        $user = User::factory()->create();

        /** @var User $user2 */
        $user2 = User::factory()->create();

        $user->rate($user2, 5);

        /** @var Rating $rating */
        $rating = Rating::first();

        $this->assertInstanceOf(User::class, $rating->rateable);
        $this->assertInstanceOf(User::class, $rating->qualifier);
    }
}
