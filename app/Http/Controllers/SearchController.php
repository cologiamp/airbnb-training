<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Location;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request) 
    {

    	//$query = Property::query();

        $descendantPaginator = null;

        $results = Location::with(['getProperties' => function($query) use ($request, &$descendantPaginator) {
            // $query->sum('quantity');
            //$query->select('*'); // without `order_id`
            if (!empty($request->input('description')))
            {
                //Searching in the property name, not in location name yet.
                //$descendantPaginator = $query->where('property_name', 'LIKE', '%' . $request->input('description') . '%')->paginate(2);

                if (!empty($request->input('beach')))
                {
                    $query->where('near_beach', '=', $request->input('beach'));
                }

                if (!empty($request->has('pets')))
                {
                    $query->where('accepts_pets', '=', $request->input('pets'));
                }

                //BEDS AND SLEEPS
                if (!empty($request->input('beds')))
                {
                    $query->where('beds', '<=', $request->input('beds'));
                }

                if (!empty($request->input('sleeps')))
                {
                    $query->where('sleeps', '<=', $request->input('sleeps'));
                }

                $descendantPaginator = $query->paginate(2);

            }

        }])->where('location_name', 'LIKE', '%' . $request->input('description') . '%')->get();

        return view('properties.index', ['properties' => $descendantPaginator]);  


    }
}
