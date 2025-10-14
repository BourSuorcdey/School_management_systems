@extends('backend.layouts.app')

@section('title', __('Deleted Teacher'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Deleted Teacher')
        </x-slot>

        <x-slot name="body">
            <livewire:backend.teachers-table status="deleted" />
        </x-slot>
    </x-backend.card>
@endsection
