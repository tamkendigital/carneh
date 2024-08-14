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

class Payment extends Model
{
    use HasFactory, HasAdvancedFilter, SoftDeletes, Tenantable, Auditable;

    public $table = 'payments';

    protected $dates = [
        'payment_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const PAYMENT_METHOD_SELECT = [
        'Visa/Master' => 'Visa/Master',
        'Fawry'       => 'Fawry',
    ];

    public const PAYMENT_STATUS_SELECT = [
        'Pending'   => 'Pending',
        'Completed' => 'Completed',
        'Rejected'  => 'Rejected',
        'Failed'    => 'Failed',
    ];

    protected $fillable = [
        'user_id',
        'package_id',
        'payment_amount_id',
        'payment_date',
        'payment_method',
        'transaction_number',
        'payment_status',
    ];

    public $orderable = [
        'id',
        'user.name',
        'package.package_name',
        'payment_amount.price',
        'payment_date',
        'payment_method',
        'transaction_number',
        'payment_status',
    ];

    public $filterable = [
        'id',
        'user.name',
        'package.package_name',
        'payment_amount.price',
        'payment_date',
        'payment_method',
        'transaction_number',
        'payment_status',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function package()
    {
        return $this->belongsTo(MembershipPackage::class);
    }

    public function paymentAmount()
    {
        return $this->belongsTo(MembershipPackage::class);
    }

    public function getPaymentDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setPaymentDateAttribute($value)
    {
        $this->attributes['payment_date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getPaymentMethodLabelAttribute($value)
    {
        return static::PAYMENT_METHOD_SELECT[$this->payment_method] ?? null;
    }

    public function getPaymentStatusLabelAttribute($value)
    {
        return static::PAYMENT_STATUS_SELECT[$this->payment_status] ?? null;
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
