<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'ckfinder/*',
        'admin/bill-detail/editable-customer',
        'admin/bill-detail/editable-detail',
        'admin/bill-detail/editable-consignee',
        'admin/bill-detail/editable-invoice',
    ];
}
