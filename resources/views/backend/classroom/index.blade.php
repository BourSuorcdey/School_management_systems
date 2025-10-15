@extends('backend.layouts.app')

@section('title', __('Classroom'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Classroom Lists')
        </x-slot>

        @if ($logged_in_user->hasAllAccess())
            <x-slot name="headerActions">
                <x-utils.link
                    icon="c-icon cil-plus"
                    class="card-header-action"
                    :href="route('admin.classroom.create')"
                    :text="__('Create Class')"
                />
            </x-slot>
        @endif

        <x-slot name="body">
            <livewire:backend.classrooms-table />
        </x-slot>
    </x-backend.card>
@endsection
