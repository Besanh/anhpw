<?php
$title = $brand->name;
$head_table = [
'Id' => $brand->id,
'Name' => $brand->name,
'Name SEO' => $brand->name_seo,
'Description' => $brand->description,
'Image' => $brand->description,
'Priority' => $brand->prioriy,
'Status' => $brand->status,
'Created At' => $brand->created_at,
'Updated At' => $brand->updated_at,
'Action' => '',
];
$main_link = 'brand';
?>
@section('title', $title)
    @extends('admin.layouts.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ 'Brand' }}</h1>
    </div>
    <div class="card mx-auto">
        @if (Session::has('message'))
            <div>
                <div class="alert alert-success">
                    {!! Session::get('message') !!}
                </div>
            </div>
        @elseif(Session::has('message_error'))
            <div>
                <div class="alert alert-danger">
                    {!! Session::get('message_error') !!}
                </div>
            </div>
        @endif
        <div class="card-header border-bottom-primary">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <a href="{!! route($main_link . '.index') !!}" class="float-right">Brands</a>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <tbody>
                            @if ($brand)
                                @foreach ($head_table as $head => $item)
                                    <tr>
                                        <th>{{ $head }}</th>
                                        <td>
                                            @if ($head == 'Action')
                                            @include('helper.action', ['uri' => $main_link, 'id' => $brand->id])
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
    </div>
@endsection
@include('helper.be-crud')
