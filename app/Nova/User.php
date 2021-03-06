<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use KABBOUCHI\NovaImpersonate\Impersonate;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;

class User extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\User::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'name', 'email',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Image::make('Profile Photo', 'profile_photo_path')
                ->maxWidth(200)
                ->preview(function () {
                    return $this->user_avatar;
                })
                ->thumbnail(function () {
                    return $this->user_avatar;
                }),

            Text::make('Name')
                ->exceptOnForms(),

            Text::make('First Name', 'first_name')
                ->sortable()
                ->rules('required', 'max:120')
                ->onlyOnForms(),

            Text::make('Last Name', 'last_name')
                ->sortable()
                ->rules('required', 'max:120')
                ->onlyOnForms(),

            BelongsToMany::make('Languages'),

            Text::make('Languages', function (){
                return implode(', ', $this->languages->pluck('language')->toArray());
            })->exceptOnForms(),

            Text::make('Email')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:users,email')
                ->updateRules('unique:users,email,{{resourceId}}'),

            Text::make('Username')
                ->rules('required', 'max:120'),

            Text::make('Role')
                ->sortable()
                ->exceptOnForms(),

            Select::make('Role')->options([
                'patron' => 'Patron',
                'host' => 'Host',
                'admin' => 'Admin'
            ])->onlyOnForms(),

            Password::make('Password')
                ->onlyOnForms()
                ->creationRules('required', 'string', 'min:8')
                ->updateRules('nullable', 'string', 'min:8'),

            Impersonate::make($this)
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
