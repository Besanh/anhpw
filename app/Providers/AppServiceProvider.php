<?php

namespace App\Providers;

use App\Models\Menu;
use App\Models\Setting;
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
        View::composer('frontend.layouts.topbar', function ($view) {
            $socials = Setting::where('status', 1)
                ->where('name', 'socials')
                ->select('value_setting')
                ->first();
            $phone = Setting::where('status', 1)
                ->where('name', 'phone')
                ->select('value_setting')
                ->first();
            $view->with(compact(['socials', 'phone']));
        });

        ///////////////////////////////////////////////////////////////////
        ///////////////////////////// Menu Topbar ////////////////////////
        /////////////////////////////////////////////////////////////////
        View::composer('frontend.layouts.sub-files.menu-topbar', function ($view) {
            $parent_menus = $this->getParentTopBar();
            $str = '';
            if ($parent_menus) {
                foreach ($parent_menus as $k => $p) {
                    $max_key[] = $k;
                    if ($p->route) {
                        $url = route($p->route);
                    } else {
                        $url = $p->url == 'javascript:void(0)' ? $p->url : url($p->url);
                    }
                    $str .= '<li class="list-inline-item g-mx-4">';
                    $str .= '<a class="account-dropdown-invoker-2 g-color-white-opacity-0_6 g-color-primary--hover g-font-weight-400 g-text-underline--none--hover"
                    class="g-color-white-opacity-0_6 g-color-primary--hover g-font-weight-400 g-text-underline--none--hover"
                    href="' . $url . '" aria-controls="account-dropdown-2" aria-haspopup="true" aria-expanded="false"
                    data-dropdown-event="hover" data-dropdown-target="#' . $p->alias . '"
                    data-dropdown-type="css-animation" data-dropdown-duration="300" data-dropdown-hide-on-scroll="false"
                    data-dropdown-animation-in="fadeIn" data-dropdown-animation-out="fadeOut">
                    ' . $p->name . '
                </a>';
                    $str .= $this->getChildTopBar($p->id, $p->type_id, $p->alias);
                    $str .= '</li>';
                    $str .= '<li class="list-inline-item g-color-white-opacity-0_3 g-mx-4">|</li>';
                }
            }
            $view->with(['tree_topbar' => $str]);
        });

        ///////////////////////////////////////////////////////////////////
        ///////////////////////////// Logo ///////////////////////////////
        /////////////////////////////////////////////////////////////////
        View::composer('frontend.layouts.navigation', function ($view) {
            $logo = 'no-image.png';
            $logo = Setting::where([
                ['name', '=', 'logo'],
                ['status', '=', 1]
            ])
                ->select('value_setting')
                ->first();
            $view->with(compact('logo'));
        });
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
                    ->whereIn('id', [1, 8]);
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

    public function getParentTopBar()
    {
        $menus = [];
        $menus = Menu::where([
            ['parent_id', '=', 0],
            ['type_id', '=', 6],
            ['status', '=', 1]
        ])
            ->select(['id', 'type_id', 'name', 'alias', 'route', 'url', 'note'])
            ->get();

        return $menus;
    }

    public function getChildTopBar($parent_id, $type_id, $alias)
    {
        $str = '';
        $child_menus = Menu::where([
            ["parent_id", '=', $parent_id],
            ['type_id', '=', $type_id],
            ['status', "=", 1]
        ])
            ->select(['id', 'type_id', 'name', 'alias', 'route', 'url', 'note'])
            ->get();
        $str .= '<ul id="' . $alias . '"
                class="list-unstyled u-shadow-v29 g-pos-abs g-bg-white g-width-160 g-pb-5 g-mt-19 g-z-index-2"
                aria-labelledby="account-dropdown-invoker-2">';
        if ($child_menus) {
            foreach ($child_menus as $s) {
                if ($s->route) {
                    $url = route($s->route);
                } else {
                    $url = $s->url == 'javascript:void(0)' ? $s->url : url($s->url);
                }

                $str .= '<li>';
                $str .= '<a class="d-block g-color-black g-color-primary--hover g-text-underline--none--hover g-font-weight-400 g-py-5 g-px-20"
                        href="' . $url . '">
                        ' . $s->name . '
                    </a>';
                $str .= '</li>';
            }
        }
        $str .= '</ul>';
        return $str;
    }
}
