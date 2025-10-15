@extends('backend.layouts.app')

@section('title', __('Deleted Student'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Deleted Student')
        </x-slot>

        <x-slot name="body">
            <livewire:backend.students-table status="deleted" />
        </x-slot>
    </x-backend.card>
@endsection
