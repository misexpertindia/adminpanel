<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use \DateTimeInterface;

class Assethandover extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'assethandovers';

    protected $appends = [
        'approvals',
    ];

    const ALLASSETS_SELECT = [
        'Y'  => 'YES',
        'N'  => 'NO',
        'NA' => 'NA',
    ];

    const EXITEMAILREC_SELECT = [
        'Y'  => 'YES',
        'N'  => 'NO',
        'NA' => 'NA',
    ];

    protected $dates = [
        'addeactivationdate',
        'itapprovaldate',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'empid_id',
        'exitemailrec',
        'allassets',
        'addeactivationdate',
        'itapprovaldate',
        'created_by_id',
        'updated_by_id',
        'comment',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function empid()
    {
        return $this->belongsTo(User::class, 'empid_id');
    }

    public function assets()
    {
        return $this->belongsToMany(Asset::class);
    }

    public function getAddeactivationdateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setAddeactivationdateAttribute($value)
    {
        $this->attributes['addeactivationdate'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getApprovalsAttribute()
    {
        return $this->getMedia('approvals');
    }

    public function getItapprovaldateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setItapprovaldateAttribute($value)
    {
        $this->attributes['itapprovaldate'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    public function updated_by()
    {
        return $this->belongsTo(User::class, 'updated_by_id');
    }
}
