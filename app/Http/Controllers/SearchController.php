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

        $resultado = Location::with(['getProperties' => function($query) use ($request, &$descendantPaginator) {
            // $query->sum('quantity');
            //$query->select('*'); // without `order_id`
            if (!empty($request->input('description')))
            {
                //Searching in the property name, not in location name yet.
                $descendantPaginator = $query->where('property_name', 'LIKE', '%' . $request->input('description') . '%')->paginate(2);

                //$descendantPaginator = $query->paginate(2);
            }

            //dd("query", $query);

            //BEACH AND PETS

            /*
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
            dd($request->input('description'));
            */

        }])->get();

        //$resultado->getProperties();

        //dd($resultado);
        /*
        foreach ($resultado as $resulta) {
            $casas[] = $resulta->getProperties->all();
        }
        
        //$main = $resultado[]->getProperties->first();
        //dd($casas);
        $myCollectionObj = collect($casas)->paginate(2);
        */
        //$myCollectionObj->paginate(2);

        //dd($resultado);

        //dd($descendantPaginator);

        return view('properties.index', ['properties' => $descendantPaginator]);  
        //$results = $query->paginate(2);

        //dd($resultado->getProperties());

    	

        //NOT TESTED AND NOT PROVED, ASSUMING SOMETHING LIKE THIS.
        /*
        if (!empty($request->input('start_date')) && !empty($request->input('end_date')))
        {
        	$query->getBookings()
        		  ->where('start_date', '>=', $request->input('start_date'))->where('end_date','<=', $request->input('end_date'))
        		  ->get();
        }
        */

        $results = $query->paginate(2);

        return view('properties.index', ['properties' => $results]);  

    }
}
