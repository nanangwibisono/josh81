@extends('layouts/default')

{{-- Web site Title --}}
@section('title')
@lang('roles/title.edit')
@parent
@stop

{{-- Content --}}
@section('content')
<section class="content-header">
    <h1>
        @lang('roles/title.edit')
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}">
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                @lang('general.dashboard')
            </a>
        </li>
        <li>@lang('roles/title.roles')</li>
        <li class="active">@lang('roles/title.edit')</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card panel-primary ">
                <div class="card-heading">
                    <h4 class="card-title"> <i class="livicon" data-name="wrench" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        @lang('roles/title.edit')
                    </h4>
                </div>
                <div class="card-body">
                    @if($role)
                        {!! Form::model($role, ['url' => URL::to('roles/'. $role->id), 'method' => 'put', 'class' => 'form-horizontal']) !!}
                            <!-- CSRF Token -->
                            {{ csrf_field() }}

                            <div class="form-group {{ $errors->
                                first('name', 'has-error') }}">
                                <div class="row">
                                <label for="title" class="col-sm-2 control-label">
                                    @lang('roles/form.name')
                                </label>
                                <div class="col-sm-5">
                                    <input type="text" id="name" name="name" class="form-control"
                                           placeholder=@lang('roles/form.name') value="{!! old('name', $role->
                                    name) !!}">
                                </div>
                                <div class="col-sm-4">
                                    {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                                </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                <label for="slug" class="col-sm-2 control-label">@lang('roles/form.slug')</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" value="{!! $role->slug !!}" readonly />
                                </div>
                            </div>
                            </div>
                        <div class="form-group">
                            <div class="row">
                            <div class="offset-sm-2 col-sm-4">
                                <a class="btn btn-danger" href="{{ route('roles.index') }}">
                                    @lang('button.cancel')
                                </a>
                                <button type="submit" class="btn btn-success">
                                    @lang('button.save')
                                </button>
                            </div>
                            </div>
                        </div>
                    </form>
                    @else
                        <h1>@lang('roles/message.error.no_role_exists')</h1>
                            <a class="btn btn-danger" href="{{ route('roles.index') }}">
                                @lang('button.back')
                            </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- row-->
</section>

@stop
