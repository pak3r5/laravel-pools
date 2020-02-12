<?php

namespace App\Http\Controllers\Country;

use App\DataTables\Country\CountryDataTable;
use App\Http\Requests\Country;
use App\Http\Requests\Country\CreateCountryRequest;
use App\Http\Requests\Country\UpdateCountryRequest;
use App\Repositories\Country\CountryRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Support\Str;

class CountryController extends AppBaseController
{
    /** @var  CountryRepository */
    private $countryRepository;

    public function __construct(CountryRepository $countryRepo)
    {
        $this->countryRepository = $countryRepo;
    }

    /**
     * Display a listing of the Country.
     *
     * @param CountryDataTable $countryDataTable
     * @return Response
     */
    public function index(CountryDataTable $countryDataTable)
    {
        return $countryDataTable->render('country.countries.index');
    }

    /**
     * Show the form for creating a new Country.
     *
     * @return Response
     */
    public function create()
    {
        return view('country.countries.create');
    }

    /**
     * Store a newly created Country in storage.
     *
     * @param CreateCountryRequest $request
     *
     * @return Response
     */
    public function store(CreateCountryRequest $request)
    {
        $input = $request->all();

        $country = $this->countryRepository->create($input);

        Flash::success('Country saved successfully.');

        return redirect(route('country.countries.index'));
    }

    /**
     * Display the specified Country.
     *
     * @param  string $uuid
     *
     * @return Response
     */
    public function show($uuid)
    {
        $country = $this->countryRepository->find($uuid);

        if (empty($country)) {
            Flash::error('Country not found');

            return redirect(route('country.countries.index'));
        }

        return view('country.countries.show')->with('country', $country);
    }

    /**
     * Show the form for editing the specified Country.
     *
     * @param  string $uuid
     *
     * @return Response
     */
    public function edit($uuid)
    {
        $country = $this->countryRepository->find($uuid);

        if (empty($country)) {
            Flash::error('Country not found');

            return redirect(route('country.countries.index'));
        }

        return view('country.countries.edit')->with('country', $country);
    }

    /**
     * Update the specified Country in storage.
     *
     * @param  int              $uuid
     * @param UpdateCountryRequest $request
     *
     * @return Response
     */
    public function update($uuid, UpdateCountryRequest $request)
    {
        $country = $this->countryRepository->find($uuid);

        if (empty($country)) {
            Flash::error('Country not found');

            return redirect(route('country.countries.index'));
        }

        $country = $this->countryRepository->update($request->all(), $uuid);

        Flash::success('Country updated successfully.');

        return redirect(route('country.countries.index'));
    }

    /**
     * Remove the specified Country from storage.
     *
     * @param  string $uuid
     *
     * @return Response
     */
    public function destroy($uuid)
    {
        $country = $this->countryRepository->find($uuid);

        if (empty($country)) {
            Flash::error('Country not found');

            return redirect(route('country.countries.index'));
        }

        $this->countryRepository->delete($uuid);

        Flash::success('Country deleted successfully.');

        return redirect(route('country.countries.index'));
    }
}
