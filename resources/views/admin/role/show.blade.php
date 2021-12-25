<?php
$title = __('Role - Show');
$head_table = [
'Id' => $role->id,
'Name' => $role->name,
'Guard Name' => $role->guard_name,
'Created At' => $role->created_at,
'Updated At' => $role->updated_at,
'Action' => '',
];
$main_link = 'role';
?>
@extends('admin.layouts.main')
@section('title', $title)

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __($role->name) }}</h1>
    </div>
    <div class="card mx-auto">
        <div class="card-header border-bottom-primary">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <a href="{!! route($main_link . '.index') !!}" class="float-right">{{ __('Roles') }}</a>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <tbody>
                            @if ($role)
                                @foreach ($head_table as $head => $item)
                                    <tr>
                                        <th>{{ $head }}</th>
                                        <td>
                                            @if ($head == 'Action')
                                                @include('helper.action', ['uri' => $main_link, 'id' => $role->id])
                                            @else
                                                {{ $item }}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <div class="card-header border-bottom-primary">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <h3>{{ __('Assigned Permissions') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Guard Name') }}</th>
                        <tbody>
                            @if ($rolePermissions)
                                @foreach ($rolePermissions as $permission)
                                    <tr>
                                        <td>
                                            {{ $permission->name }}
                                        </td>
                                        <td>
                                            {{ $permission->guard_name }}
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card-header border-bottom-primary">
                    <div class="row">
                        <div class="col-md- col-sm-12 col-xs-12">
                            <h3>{{ __('Assigned Menus') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <th>{{ __('Name') }}</th>
                        <tbody>
                            @if ($menus)
                                @foreach ($menus as $k => $m)
                                    @if ($menu_role && $menu_role->count() > 0 && in_array($k, unserialize($menu_role->menu)))
                                        <tr>
                                            <td>{{ $m }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
