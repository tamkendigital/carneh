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

class Inquiry extends Model
{
    use HasFactory, HasAdvancedFilter, SoftDeletes, Tenantable, Auditable;

    public $table = 'inquiries';

    protected $dates = [
        'created_at',
        'submission_date',
        'approval_date',
        'updated_at',
        'deleted_at',
    ];

    public const STATUS_SELECT = [
        'Pending'  => 'Pending',
        'Accepted' => 'Accepted',
        'Rejected' => 'Rejected',
    ];

    public const REQUEST_TYPE_SELECT = [
        'New Issuance' => 'New Issuance',
        'Renewal'      => 'Renewal',
        'Update'       => 'Update',
    ];

    protected $fillable = [
        'inquiriesnumber',
        'user_id',
        'association_id',
        'request_type',
        'status',
        'submission_date',
        'approval_date',
    ];

    public $orderable = [
        'id',
        'inquiriesnumber',
        'user.name',
        'association.association_name',
        'request_type',
        'status',
        'submission_date',
        'approval_date',
    ];

    public $filterable = [
        'id',
        'inquiriesnumber',
        'user.name',
        'association.association_name',
        'request_type',
        'status',
        'submission_date',
        'approval_date',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function association()
    {
        return $this->belongsTo(AssociationList::class);
    }

    public function getRequestTypeLabelAttribute($value)
    {
        return static::REQUEST_TYPE_SELECT[$this->request_type] ?? null;
    }

    public function getCreatedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function getStatusLabelAttribute($value)
    {
        return static::STATUS_SELECT[$this->status] ?? null;
    }

    public function getSubmissionDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setSubmissionDateAttribute($value)
    {
        $this->attributes['submission_date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getApprovalDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setApprovalDateAttribute($value)
    {
        $this->attributes['approval_date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
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
