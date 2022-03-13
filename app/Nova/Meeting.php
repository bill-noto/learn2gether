<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;

class Meeting extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Meeting::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'Meeting # id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),

            Text::make('Host', 'host->name')
                ->sortable()
                ->hideWhenUpdating()
                ->hideWhenCreating(),

            Select::make('Host', 'host_id')->options(function () {
                foreach (\App\Models\User::where('role', 'host')->get() as $host) {
                    return $host->name;
                }
            })->onlyOnForms(),

            Text::make('Patron', 'patron->name')
                ->sortable()
                ->hideWhenUpdating()
                ->hideWhenCreating(),

            Select::make('Patron', 'patron_id')->options(function () {
                foreach (\App\Models\User::where('role', 'patron')->get() as $patron) {
                    return $patron->name;
                }
            })->onlyOnForms(),

            DateTime::make('Date of Meeting', 'date_of_meeting')
                ->format('DD/MM/YYYY'),

            DateTime::make('Time of Meeting', 'time_of_meeting')
                ->format('HH:mm')
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
