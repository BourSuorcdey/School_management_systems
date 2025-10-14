@extends('backend.layouts.app')

@section('title', __('Student'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Student Lists')
        </x-slot>

        @if ($logged_in_user->hasAllAccess())
            <x-slot name="headerActions">
                <x-utils.link
                    icon="c-icon cil-plus"
                    class="card-header-action"
                    :href="route('admin.student.create')"
                    :text="__('Create Student')"
                />
            </x-slot>
        @endif

        <x-slot name="body">
            <livewire:backend.students-table />
        </x-slot>
    </x-backend.card>
@endsection
