<?php
$title = __($product->name);
$head_table = [
'Id' => $product->id,
'Cate_id' => $product->cate_id,
'Bid' => $product->bid,
'Name' => $product->name,
'Name SEO' => $product->name_seo,
'Designer' => $product->designer,
'Public Year' => $product->public_year,
'Image' => $product->image,
'Image Thumb Small' => $product->image_thumb_small,
'Thumb' => $product->thumb,
'Thumb Small' => $product->thumb_small,
'Description' => $product->description,
'Benefit' => $product->benefit,
'Ingredient' => $product->ingredient,
'Incense Group' => $product->incense_group,
'Styles' => $product->styles,
'Galleries' => $product->galleries,
'Promote' => $product->promote,
'Status' => $product->status,
'Created At' => $product->created_at,
'Updated At' => $product->updated_at,
'Action' => '',
];
$main_link = 'product';
?>
@section('title', $title)
    @extends('admin.layouts.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __('Product') }}</h1>
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
                    <a href="{!! route($main_link . '.index') !!}" class="float-right">{{ __('Product') }}</a>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <tbody>
                            @if ($product)
                                @foreach ($head_table as $head => $item)
                                    <tr>
                                        <th>{{ $head }}</th>
                                        <td>
                                            @if ($head == 'Action')
                                                @include('helper.action', ['uri' => $main_link, 'id' => $product->id])
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
