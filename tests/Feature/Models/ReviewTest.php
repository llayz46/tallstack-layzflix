<?php

use App\Models\Media;
use App\Models\Review;
use App\Models\User;

it('can belongs to an media', function () {
    $review = Review::factory()->create();

    expect($review->media)->toBeInstanceOf(Media::class);
});

it('can belongs to an user', function () {
    $review = Review::factory()->create();

    expect($review->user)->toBeInstanceOf(User::class);
});

it('can create a review', function () {
    $review = Review::factory()->create();

    expect($review->id)->toBeInt()
        ->and($review->content)->toBeString()
        ->and($review->rating)->toBeInt();
});

it('can create a review with a specific content', function () {
    $review = Review::factory()->create([
        'content' => 'Test review',
    ]);

    expect($review->content)->toBe('Test review');
});

it('can create a review with a specific rating', function () {
    $review = Review::factory()->create([
        'rating' => 5,
    ]);

    expect($review->rating)->toBe(5);
});

it('can find all review of a user', function () {
    $user = User::factory()->create();
    $review = Review::factory()->create([
        'user_id' => $user->id,
    ]);

    $reviews = Review::where('user_id', $user->id)->get();

    expect($reviews->first()->user_id)->toBe($user->id);
});

it('can find all review of a media', function () {
    $media = Media::factory()->create();
    $review = Review::factory()->create([
        'media_id' => $media->id,
    ]);

    $reviews = Review::where('media_id', $media->id)->get();

    expect($reviews->first()->media_id)->toBe($media->id);
});
