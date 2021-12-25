<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            // Bill
            'bill-list',
            'bill-create',
            'bill-show',
            'bill-edit',
            'bill-delete',

            // Bill consignee
            'bill-consignee-list',

            // Bill customer
            'bill-customer-list',

            // Bill detail
            'bill-detail-list',
            'bill-editable-customer',
            'bill-editable-detail',
            'bill-editable-consignee',
            'bill-editable-invoice',

            // Bill invoice
            'bill-invoice-list',

            // Brand
            'brand-list',
            'brand-create',
            'brand-show',
            'brand-edit',
            'brand-delete',
            'brand-update-status',

            // Capacity
            'capa-list',
            'capa-create',
            'capa-show',
            'capa-edit',
            'capa-delete',
            'capa-update-status',

            // Category
            'cate-list',
            'cate-create',
            'cate-show',
            'cate-edit',
            'cate-delete',
            'cate-update-status',

            // Ckeditor
            'ckeditor-upload',

            // Contact
            'contact-list',
            'contact-create',
            'contact-show',
            'contact-edit',
            'contact-delete',
            'contact-chat',
            'contact-post-chat',

            // Help content
            'help-content-list',
            'help-content-create',
            'help-content-show',
            'help-content-edit',
            'help-content-delete',
            'help-content-update-status',
            'help-content-view-topic',

            // Help
            'help-list',
            'help-create',
            'help-show',
            'help-edit',
            'help-delete',
            'help-update-status',

            // Help type
            'help-type-list',
            'help-type-create',
            'help-type-show',
            'help-type-edit',
            'help-type-delete',

            // Home
            'home-list',

            // Menu
            'menu-list',
            'menu-create',
            'menu-show',
            'menu-edit',
            'menu-delete',
            'menu-find-menu-type',
            'menu-get-type',
            'menu',
            'menu-update-status',

            // Menu type
            'menu-type-list',
            'menu-type-create',
            'menu-type-show',
            'menu-type-edit',
            'menu-type-delete',
            'menu-type-update-status',

            // Permission
            'permission-list',
            'permission-create',
            'permission-show',
            'permission-edit',
            'permission-delete',

            // Price
            'price-list',
            'price-create',
            'price-show',
            'price-edit',
            'price-delete',
            'price-update-status',

            // Product
            'product-list',
            'product-create',
            'product-show',
            'product-edit',
            'product-delete',
            'product-update-status',
            'product-upload-gallery',
            'product-upload-thumbsmall',

            // Rs slider
            'rs-slider-list',
            'rs-slider-create',
            'rs-slider-show',
            'rs-slider-edit',
            'rs-slider-delete',
            'rs-slider-update-status',
            'rs-slider-sort-slide',
            'rs-slider-field-change',

            // Role
            'role-list',
            'role-create',
            'role-show',
            'role-edit',
            'role-delete',

            // Seo page
            'seopage-list',
            'seopage-create',
            'seopage-show',
            'seopage-edit',
            'seopage-delete',

            // Setting
            'setting-list',
            'setting-create',
            'setting-show',
            'setting-edit',
            'setting-delete',
            'setting-update-status',
            'setting-proccess-value',
            'setting-field-text',
            'setting-field-json',
            'setting-field-image',

            // Shipping
            'shipping-list',
            'shipping-create',
            'shipping-show',
            'shipping-edit',
            'shipping-delete',
            'shipping-update-status',

            // Store
            'store-list',
            'store-create',
            'store-show',
            'store-edit',
            'store-delete',
            'store-update-status',
            'store-upload',

            // User
            'user-list',
            'user-create',
            'user-show',
            'user-edit',
            'user-delete',
        ];
        foreach ($data as $node) {
            Permission::create(['name' => $node, 'guard_name' => 'admin']);
        }
    }
}
