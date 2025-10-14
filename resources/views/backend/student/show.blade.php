@extends('backend.layouts.app')

@section('title', __('View Student'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('View Student')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.student.index')" :text="__('Back')" />
        </x-slot>

        <x-slot name="body">
            <table class="table table-hover">
                <tr>
                    <th>
                        @if($student->image)
                            <img src="{{ asset($student->image) }}" alt="Student Image" width="80" height="80" class="rounded">
                        @else
                            <span>No image</span>
                        @endif
                    </th>
                    <td></td>
                </tr>           

                <tr>
                    <th>@lang('ID')</th>
                    <td>{{ $student->id}}</td>
                </tr>

                <tr>
                    <th>@lang('Name')</th>
                    <td>{{ $student->name }}</td>
                </tr>

                <tr>
                    <th>@lang('Age')</th>
                    <td>{{ $student->age }}</td>
                </tr>

                <tr>
                    <th>@lang('Gender')</th>
                    <td>{{ $student->gender }}</td>
                </tr>

                <tr>
                    <th>@lang('Email')</th>
                    <td>{{ $student->email }}</td>
                </tr>
                <tr>
                    <th>@lang('Classroom')</th>
                    <td>
                        @foreach ($student->classrooms as $classroom)
                            <div class="btn btn-dribbble">
                                <a href="{{ route('admin.classroom.show', $classroom->id) }}">{{ $classroom->name }}</a>
                            </div> 
                        @endforeach
                    </td>
                </tr>
                
            </table>
        </x-slot>
    </x-backend.card>
@endsection
