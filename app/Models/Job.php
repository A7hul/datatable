<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use  HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'job_name',
        'email_to',
        'emirates',
        'location',
        'company_name',
        'job_title',
        'till_date',
        'image',
    ];

    
    public static function getJobList(){
        return  Job::get();
    }
}
