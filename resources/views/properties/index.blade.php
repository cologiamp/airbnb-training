@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-center">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-6xl">
            Property Listing
        </h1>
    </div>
</div>

    <div class="relative bg-gray-100 pt-5 pb-20 px-4 sm:px-6 lg:pt-5 lg:pb-28 lg:px-8">
        <div class="relative max-w-7xl mx-auto">

            <div>

			
			<form action="{{ route('search') }}" method=GET>

				<div class="mb-6">
				<label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">By name or location:</label>
				<input type="text" name="description" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="">
				</div>

				<div class="flex items-start mb-6">

				<div class="flex items-center h-5">
				<input id="beach" name="beach" aria-describedby="beach" type="checkbox" class="w-4 h-4 bg-gray-50 rounded border border-gray-300 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800" value="1">
				</div>


				<div class="ml-3 text-sm">
				<label for="beach" class="font-medium text-gray-900 dark:text-gray-300">Near the beach</label>
				</div>

				</div>

				<div class="flex items-start mb-6">

				<div class="flex items-center h-5">
				<input id="pets" name="pets" aria-describedby="pets" type="checkbox" class="w-4 h-4 bg-gray-50 rounded border border-gray-300 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800" value="1">
				</div>


				<div class="ml-3 text-sm">
				<label for="pets" class="font-medium text-gray-900 dark:text-gray-300">Accept Pets</label>
				</div>

				</div>

				<div class="mb-6">
				<label for="beds" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Max. Number of bedroomss:</label>
				<input type="number" name="beds" id="beds" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-60 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="">
				</div>

				<div class="mb-6">
				<label for="sleeps" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Max. Number of sleeps:</label>
				<input type="number" name="sleeps" id="sleeps" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-60 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="">
				</div>


				<div class="mb-6">
				
				<label for="start_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Availability From:</label>
				<input type="date" name="start_date" id="start_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-40 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="">
				
				<label for="end_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Availability To:</label>
				<input type="date" name="end_date" id="end_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-40 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="">

				</div>


				<button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
			</form>


			</div>

			@if ($properties->count())
            <div class="mt-12 max-w-lg mx-auto grid gap-5 lg:grid-cols-3 lg:max-w-none">
               

                    @foreach ($properties as $property)
					<div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
					    <div class="flex-1 bg-white p-6 flex flex-col justify-between">
					        <div class="flex-1">
					            <a href="#" class="block mt-2">
					                <p class="text-xl font-semibold text-gray-900">
					                    {{ $property->property_name }}
					                </p>
					                <p class="mt-3 text-base text-gray-500">
					                	{{ $property->getLocation['location_name'] }}					                    
					                </p>
					            </a>
					        </div>
					        <div class="mt-6 flex items-center">
					            <div class="">
					                <div class="flex space-x-1 text-sm text-gray-500">
					                    <time dateTime="2020-03-16">
					                    	Rented from, to: {{ $property->getBookings }}
					                    </time>
					                </div>
					            </div>
					        </div>
					    </div>
					</div>
					@endforeach
            </div>

            <div class="mt-12 max-w-lg mx-auto grid gap-5 lg:grid-cols-3 lg:max-w-none">
          			<div class="pagination-block">
						{{ $properties->links() }}
	                </div>
            </div>
            @else
                <div class="text-center">
	                <h2 class="text-3xl tracking-tight font-extrabold text-gray-900 sm:text-3xl">
	                    Sorry, there are no properties that matches your request.
	                </h2>
	            </div>
            @endif
        </div>
    </div>
@endsection
