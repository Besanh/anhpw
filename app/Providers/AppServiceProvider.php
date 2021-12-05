<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Menu;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cache;

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
        ///////////////////////////// Admin Other ////////////////////////
        /////////////////////////////////////////////////////////////////
        View::composer('admin.layouts.sidebar', function ($view) {
            $parent_other_tree = $this->getParent(1, $cache_name = 'parent_admin');
            $other_tree = '';
            if ($parent_other_tree) {
                foreach ($parent_other_tree as $node) {
                    if ($node->route) {
                        $url = route($node->route);
                    } else {
                        $url = $node->url == 'javascript:void(0)' ? $node->url : url($node->url);
                    }
                    if (!$node->head) {
                        $other_tree .= '<a class="nav-link" href="' . $url . '">
                        <i class="' . $node->icon . '"></i>
                        <span>' . $node->name . '</span></a>';
                    } else {
                        $other_tree .= '<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#' . $node->note . '"
                    aria-expanded="true" aria-controls="' . $node->note . '">
                    <i class="' . $node->icon . '"></i>
                    <span>' . $node->head . '</span>
                </a>';
                        $other_tree .= '<div id="' . $node->note . '" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Custom Utilities:</h6>';
                        $other_tree .= $this->getChildOther($node->id, $node->type_id, 'child_admin');
                        $other_tree .= '</div>
                        </div>';
                        $other_tree .= '<hr class="sidebar-divider">';
                    }
                }
            }
            Cache::remember('OTHER_TREE', timeToLive(), function () use ($other_tree) {
                return $other_tree;
            });
            // $view->with(compact('other_tree'));
        });

        ///////////////////////////////////////////////////////////////////
        ///////////////////////////// Menu Topbar ////////////////////////
        /////////////////////////////////////////////////////////////////
        View::composer('frontend.layouts.sub-files.menu-topbar', function ($view) {
            $parent_menus = $this->getParent($type = 3, $cache_name = 'parent_topbar');
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
            Cache::remember('TREE_TOPBAR', timeToLive(), function () use ($str) {
                return $str;
            });
        });

        ///////////////////////////////////////////////////////////////////
        ///////////////////////////// Navigation /////////////////////////
        /////////////////////////////////////////////////////////////////
        View::composer('frontend.layouts.navigation', function ($view) {
            $logo = 'no-image.png';
            $logo = Cache::remember('logo', timeToLive(), function () {
                return Setting::where([
                    ['name', '=', 'logo'],
                    ['status', '=', 1]
                ])
                    ->select('value_setting')
                    ->first();
            });
            $str = '';
            $parent_menus = $this->getParentNav();
            if ($parent_menus) {
                foreach ($parent_menus as $key => $v) {
                    if ($v->route) {
                        $real_path = route($v->route);
                    } else {
                        $real_path = $v->url == 'javascript:void(0)' ? $v->url : url($v->url);
                    }
                    if ($v->id == 27) {
                        $str .= '<li class="nav-item g-ml-10--lg">';
                        $str .= '<a class="nav-link text-uppercase g-color-primary--hover g-pl-5 g-pr-0 g-py-20"
                        href="' . $real_path . '" >' . $v->name . '</a>';
                        $str .= $this->getChildHomeNav($v->id, $v->type_id);
                        $str .= '</li>';
                    } elseif ($v->id == 30) {
                        $str .= '<li class="hs-has-mega-menu nav-item g-mx-10--lg g-mx-15--xl" data-animation-in="fadeIn"
                        data-animation-out="fadeOut" data-position="right">
                        <a id="mega-menu-label-3" class="nav-link text-uppercase g-color-primary--hover g-px-5 g-py-20"
                            href="' . $real_path . '" aria-haspopup="true" aria-expanded="false">
                            ' . $v->name . '
                            <i class="hs-icon hs-icon-arrow-bottom g-font-size-11 g-ml-7"></i>
                        </a>';
                        $str .= $this->getChildCateNav($v->id, $v->type_id);

                        $str .= '</li>';
                    } else {
                        $str .= '<li class="nav-item g-ml-10--lg">';
                        $str .= '<a class="nav-link text-uppercase g-color-primary--hover g-pl-5 g-pr-0 g-py-20"
                        href="' . $real_path . '" >' . $v->name . '</a>';
                        $str .= $this->getChildHomeNav($v->id, $v->type_id);
                        $str .= '</li>';
                    }
                }
            }
            Cache::remember('TREE_NAV', timeToLive(), function () use ($str) {
                return $str;
            });
            $view->with(compact('logo'));
        });

        ///////////////////////////////////////////////////////////////////
        ///////////////////////////// Footer /////////////////////////////
        /////////////////////////////////////////////////////////////////
        View::composer('frontend.layouts.footer', function ($view) {
            Cache::remember('menus_product_footer', timeToLive(), function () {
                return Menu::where([
                    ['status', '=', '1'],
                    ['id', '=', 37]
                ])
                    ->select(['id', 'name', 'name_seo', 'url', 'alias'])
                    ->first();
            });
            Cache::remember('menus_brand_footer', timeToLive(), function () {
                return Menu::where([
                    ['status', '=', '1'],
                    ['id', '=', 38]
                ])
                    ->select(['id', 'name', 'name_seo', 'url', 'alias'])
                    ->first();
            });
            Cache::remember('product_in_menu_footer', timeToLive(), function () {
                return Product::select([
                    'products.id',
                    'products.name',
                    'products.name_seo',
                    'brands.alias as b_alias'
                ])
                    ->join('brands', 'brands.id', '=', 'products.bid')
                    ->join('prices', 'prices.pid', '=', 'products.id')
                    ->where([
                        ['brands.status', '=', 1],
                        ['products.status', '=', 1],
                        ['prices.status', '=', 1]
                    ])
                    ->orderBy('products.promote', 'DESC')
                    ->orderBy('products.id', 'ASC')
                    ->limit(8)
                    ->get();
            });
            Cache::remember('brands_footer', timeToLive(), function () {
                return Brand::where('status', 1)
                    ->orderBy('priority', 'DESC')
                    ->orderBy('id', 'ASC')
                    ->limit(8)
                    ->select([
                        'id',
                        'name',
                        'name_seo',
                        'alias'
                    ])
                    ->get();
            });
        });

        ///////////////////////////////////////////////////////////////////
        ///////////////////////// Topbar, Footer /////////////////////////
        /////////////////////////////////////////////////////////////////
        View::composer(['frontend.layouts.footer', 'frontend.layouts.topbar'], function ($view) {
            $phone = Cache::remember('phone', timeToLive(), function () {
                return Setting::where('status', 1)
                    ->where('name', 'phone')
                    ->select('value_setting')
                    ->first();
            });
            $address = Cache::remember('address', timeToLive(), function () {
                return Setting::where('status', 1)
                    ->where('name', 'address')
                    ->select('value_setting')
                    ->first();
            });
            $email = Cache::remember('email', timeToLive(), function () {
                return Setting::where('status', 1)
                    ->where('name', 'email')
                    ->select('value_setting')
                    ->first();
            });
            $socials = Cache::remember('socials', timeToLive(), function () {
                return Setting::where('status', 1)
                    ->where('name', 'socials')
                    ->select('value_setting')
                    ->first();
            });
            $payment = Cache::remember('payment', timeToLive(), function () {
                return Setting::where('status', 1)
                    ->where('name', 'payment')
                    ->select('value_setting')
                    ->first();
            });
            $view->with(compact(['phone', 'address', 'email', 'socials', 'payment']));
        });
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

    public function getParent($type, $cache_name = 'default_parent')
    {
        $menus = [];
        $menus = Cache::remember($cache_name, timeToLive(), function () use ($type) {
            return Menu::where([
                ['parent_id', '=', 0],
                ['type_id', '=', $type],
                ['status', '=', 1]
            ])
                ->orderBy('priority', 'ASC')
                ->orderBy('id', 'DESC')
                ->select([
                    'id',
                    'parent_id',
                    'type_id',
                    'head',
                    'name',
                    'name_seo',
                    'alias',
                    'route',
                    'url',
                    'icon',
                    'note'
                ])
                ->get();
        });

        return $menus;
    }

    public function getChildTopBar($parent_id, $type_id, $alias, $cache_name = 'default_child_topbar')
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

    public function getParentNav($cache_name = 'default_parent_nav')
    {
        $menus = [];
        $menus = Cache::remember($cache_name, timeToLive(), function () {
            return Menu::where([
                ['parent_id', '=', 0],
                ['type_id', '=', 2],
                ['status', '=', 1]
            ])
                ->select(['id', 'type_id', 'name', 'name_seo', 'alias', 'route', 'url', 'note'])
                ->orderBy('priority', 'ASC')
                ->orderBy('id', 'DESC')
                ->get();
        });

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

    public function getChildCateNav($parent_id, $type_id, $cache_name = 'child_cate_nav')
    {
        $str = '';
        $real_path = '';
        $child_menus = $this->queryChild($parent_id, $type_id, $cache_name);

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
                $str .= '<span class="d-block g-font-weight-500 text-uppercase mb-2">';
                $str .= '<a class="nav-link g-color-primary--hover" href="' . $real_path . '">';
                $str .= $v->name;
                $str .= '</a>';
                $str .= '</span>';
                $str .= $this->getCateSubNav($v->id, $v->type_id, 'cache_subnav');
                $str .= '</div>';
                $str .= '</div>';

                if ($v->image) {
                    //     $str .= '<div class="col-md-6 col-lg-4 g-mb-30 g-mb-0--md">
                    //     <article class="g-pos-rel">
                    //         <img class="img-fluid" src="' . getImage($v->image) . '"
                    //             alt="' . $v->name . '">

                    //         <div class="g-pos-abs g-bottom-30 g-left-30">
                    //             <span class="d-block g-color-gray-dark-v4 mb-2">Modern
                    //                 Lighting</span>
                    //             <span class="d-block h4">Desk Clock 65" Table Lamp</span>
                    //             <span
                    //                 class="d-block g-color-gray-dark-v3 g-font-size-16 mb-4">$156.00</span>
                    //             <a class="btn u-btn-primary u-shadow-v29 g-font-size-12 text-uppercase g-py-10 g-px-20"
                    //                 href="#">Add to Cart</a>
                    //         </div>
                    //     </article>
                    // </div>';
                }
            }
        }
        $str .= '</div>';
        $str .= '</div>';
        return $str;
    }

    public function queryChild($parent_id, $type_id, $cache_name = 'default_query_child')
    {
        return Menu::where([
            ["parent_id", '=', $parent_id],
            ['type_id', '=', $type_id],
            ['status', "=", 1]
        ])
            ->select([
                'id',
                'parent_id',
                'type_id',
                'head',
                'name',
                'name_seo',
                'route',
                'url',
                'icon',
                'status',
                'note'
            ])
            ->orderBy('priority', 'ASC')
            ->get();
    }

    public function getCateSubNav($parent_id, $type_id, $cache_name = 'default_cache_subnav')
    {
        $str = '';
        $real_path = '';
        $sub_menu = $this->queryChild($parent_id, $type_id, $cache_name);
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

    // public function getChildArrival($parent_id, $type_id)
    // {
    //     $str = '';
    //     $real_path = '';
    //     $sub_menu = $this->queryChild($parent_id, $type_id);
    //     if ($sub_menu) {
    //         $str .= '<!-- Mega Menu -->
    //             <div class="w-100 hs-mega-menu u-shadow-v11 g-text-transform-none g-brd-top g-brd-primary g-brd-top-2 g-bg-white g-pa-30 g-mt-17"
    //                 aria-labelledby="mega-menu-label-5">
    //                 <div class="row">';
    //         $arrival_products = getArrivalProduct();
    //         if ($arrival_products) {
    //             $route = '';
    //             foreach ($arrival_products as $p) {
    //                 $route = route('product-detail', ['brand_alias' => $p->b_alias, 'id' => $p->id, 'product_alias' => toAlias($p->name_seo)]);
    //                 $str .= '<div class="col-md-4 g-mb-30 g-mb-0--md">
    //                 <!-- Article -->
    //                 <article
    //                     class="g-bg-size-cover g-bg-pos-center g-bg-cover g-bg-bluegray-opacity-0_3--after text-center g-px-40 g-py-80"
    //                     data-bg-img-src="' . getImage($p->thumb) . '">
    //                     <div class="g-pos-rel g-z-index-1">
    //                         <span
    //                             class="d-block g-color-white g-font-weight-400 text-uppercase mb-3">' . $p->cate_name_seo . '</span>
    //                         <span class="d-block h2 g-color-white mb-4"></span>
    //                         <a class="btn u-btn-white g-brd-primary--hover g-color-white--hover g-bg-primary--hover g-font-size-11 text-uppercase g-py-10 g-px-20"
    //                             href="' . $route . '">Shop Now</a>
    //                     </div>
    //                 </article>
    //                 <!-- End Article -->
    //             </div>';
    //             }
    //         }
    //         // foreach ($sub_menu as $s) {
    //         //     if ($s->route) {
    //         //         $real_path = route($s->route);
    //         //     } else {
    //         //         $real_path = $s->url == 'javascript:void(0)' ? $s->url : url($s->url);
    //         //     }
    //         //     $str .= '<div class="col-md-4 g-mb-30 g-mb-0--md">
    //         //         <!-- Article -->
    //         //         <article
    //         //             class="g-bg-size-cover g-bg-pos-center g-bg-cover g-bg-bluegray-opacity-0_3--after text-center g-px-40 g-py-80"
    //         //             data-bg-img-src="' . getImage($s->image) . '">
    //         //             <div class="g-pos-rel g-z-index-1">
    //         //                 <span
    //         //                     class="d-block g-color-white g-font-weight-400 text-uppercase mb-3">Blouse</span>
    //         //                 <span class="d-block h2 g-color-white mb-4">' . $s->name . '</span>
    //         //                 <a class="btn u-btn-white g-brd-primary--hover g-color-white--hover g-bg-primary--hover g-font-size-11 text-uppercase g-py-10 g-px-20"
    //         //                     href="' . $real_path . '">Shop Now</a>
    //         //             </div>
    //         //         </article>
    //         //         <!-- End Article -->
    //         //     </div>';
    //         // }
    //         $str .= '</div>
    //         </div>';
    //     }
    //     return $str;
    // }

    public function getChildOther($parent_id, $type_id, $cache_name = 'default_child_admin')
    {
        $str = '';
        $menu_child = $this->queryChild($parent_id, $type_id, $cache_name);

        if ($menu_child) {
            foreach ($menu_child as $child) {
                if ($child->route) {
                    $url = route($child->route);
                } else {
                    $url = $child->url == 'javascript:void(0)' ? $child->url : url($child->url);
                }
                $str .= '<a class="collapse-item" href="' . $url . '">' . $child->name . '</a>';
            }
        }
        return $str;
    }
}
