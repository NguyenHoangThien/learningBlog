@extends('user.layout')

@section('header')
    <link rel="stylesheet" href="/assets/css/crawler.css" />
@stop

@section('content')
    <div class="col-sm-8">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Crawler system
                </div>
            </div>
            <div class="portlet-body">
                <div class="portlet-body form">
                    <form class="form-horizontal" role="form" action="#" method="POST">
                        <div class="form-body">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <div class="form-group">
                                <label class="col-md-3 control-label">URL</label>
                                <div class="col-md-7">
                                    <div class="input-icon">
                                        <i class="fa fa-link"></i>
                                        <input type="text" name="domainURL" class="form-control" placeholder="input url you want to craw (example: genk.vn)">
                                    </div>
                                </div>
                            </div>
                                
                            <div class="form-group">
                                <label class="col-md-3 control-label">Check character </label>
                                <div class="col-md-7">
                                    <div class="input-icon">
                                        <input type="text" name="checkCharacter" class="form-control" placeholder="check character error or something" >
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Limit pages </label>
                                <div class="col-md-3">
                                    <div class="input-icon">
                                        <input type="number" name="limitPages" class="form-control" placeholder="number" value="50">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile" class="col-md-3 control-label"></label>
                                <div class="col-md-9">
                                    <p class="help-block">
                                         make by Tinypro 2015
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @if($_SERVER['REQUEST_METHOD'] == "POST")
            <div class="portlet box blue">
                <div class="portlet-result">
                    <div class="caption success">
                        <i class="fa fa-search"></i> Result :
                    </div>
                </div>
                <div>
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Url</th>
                            <th>Status</th>
                            @if($_REQUEST['checkCharacter'])
                                <th>find</th>
                            @endif
                          </tr>
                        </thead>
                        <tbody>
                            @if($allLinks != false)
                                @foreach ($allLinks as $link)
                                    <tr>
                                        <td>
                                            <a href="{{$link['page']}}" target="_blank">
                                                {{$link['page']}}
                                            </a>
                                        </td>
                                        <td>
                                            @if(strpos($link['status'], "200"))
                                                <p style="color: green">
                                                    {{$link['status']}}
                                                </p>
                                            @else
                                                <p style="color: red">
                                                    {{$link['status']}}
                                                </p>
                                            @endif
                                                
                                        </td>
                                        @if($_REQUEST['checkCharacter'])
                                            <td style="text-align:center">
                                                @if($link['mark'] == "1")
                                                    <img src="/assets/img/button-check-green.png" style="width: 30px;">
                                                @else
                                                    <img src="/assets/img/close.png" style="width: 30px;">
                                                @endif
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
    <?= view('user.common.rightSideBar',compact('qGetCategories','qGetTags')); ?>
@stop