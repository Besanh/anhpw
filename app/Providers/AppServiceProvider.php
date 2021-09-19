<?php

namespace App\Providers;

use App\Models\Menu;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        ///////////////////////////////////////////////////////////////////
        ///////////////////////////// MENU ///////////////////////////////
        /////////////////////////////////////////////////////////////////
        View::composer('admin.sidebar.menu_parents', function ($view) {
            $backend = $this->getMenuParents();
            $view->with(compact('backend'));
        });

        View::composer('admin.sidebar.menu_childs', function ($view) {
            $childs = $this->getChilds($this->getMenuParents());
            $view->with(compact('childs'));
        });

        ///////////////////////////////////////////////////////////////////
        ///////////////////////////// USERS //////////////////////////////
        /////////////////////////////////////////////////////////////////
        View::composer('admin.sidebar.user_parents', function ($view) {
            $users = $this->getUserParents();
            $view->with(compact('users'));
        });
        View::composer('admin.sidebar.user_childs', function ($view) {
            $user_childs = $this->getChilds($this->getUserParents());
            $view->with(compact('user_childs'));
        });

        ///////////////////////////////////////////////////////////////////
        ///////////////////////////// Topbar /////////////////////////////
        /////////////////////////////////////////////////////////////////
    }

    public function getMenuParents()
    {
        $backend = [];
        $backend = Menu::where([
            ["type_id", "=", 1],
            ['status', "=", 1]
        ])
            ->where(function ($query) {
                $query->where('parent_id', 0)
                ->whereIn('id', [1,8]);
            })
            ->get();
        if ($backend) {
            return $backend;
        }
    }

    public function getUserParents()
    {
        $backend = [];
        $backend = Menu::where([
            ["type_id", "=", 1],
            ["name", "=", 'Users'],
            ['status', "=", 1]
        ])
            ->where(function ($query) {
                $query->where('parent_id', 0);
            })
            ->get();
        if ($backend) {
            return $backend;
        }
    }

    public function getChilds($parents)
    {
        $childs = [];
        if ($parents) {
            foreach ($parents as $k => $node) {
                $sub_menu = Menu::where([
                    ["parent_id", '=', $node->id],
                    ['type_id', '=', $node->type_id],
                    ['status', "=", 1]
                ])
                    ->get();
                if ($sub_menu) {
                    foreach ($sub_menu as $s) {
                        $childs[] = $s;
                    }
                }
            }
        }
        return $childs;
    }
}
