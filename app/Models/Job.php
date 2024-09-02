<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;

class Job extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'job_listings';

    // enable assignment on fields
    // protected $fillable = ['title', 'salary', 'employer_id'];

    // guard no fields
    protected $guarded = [];

    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, foreignPivotKey: "job_listing_id");
    }
}
