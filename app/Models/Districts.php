<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Districts extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'province_id', 'status', 'note'];

    public function getProvinces()
    {
        return $this->belongsTo(Provinces::class, 'province_id', 'id');
    }

    public function getProvinceMap()
    {
        $combined = [];
        $collection = collect(['name']);
        $query = Provinces::select(['id', 'name'])
            ->orderByRaw('updated_at desc, id')
            ->get();
        if ($query) {
            foreach($query as $node)
            {
                $combined[$node->id] = Arr::get($collection->combine(['name' => $node->name]), 'name');
            }
        }
        
        return $combined;
    }
}
