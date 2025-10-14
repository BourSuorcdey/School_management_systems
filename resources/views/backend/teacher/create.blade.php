@inject('model', 'App\Domains\Teacher\Models\Teacher')

@extends('backend.layouts.app')

@section('title', __('Teacher'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    <x-forms.post :action="route('admin.teacher.store')">
        @csrf
        <x-backend.card>
            <x-slot name="header">
                @lang('Create Teacher')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.teacher.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div>

                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">@lang('Name')</label>

                        <div class="col-md-10">
                            <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name') }}" maxlength="100" required />
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label for="age" class="col-md-2 col-form-label">@lang('Age')</label>

                        <div class="col-md-10">
                            <input type="number" name="age" class="form-control" placeholder="{{ __('Age') }}" value="{{ old('age') }}" maxlength="100" required />
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label for="gender" class="col-md-2 col-form-label">@lang('Gender')</label>

                        <div class="col-md-10">
                            <select name="gender" class="form-control" required x-on:change="userType = $event.target.value">
                                <option value="{{ $model::MALE }}">@lang('Male')</option>
                                <option value="{{ $model::FEMALE }}">@lang('Female')</option>
                            </select>
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label for="phone_number" class="col-md-2 col-form-label">@lang('Phone Number')</label>

                        <div class="col-md-10">
                            <input type="number" name="phone_number" class="form-control" placeholder="{{ __('Phone Number') }}" value="{{ old('phone_number') }}" maxlength="255" required />
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label">@lang('E-mail Address')</label>

                        <div class="col-md-10">
                            <input type="email" name="email" class="form-control" placeholder="{{ __('E-mail Address') }}" value="{{ old('email') }}" maxlength="255" required />
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label for="image" class="col-md-2 col-form-label">@lang('Image')</label>

                        <div class="col-md-10">
                            <input type="file" name="image">
                        </div>
                    </div><!--form-group-->

                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create Student')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
