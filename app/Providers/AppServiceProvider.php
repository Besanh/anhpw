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
            $parent_menus = $this->getParent($type = 6);
            $str = '';
            if ($parent_menus) {
                foreach ($parent_menus as $k => $p) {
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
            $str = '';
            $parent_menus = $this->getParentNav();
            if ($parent_menus) {
                foreach ($parent_menus as $key => $v) {
                    if ($v->route) {
                        $real_path = route($v->route);
                    } else {
                        $real_path = $v->url == 'javascript:void(0)' ? $v->url : url($v->url);
                    }
                    if ($v->name == 'Home') {
                        $str .= '<li class="nav-item g-ml-10--lg">';
                        $str .= '<a class="nav-link text-uppercase g-color-primary--hover g-pl-5 g-pr-0 g-py-20"
                        href="' . $real_path . '" >' .
                            $v->name
                            . '</a>';
                        $str .= $this->getChildHomeNav($v->id, $v->type_id);
                        $str .= '</li>';
                    } elseif ($v->name == 'Categories') {
                        $str .= '<li class="hs-has-mega-menu nav-item g-mx-10--lg g-mx-15--xl" data-animation-in="fadeIn"
                        data-animation-out="fadeOut" data-position="right">
                        <a id="mega-menu-label-3" class="nav-link text-uppercase g-color-primary--hover g-px-5 g-py-20"
                            href="' . $real_path . '" aria-haspopup="true" aria-expanded="false">
                            ' . $v->name . '
                            <i class="hs-icon hs-icon-arrow-bottom g-font-size-11 g-ml-7"></i>
                        </a>';
                        $str .= $this->getChildCateNav($v->id, $v->type_id);

                        $str .= '</li>';
                    }
                }
            }
            $view->with(['logo' => $logo, 'tree' => $str]);
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

    public function getParent($type)
    {
        $menus = [];
        $menus = Menu::where([
            ['parent_id', '=', 0],
            ['type_id', '=', $type],
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

    public function getParentNav()
    {
        $menus = [];
        $menus = Menu::where([
            ['parent_id', '=', 0],
            ['type_id', '=', 2],
            ['status', '=', 1]
        ])
            ->select(['id', 'type_id', 'name', 'alias', 'route', 'url', 'note'])
            ->get();

        return $menus;
    }

    public function getChildHomeNav($parent_id, $type_id)
    {
        $str = '';
        $child_menus = $this->queryChild($parent_id, $type_id);
        if ($child_menus) {
            foreach ($child_menus as $key => $v) {
                if ($v->route) {
                    $real_path = route($v->route);
                } else {
                    $real_path = $v->url == 'javascript:void(0)' ? $v->url : url($v->url);
                }
                $str .= '<ul id="nav-submenu--home"
                                    class="hs-sub-menu list-unstyled u-shadow-v11 g-min-width-220 g-brd-top g-brd-primary g-brd-top-2 g-mt-17"
                                    aria-labelledby="nav-link--home">';
                $str .= '<li class="dropdown-item">';
                $str .= '<a class="nav-link g-color-gray-dark-v4" href="' . $real_path . '">' . strtoupper($v->name) . '</a>';
                $str .= '</li>';
                $str .= '</ul>';
            }
        }

        return $str;
    }

    public function getChildCateNav($parent_id, $type_id)
    {
        $str = '';
        $str_link = '';
        $child_menus = $this->queryChild($parent_id, $type_id);

        if ($child_menus) {
            $str .= '<div class="w-100 hs-mega-menu u-shadow-v11 g-text-transform-none g-brd-top g-brd-primary g-brd-top-2 g-bg-white g-pa-30 g-mt-17"
            aria-labelledby="mega-menu-label-3">';
            $str .= '<div class="row">';
            foreach ($child_menus as $key => $v) {
                if ($v->route) {
                    $real_path = route($v->route);
                } else {
                    $real_path = $v->url == 'javascript:void(0)' ? $v->url : url($v->url);
                }

                $str .= '<div class="col-sm-6 col-lg-2 g-mb-30 g-mb-0--md">';
                $str .= '<div class="mb-5">';
                $str .= '<span class="d-block g-font-weight-500 text-uppercase mb-2">' . $v->name . '</span>';
                $str .= $this->getCateSubNav($v->id, $v->type_id);
                $str .= '</div>';
                $str .= '</div>';

                if ($v->image) {
                    $str .= '<div class="col-md-6 col-lg-4 g-mb-30 g-mb-0--md">
                    <article class="g-pos-rel">
                        <img class="img-fluid" src="' . getImage($v->image) . '"
                            alt="Image Description">
        
                        <div class="g-pos-abs g-bottom-30 g-left-30">
                            <span class="d-block g-color-gray-dark-v4 mb-2">Modern
                                Lighting</span>
                            <span class="d-block h4">Desk Clock 65" Table Lamp</span>
                            <span
                                class="d-block g-color-gray-dark-v3 g-font-size-16 mb-4">$156.00</span>
                            <a class="btn u-btn-primary u-shadow-v29 g-font-size-12 text-uppercase g-py-10 g-px-20"
                                href="#">Add to Cart</a>
                        </div>
                    </article>
                </div>';
                }
            }
        }
        $str .= '</div>';
        $str .= '</div>';
        return $str;
    }

    public function queryChild($parent_id, $type_id)
    {
        return Menu::where([
            ["parent_id", '=', $parent_id],
            ['type_id', '=', $type_id],
            ['status', "=", 1]
        ])
            ->select(['id', 'type_id', 'name', 'alias', 'route', 'url', 'image', 'note'])
            ->get();
    }

    public function getCateSubNav($parent_id, $type_id)
    {
        $str = '';
        $sub_menu = $this->queryChild($parent_id, $type_id);
        if ($sub_menu) {
            foreach ($sub_menu as $s) {
                if ($s->route) {
                    $real_path = route($s->route);
                } else {
                    $real_path = $s->url == 'javascript:void(0)' ? $s->url : url($s->url);
                }
                $str .= '<ul class="list-unstyled">';
                $str .= '<li>';
                $str .= '<a class="d-block g-color-text g-color-primary--hover g-text-underline--none--hover g-py-5"
                href="' . $real_path . '">' . $s->name . '</a>';
                $str .= '</li>';
                $str .= '</ul>';
            }
        }
        return $str;
    }
}
