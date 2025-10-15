<?php

namespace App\Http\Livewire\Backend;

use App\Domains\Classroom\Models\Classroom;
use App\Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class UsersTable.
 */
class ClassroomsTable extends DataTableComponent
{
    /**
     * @var
     */
    public $status;

    /**
     * @var array|string[]
     */
    public array $sortNames = [
        'email_verified_at' => 'Verified',
        'two_factor_auth_count' => '2FA',
    ];

    /**
     * @var array|string[]
     */
    public array $filterNames = [
        'type' => 'User Type',
        'verified' => 'E-mail Verified',
    ];

    /**
     * @param  string  $status
     */
    public function mount($status = 'active'): void
    {
        $this->status = $status;
    }

    /**
     * @return Builder
     */
    public function query(): Builder
    {
        $query = Classroom::query();

        return $query;
    }

    /**
     * @return array
     */
    public function filters(): array
    {
        return [
            'type' => Filter::make('User Type')
                ->select([
                    '' => 'Any',
                    User::TYPE_ADMIN => 'Administrators',
                    User::TYPE_USER => 'Users',
                ]),
            'active' => Filter::make('Active')
                ->select([
                    '' => 'Any',
                    'yes' => 'Yes',
                    'no' => 'No',
                ]),
            'verified' => Filter::make('E-mail Verified')
                ->select([
                    '' => 'Any',
                    'yes' => 'Yes',
                    'no' => 'No',
                ]),
        ];
    }

    /**
     * @return array
     */
    public function columns(): array
    {
        return [
            Column::make(__('No'), 'id')
                ->sortable(),
            Column::make(__('Name'))
                ->sortable()
                ->searchable(),
            Column::make(__('Actions')),
        ];
    }

    /**
     * @return string
     */
    public function rowView(): string
    {
        return 'backend.classroom.includes.row';
    }
}
