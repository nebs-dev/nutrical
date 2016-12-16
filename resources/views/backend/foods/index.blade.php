@extends('backend.layouts.main')

@section('content')

        <!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Search for food</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <form action="{{ route('admin_foods_list') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="title" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                              <button class="btn btn-default" type="submit">Go!</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        {{--<h2>Plain Page</h2>--}}
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    {{-- DATATABLE --}}
                    <div class="x_content">
                        <div class="x_content">
                            <div id="datatable-checkbox_wrapper"
                                 class="dataTables_wrapper form-inline dt-bootstrap no-footer">

                                <div class="row">
                                    <div class="col-sm-12">

                                        {{-- TABLE --}}
                                        <table id="datatable-checkbox"
                                               class="table table-striped table-bordered bulk_action dataTable no-footer"
                                               role="grid" aria-describedby="datatable-checkbox_info">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting_disabled" rowspan="1" colspan="1"
                                                    aria-label="" style="width: 49px;">
                                                    <div class="icheckbox_flat-green"
                                                         style="position: relative;"><input type="checkbox"
                                                                                            id="check-all"
                                                                                            class="flat"
                                                                                            style="position: absolute; opacity: 0;">
                                                        <ins class="iCheck-helper"
                                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins>
                                                    </div>
                                                </th>
                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="datatable-checkbox" rowspan="1" colspan="1"
                                                    aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending"
                                                    style="width: 240px;">Title
                                                </th>
                                                <th class="sorting" tabindex="0"
                                                    aria-controls="datatable-checkbox" rowspan="1" colspan="1"
                                                    aria-label="Position: activate to sort column ascending"
                                                    style="width: 386px;">Category
                                                </th>
                                                <th class="sorting" tabindex="0"
                                                    aria-controls="datatable-checkbox" rowspan="1" colspan="1"
                                                    aria-label="Office: activate to sort column ascending"
                                                    style="width: 184px;">Energy (kcal)
                                                </th>
                                                <th class="sorting" tabindex="0"
                                                    aria-controls="datatable-checkbox" rowspan="1" colspan="1"
                                                    aria-label="Age: activate to sort column ascending"
                                                    style="width: 102px;">Protein (g)
                                                </th>
                                                <th class="sorting" tabindex="0"
                                                    aria-controls="datatable-checkbox" rowspan="1" colspan="1"
                                                    aria-label="Start date: activate to sort column ascending"
                                                    style="width: 179px;">Carbohydrate (g)
                                                </th>
                                                <th class="sorting" tabindex="0"
                                                    aria-controls="datatable-checkbox" rowspan="1" colspan="1"
                                                    aria-label="Salary: activate to sort column ascending"
                                                    style="width: 144px;">Fiber, total dietary (g)
                                                </th>
                                            </tr>
                                            </thead>


                                            <tbody>

                                            @foreach($foods as $food)
                                                <tr role="row" class="odd">
                                                    <td>
                                                        <div class="icheckbox_flat-green"
                                                             style="position: relative;"><input type="checkbox"
                                                                                                class="flat"
                                                                                                name="table_records"
                                                                                                style="position: absolute; opacity: 0;">
                                                            <ins class="iCheck-helper"
                                                                 style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins>
                                                        </div>
                                                    </td>
                                                    <td class="sorting_1">{{ $food->title }}</td>
                                                    <td>{{ $food->category->title }}</td>
                                                    <td>{!! fromCollection($food->nutrients->toArray(), 'Energy') !!}</td>
                                                    <td>{!! fromCollection($food->nutrients->toArray(), 'Protein') !!}</td>
                                                    <td>{!! fromCollection($food->nutrients->toArray(), 'Carbohydrate, by difference') !!}</td>
                                                    <td>{!! fromCollection($food->nutrients->toArray(), 'Fiber, total dietary') !!}</td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                        {{-- /TABLE --}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="dataTables_info" id="datatable-checkbox_info" role="status"
                                             aria-live="polite">Showing 1 to 10 of 57 entries
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="dataTables_paginate paging_simple_numbers"
                                             id="datatable-checkbox_paginate">
                                            {!! $foods->appends('food')->render() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /page content -->

@stop

@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            var $datatable = $('#datatable-checkbox');

            $datatable.on('draw.dt', function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_flat-green'
                });
            });
        });
    </script>
@stop
