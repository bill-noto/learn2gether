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
        'id', 'date_of_meeting', 'time_of_meeting'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function fields(Request $request)
    {
        $hosts = \App\Models\User::where('role', 'host')->get()->pluck('name', 'id');
        $patrons = \App\Models\User::where('role', 'patron')->get()->pluck('name', 'id');
        return [
            ID::make(__('ID'), 'id')->sortable(),

            Text::make('Host', 'host->name')
                ->sortable()
                ->exceptOnForms(),

            Select::make('Host', 'host_id')->options($hosts)->onlyOnForms(),

            Text::make('Patron', 'patron->name')
                ->sortable()
                ->exceptOnForms(),

            Select::make('Patron', 'patron_id')->options($patrons)->onlyOnForms(),

            DateTime::make('Date & Time of Meeting', 'date_time_of_meeting')
                ->format('DD/MM/YY HH:mm'),

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
