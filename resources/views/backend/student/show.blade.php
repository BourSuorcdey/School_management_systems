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
                    <th>@lang('Classroom Information')</th>
                    <td></td>
                </tr>
            </table>

            <table class="table table-hover">
                <Thead>
                    <tr>
                        <th>No</th>
                        <th>Classroom Name</th>
                        <th>Teacher Name</th>
                        <th>Start Time</th>
                        <th>End time</th>
                    </tr>
                </Thead>
                <tbody>
                    @foreach ($student->classrooms as $index => $classroom)
                        @php
                            $teacher = App\Domains\Teacher\Models\Teacher::find($classroom->pivot->teacher_id);
                        @endphp
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $classroom->name ?? 'N/A' }}</td>
                            <td>{{ $teacher->name ?? 'N/A' }}</td>
                            <td>{{ $classroom->pivot->start_time ?? 'N/A' }}</td>
                            <td>{{ $classroom->pivot->end_time ?? 'N/A' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-slot>
    </x-backend.card>
@endsection
