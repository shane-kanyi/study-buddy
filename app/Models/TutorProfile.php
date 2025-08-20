<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TutorProfile extends Model
{
    public function subjects(): BelongsToMany
    {
        return $this->belongsToMany(Subject::class, 'subject_tutor_profile');
    }
}
