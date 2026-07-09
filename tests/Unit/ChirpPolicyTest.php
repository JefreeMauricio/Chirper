<?php

use App\Models\Chirp;
use App\Models\User;
use App\Policies\ChirpPolicy;

it('allows owners to update their own chirps', function () {
    $user = new User();
    $user->id = 1;

    $chirp = new Chirp();
    $chirp->user_id = 1;

    $policy = new ChirpPolicy();

    expect($policy->update($user, $chirp))->toBeTrue();
});

it('denies other users from deleting a chirp', function () {
    $user = new User();
    $user->id = 2;

    $chirp = new Chirp();
    $chirp->user_id = 1;

    $policy = new ChirpPolicy();

    expect($policy->delete($user, $chirp))->toBeFalse();
});
