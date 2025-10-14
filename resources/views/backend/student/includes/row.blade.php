<x-livewire-tables::bs4.table.cell>
    {{ $row->id}}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->name }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->age }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->gender }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    <a href="mailto:{{ $row->email }}">{{ $row->email }}</a>
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @if($row->image)
        <img src="{{ asset($row->image) }}" alt="Student Image" width="30" height="30" class="rounded">
    @else
        <span>No Image</span>
    @endif
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @include('backend.student.includes.actoins', ['student' => $row])
</x-livewire-tables::bs4.table.cell>
