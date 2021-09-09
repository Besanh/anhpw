<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
    use HasFactory;

    const MENU_ADMIN = "admin";
    const MENU_NAV = "navigation";
    const MENU_FOOTER = "footer";

    protected $fillable = ['parent_id', 'type_id', 'name', 'name_seo', 'alias', 'url', 'icon', 'priority', 'status', 'note'];

    public $level = 0;

    public static function buildTree($type_id, $status = 1)
    {
        $tree = [];
        $query = self::where([
            'type_id' => $type_id,
            'parent_id' => 0
        ])
            ->orderByRaw('status desc, priority desc, id');

        if (is_numeric($status)) {
            $query->where(function ($query) use ($status) {
                $query->where('status', $status);
            });
        } else {
            $status = '';
        }

        $data = $query->get();
        if ($data) {
            foreach ($data as $n) {
                self::proccessTree($tree, $n, $status);
            }
        }

        return $tree;
    }

    public static function proccessTree(&$tree, $node, $status, $level = 0)
    {
        $node->level = $level;
        array_push($tree, $node);
        $query = self::where([
            'parent_id' => $node->id,
            'type_id' => $node->type_id
        ])
            // ->whereStatus($status != '')
            ->orderByRaw('priority desc, id')
            ->get();
        if ($query) {
            foreach ($query as $n) {
                self::proccessTree($tree, $n, $status, $level + 1);
            }
        }
    }

    public static function buildTreeById($id)
    {
        $tree = [];
        $data = self::where('type_id', $id)
            ->orderByRaw('priority desc, id')
            ->first();
        if ($data) {
            self::proccessTree($tree, $data, '');
        }
        return $tree;
    }

    public static function buildDataForList($tree, $eliminated = null)
    {
        $list = [];
        $list_eliminated = [];
        if ($eliminated > 0) {
            // $collection = collect(['id']);
            $query = self::buildTreeById($eliminated);
            if ($query) {
                foreach ($query as $node) {
                    $list_eliminated[$node->id] = strtoupper($node->id);
                    // $list_eliminated[$node->id] = $collection->combine(['id' => strtoupper($node->id)]);
                }
            }
        }
        foreach ($tree as $node) {
            if ($node->id != $eliminated && !in_array($node->id, $list_eliminated)) {
                $list[$node->id] = str_repeat('-', $node->level * 5) . $node->name;
            }
        }

        return $list;
    }

    public static function findMenuType($alias)
    {
        return self::find()
            ->alias('m')
            ->innerJoin('menu_types as mt', 'm.type_id=t.id')
            ->where([
                'status' => 1,
                'alias' => $alias,
                'parent_id' => 0
            ])
            ->get();
    }

    public static function getMenuType()
    {
        $collection = collect(['name']);
        $combined = [];
        $query = MenuType::select(['id', 'name'])->orderByRaw('updated_at desc, id')->get();
        if ($query) {
            foreach ($query as $node) {
                $combined[$node->id] = $collection->combine(['name' => strtoupper($node->name)]);
            }
        }
        return $combined;
    }

    // Hien menu type name trong index
    public static function mapMenuType($type_id)
    {
        $collection = collect(['name']);
        $query = MenuType::select(['id', 'name'])
            ->where("id", $type_id)
            ->orderByRaw('updated_at desc, id')
            ->first();
        if ($query) {
            return Arr::get($collection->combine(['name' => strtoupper($query->name)]), 'name');
        }
    }

    public function getParents()
    {
        return $this->hasOne(self::class, 'parent_id', 'id');
    }

    public function getChilds()
    {
        return $this->hasMany(self::class, 'parent_id', 'id')
            ->orderByRaw('priority desc, id');
    }

    public function getType()
    {
        return $this->belongsTo(MenuType::class, 'id', 'type_id');
    }
}
