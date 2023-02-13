<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'parent_id'
    ];
    protected $table = 'keluarga';
    public $timestamps = false;

    public function parent()
    {
        return $this->belongsTo(Family::class, 'parent_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(Family::class, 'parent_id', 'id');
    }

    public static function getAllParent()
    {
        $grandParent = self::whereNull('parent_id')->get();
        $grandParentId = [];
        $grandParent->each(function($item) use (&$grandParentId) {
            $grandParentId[] = $item->id;
            return $grandParentId;
        });

        $parent = self::whereIn('parent_id', $grandParentId)->get();

        return $parent;
    }
}
