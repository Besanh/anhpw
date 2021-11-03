<?php
$title = __('Seo Page - Show');
$head_table = [
'Id' => $seoPage->id,
'Title' => $seoPage->title,
'Pid' => $seoPage->pid,
'Page Name' => $seoPage->page_name,
'SEO Desc' => $seoPage->seo_desc,
'SEO Keyword' => $seoPage->seo_keyword,
'SEO Robot' => $seoPage->seo_robot,
'Created At' => $seoPage->created_at,
'Updated At' => $seoPage->updated_at,
'Action' => '',
];
$main_link = 'seo-page';
?>
@section('title', $title)
    @extends('admin.layouts.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __($seoPage->pid ? $seoPage->getSeo->name_seo : $seoPage->page_name) }}</h1>
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
                    <a href="{!! route($main_link . '.index') !!}" class="float-right">{{ __('SEO Page') }}</a>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <tbody>
                            @if ($seoPage)
                                @foreach ($head_table as $head => $item)
                                    <tr>
                                        <th>{{ $head }}</th>
                                        <td>
                                            @if ($head == 'Action')
                                                @include('helper.action', ['uri' => $main_link, 'id' => $seoPage->id])
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
