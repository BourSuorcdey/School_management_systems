@extends('backend.layouts.app')

@section('title', __('View Teacher'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('View Teacher')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.teacher.index')" :text="__('Back')" />
        </x-slot>

        <x-slot name="body">
            <table class="table table-hover">

                <tr>
                    <th>
                        @if($teacher->image)
                            <img src="{{ asset($teacher->image) }}" alt="Student Image" width="80" height="80" class="rounded">
                        @else
                            <span>No image</span>
                        @endif
                    </th>
                    <td></td>
                </tr>      

                <tr>
                    <th>@lang('ID')</th>
                    <td>{{ $teacher->id}}</td>
                </tr>

                <tr>
                    <th>@lang('Name')</th>
                    <td>{{ $teacher->name }}</td>
                </tr>

                <tr>
                    <th>@lang('Age')</th>
                    <td>{{ $teacher->age }}</td>
                </tr>

                <tr>
                    <th>@lang('Gender')</th>
                    <td>{{ $teacher->gender }}</td>
                </tr>

                <tr>
                    <th>@lang('Phone Number')</th>
                    <td>{{ $teacher->phone_number }}</td>
                </tr>

                <tr>
                    <th>@lang('Email')</th>
                    <td>{{ $teacher->email }}</td>
                </tr>
            </table>
        </x-slot>
    </x-backend.card>
@endsection
