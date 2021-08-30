<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Menu extends Model
{
    use HasFactory;
    const MENU_ADMIN = "admin";
    const MENU_NAV = "navigation";
    const MENU_FOOTER = "footer";

    public $level = 0;

    // Lay menu cha
    public static function buildTree($type_id, $status = 1)
    {
        $query = self::where([
            'type_id' => $type_id,
            'parent_id' => 0
        ])
            ->orderBy([
                'status' => 'DESC',
                'priority' => 'DESC',
                'id' => 'ASC'
            ]);
        if (is_numeric($status)) {
            $query->where(function ($query, $status) {
                $query->where('status', $status);
            });
        } else {
            $status = '';
        }

        $data = $query->get();
        $tree = [];
        if ($data) {
            foreach ($data as $node) {
                self::processTree($tree, $node, $status);
            }
        }

        return $tree;
    }

    // Lay menu con theo menu cha
    public static function processTree($tree, $node, $status, $level = 0)
    {
        $node->level = $level;
        array_push($tree, $node);
        $data = self::where([
            'parent_id' => $node->parent_id,
            'type_id' => $node->type_id
        ])
            ->filter(['status' => $status])
            ->orderBy([
                'status' => 'DESC',
                'priority' => 'DESC',
                'id' => 'ASC'
            ])
            ->get();

        if ($data) {
            foreach ($data as $n) {
                self::processTree($tree, $n, $status, $level + 1);
            }
        }
    }

    public static function buildDataForList($tree, $eliminatedId = null)
    {
        $list = [];
        $in_eliminatedId = [];
        if ($in_eliminatedId > 0) {
            $menu = collect(self::buildTreeById($eliminatedId));
            if ($menu) {
                $in_eliminatedId = $menu->map(function ($menu) {
                    return $menu->id;
                });
            }
        }

        if ($tree) {
            foreach ($tree as $node) {
                if ($node->id != $in_eliminatedId && !in_array($node->id, $in_eliminatedId)) {
                    $list[$node->id] = str_repeat('-', Arr::get($node, 'level') * 5) . $node->name;
                }
            }
        }

        return $list;
    }

    public static function buildTreeById($id)
    {
        $tree = [];
        $data = self::find($id);
        if ($data) {
            self::processTree($tree, $data, '');
        }
    }

    public function getParents()
    {
        return $this->belongsTo(self::class, 'parent_id', 'id');
    }

    public function getChilds()
    {
        return $this->hasMany(self::class, 'parent_id', 'id')->orderBy('weight desc, id');
    }

    public function getType()
    {
        return $this->hasOne(MenuType::class, 'id', 'type_id');
    }
}
