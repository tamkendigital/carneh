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

class MembershipPackage extends Model
{
    use HasFactory, HasAdvancedFilter, SoftDeletes, Tenantable, Auditable;

    public $table = 'membership_packages';

    protected $casts = [
        'is_renewable' => 'boolean',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const IS_ACTIVE_SELECT = [
        'Enabled'  => 'Enabled',
        'Disabled' => 'Disabled',
    ];

    protected $fillable = [
        'package_name',
        'price',
        'description',
        'duration',
        'is_renewable',
        'is_active',
    ];

    public $orderable = [
        'id',
        'package_name',
        'price',
        'description',
        'duration',
        'is_renewable',
        'is_active',
    ];

    public $filterable = [
        'id',
        'package_name',
        'membership_type.membership_type',
        'card_type.card_type',
        'price',
        'description',
        'duration',
        'is_active',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function membershipType()
    {
        return $this->belongsToMany(MembershipType::class);
    }

    public function cardType()
    {
        return $this->belongsToMany(CardType::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function getIsActiveLabelAttribute($value)
    {
        return static::IS_ACTIVE_SELECT[$this->is_active] ?? null;
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
