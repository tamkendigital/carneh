<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use App\Traits\Auditable;
use App\Traits\Tenantable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IdentityVerification extends Model
{
    use HasFactory, HasAdvancedFilter, SoftDeletes, Tenantable, Auditable;

    public $table = 'identity_verifications';

    protected $dates = [
        'verification_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const VERIFICATION_STATUS_SELECT = [
        'Successful'   => 'Successful',
        'Unsuccessful' => 'Unsuccessful',
    ];

    protected $fillable = [
        'verificationcode',
        'user_id',
        'national_n_opassport',
        'verification_status',
        'verification_date',
        'verified_by',
    ];

    public $orderable = [
        'id',
        'verificationcode',
        'user.name',
        'national_n_opassport',
        'verification_status',
        'verification_date',
        'verified_by',
    ];

    public $filterable = [
        'id',
        'verificationcode',
        'user.name',
        'national_n_opassport',
        'verification_status',
        'verification_date',
        'verified_by',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getVerificationStatusLabelAttribute($value)
    {
        return static::VERIFICATION_STATUS_SELECT[$this->verification_status] ?? null;
    }

    public function getVerificationDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setVerificationDateAttribute($value)
    {
        $this->attributes['verification_date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getCreatedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function getUpdatedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function getDeletedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
