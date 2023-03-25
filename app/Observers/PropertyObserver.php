<?php

namespace App\Observers;

use App\Models\Property;
use App\Models\PropertyFlooring;
use App\Models\PropertyGeneral;
use App\Models\PropertySummary;

class PropertyObserver
{
    /**
     * Handle the Property "created" event.
     *
     * @param  \App\Models\Property  $property
     * @return void
     */
    public function created(Property $property)
    {
        if (request()->has('summary')) {
            foreach (request('summary') as $summary_id) {
                PropertySummary::create([
                    'property_id' => $property->id,
                    'summary_id' => $summary_id
                ]);
            }
        }

        if (request()->has('general')) {
            foreach (request('general') as $general_id) {
                PropertyGeneral::create([
                    'property_id' => $property->id,
                    'general_id' => $general_id
                ]);
            }
        }

        if (request()->has('flooring')) {
            foreach (request('flooring') as $flooring_id) {
                PropertyFlooring::create([
                    'property_id' => $property->id,
                    'flooring_id' => $flooring_id
                ]);
            }
        }
    }

    /**
     * Handle the Property "updated" event.
     *
     * @param  \App\Models\Property  $property
     * @return void
     */
    public function updated(Property $property)
    {
        //
    }

    /**
     * Handle the Property "deleted" event.
     *
     * @param  \App\Models\Property  $property
     * @return void
     */
    public function deleted(Property $property)
    {
        //
    }

    /**
     * Handle the Property "restored" event.
     *
     * @param  \App\Models\Property  $property
     * @return void
     */
    public function restored(Property $property)
    {
        //
    }

    /**
     * Handle the Property "force deleted" event.
     *
     * @param  \App\Models\Property  $property
     * @return void
     */
    public function forceDeleted(Property $property)
    {
        //
    }
}
