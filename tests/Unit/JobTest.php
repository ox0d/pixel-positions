<?php
// test is same as it
// test('example', function () {
//     expect(true)->toBeTrue();
// });

use App\Models\Employer;
use App\Models\Job;
use App\Models\Tag;
use App\Models\User;

it('belongs to an employer', function () {
    // AAA: Arrange, Act, Assert

    // Arrange: Prepare the data
    $user = User::factory()->create();
    $employer = Employer::factory()->create([
        'user_id' => $user->id,
    ]);
    $job = Job::factory()->create([
        'employer_id' => $employer->id,
    ]);

    // Act: Perform the action we're testing
    $result = $job->employer;

    // Assert: Make an assertion about the result
    expect($result->is($employer))->toBeTrue();
});

it('can have tags', function () {
    // AAA: Arrange, Act, Assert

    // Arrange: Prepare the data
    $user = User::factory()->create();
    $employer = Employer::factory()->create([
        'user_id' => $user->id,
    ]);
    $job = Job::factory()->create([
        'employer_id' => $employer->id,
    ]);
    $tag = Tag::firstOrCreate(['name' => 'PHP']);

    // Act: Perform the action we're testing
    $job->tags()->attach($tag);

    // Assert: Make an assertion about the result
    expect($job->tags)->toHaveCount(1);
});
