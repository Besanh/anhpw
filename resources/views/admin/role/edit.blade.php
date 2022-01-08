<?php
$title = __('Role - Edit');
$status = getStatus();
$main_link = 'role';
?>
@extends('admin.layouts.main')
@section('title', $title)

@section('content')
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ __('Role' . ' #' . $role->name) }}</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    @if (Session::has('message'))
                        <div>
                            <div class="alert alert-success">
                                {!! Session::get('message') !!}
                            </div>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div>
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    {!! $error !!}
                                @endforeach
                            </div>
                        </div>
                    @endif
                    <div class="card-header">
                        {{ __('Role, permission & menu') }}
                        <a href="{{ route($main_link . '.index') }}" class="float-right">{{ __('Roles') }}</a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route($main_link . '.update', $role->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Name') }}
                                </label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name', $role->name) }}" required autocomplete="name"
                                        autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="card-header">
                                        <label for="permissions" class="form-label">
                                            {{ __('Assign Permissions') }}
                                        </label>
                                        <input type="search"
                                            class="col-md-3 float-right form-control search-permission @error('search-permission') is-invalid @enderror"
                                            name="search-permission" placeholder="Search">
                                    </div>

                                    <table class="table table-striped">
                                        <thead>
                                            <th scope="col" width="1%"><input type="checkbox" name="all_permission">
                                            </th>
                                            <th scope="col" width="20%">{{ __('Name') }}</th>
                                            <th scope="col" width="1%">{{ __('Guard') }}</th>
                                        </thead>

                                        @if ($permissions)
                                            @foreach ($permissions as $permission)
                                                <tr class="body-permission">
                                                    <td>
                                                        <input type="checkbox" name="permission[{{ $permission->id }}]"
                                                            value="{{ $permission->id }}" class='permission'
                                                            {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                                                    </td>
                                                    <td>{{ $permission->name }}</td>
                                                    <td>{{ $permission->guard_name }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </table>
                                </div>

                                <div class="col-md-6">
                                    <div class="card-header">
                                        <label for="menu" class="form-label">
                                            {{ __('Assign Menu') }}
                                        </label>
                                        <input type="search"
                                            class="col-md-3 float-right form-control search-menu @error('search-menu') is-invalid @enderror"
                                            name="search-menu" placeholder="Search">
                                    </div>

                                    <table class="table table-striped">
                                        <thead>
                                            <th scope="col" width="1%"><input type="checkbox" name="all_menu">
                                            </th>
                                            <th scope="col" width="20%">{{ __('Name') }}</th>
                                        </thead>

                                        @if ($menus)
                                            @foreach ($menus as $k => $m)
                                                <tr class="body-menu">
                                                    <td>
                                                        <input type="checkbox" name="menu[]" value="{{ $k }}"
                                                            class='menu'
                                                            {{ $menu_role && $menu_role->count() > 0 && in_array($k, unserialize($menu_role->menu)) ? 'checked' : '' }}>
                                                    </td>
                                                    <td>{{ $m }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </table>
                                </div>
                            </div>

                            <div class="form-group row mb-0 mt-5">
                                <div class="col-md-12 offset-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script-role')
    <script type="text/javascript">
        $(document).ready(function() {
            // Checked all permission
            $('input[name="all_permission"]').on('click', function() {
                if ($(this).is(':checked')) {
                    $.each($('.permission'), function() {
                        $(this).prop('checked', true);
                    });
                } else {
                    $.each($('.permission'), function() {
                        $(this).prop('checked', false);
                    });
                }
            });

            // Search permission
            $(".search-permission").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".body-permission").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            // Checked all menu
            $('input[name="all_menu"]').on('click', function() {
                if ($(this).is(':checked')) {
                    $.each($('.menu'), function() {
                        $(this).prop('checked', true);
                    });
                } else {
                    $.each($('.menu'), function() {
                        $(this).prop('checked', false);
                    });
                }
            });

            // Search menu
            $(".search-menu").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".body-menu").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });

    </script>
@endpush
