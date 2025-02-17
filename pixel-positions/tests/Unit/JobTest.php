<?php

use App\Models\Job;
use App\Models\Employer; 

it('belongs to an employer', function () {

    // Arrange
    $employer = Employer::factory()->create();
    $job = Job::factory()->create([
        'employer_id' => $employer->id,
    ]);
    
    // Act & Assert
    expect($job->employer->is($employer))->toBeTrue();

    
});
