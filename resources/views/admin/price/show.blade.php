<?php
$title = __('Price - Show');
$head_table = [
'Id' => $price->id,
'Sap ID' => $price->sap_id,
'Barcode' => $price->barcode,
'Name' => $price->name,
'Name SEO' => $price->name_seo,
'Promote' => $price->promote,
'Capa' => $price->capa,
'Capa ID' => $price->capa_id,
'Price' => $price->price,
'Status' => $price->status,
'Note' => $price->note,
'Stock' => $price->stock,
'Created By' => $price->created_by,
'Updated By' => $price->updated_by,
'Created At' => $price->created_at,
'Updated At' => $price->updated_at,
'Action' => '',
];
$main_link = 'price';
?>
@extends('admin.layouts.main')
@section('title', $title)

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __('Price') }}</h1>
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
                    <a href="{!! route($main_link . '.index') !!}" class="float-right">{{ __('Prices') }}</a>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <tbody>
                            @if ($price)
                                @foreach ($head_table as $head => $item)
                                    <tr>
                                        <th>{{ $head }}</th>
                                        <td>
                                            @if ($head == 'Action')
                                                @include('helper.action', ['uri' => $main_link, 'id' => $price->id])
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
