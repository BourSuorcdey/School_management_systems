@inject('model', 'App\Domains\Classroom\Models\Classroom')

@extends('backend.layouts.app')

@section('title', __('Update Classroom'))

@section('content')
    <x-forms.post :action="route('admin.classroom.update', $classroom)">
        @csrf
        <x-backend.card>
            <x-slot name="header">
                @lang('Update Classroom')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.classroom.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div>
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">@lang('Name')</label>

                        <div class="col-md-10">
                            <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name') ?? $classroom->name }}" maxlength="100" required />
                        </div>
                    </div><!--form-group-->
                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Classroom')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
