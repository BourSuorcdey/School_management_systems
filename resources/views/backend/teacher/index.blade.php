@extends('backend.layouts.app')

@section('title', __('Teacher'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Teacher Lists')
        </x-slot>

        @if ($logged_in_user->hasAllAccess())
            <x-slot name="headerActions">
                <x-utils.link
                    icon="c-icon cil-plus"
                    class="card-header-action"
                    :href="route('admin.teacher.create')"
                    :text="__('Create Teacher')"
                />
            </x-slot>
        @endif

        <x-slot name="body">
            <livewire:backend.teachers-table />
        </x-slot>
    </x-backend.card>
@endsection
