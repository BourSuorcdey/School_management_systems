@extends('backend.layouts.app')

@section('title', __('Classroom Detail'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
<x-backend.card>
    <x-slot name="header">
        {{ $classroom->name }}
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link class="card-header-action" :href="route('admin.student.index')" :text="__('Back')" />
    </x-slot>

    <x-slot name="body">
        <h5>@lang('Teachers in this classroom:')</h5>
        <ul>
            @forelse ($classroom->teachers as $teacher)
                <li>{{ $teacher->name }}</li>
            @empty
                <li>@lang('No teachers assigned to this class.')</li>
            @endforelse
        </ul>
    </x-slot>
</x-backend.card>
@endsection