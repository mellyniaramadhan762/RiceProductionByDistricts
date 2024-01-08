<?php

namespace App\Http\Controllers;

use App\Http\Requests\RiceProductionByDistrictsRequest;
use App\Models\RiceProductionByDistricts;
use App\Http\Resources\RiceProductionByDistrictsResource;
use Database\Seeders\RiceProductionByDistrictsSeeder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\QueryException;
use Throwable;
class RiceProductionByDistrictsController extends Controller
{
    //
    public function index()
    {
        $riceProductionByDistricts = RiceProductionByDistricts::paginate(10);
        return RiceProductionByDistrictsResource::collection($riceProductionByDistricts);
    }

    public function store(RiceProductionByDistrictsRequest $request)
    {
        return (new RiceProductionByDistrictsResource(RiceProductionByDistricts::create($request->validated())))->response()->header('Message', 'Data Added Successfully');
    }

    public function destroy($id)
    {
        $riceProductionByDistricts = RiceProductionByDistricts::findOrFail($id);

        $riceProductionByDistricts->delete();
        return response()->json(['Message' => 'Deleted Successfully'], 200);
    }

    public function show(string $id)
    {
        $riceProductionByDistricts = RiceProductionByDistricts::findOrFail($id);
        if (!$riceProductionByDistricts) {
            return response()->json(['Message' => 'Not Found!'], 404);
        }
        return new RiceProductionByDistrictsResource($riceProductionByDistricts);
    }

    public function update(RiceProductionByDistrictsRequest $request, $id)
    {
        $riceProductionByDistricts = RiceProductionByDistricts::findOrFail($id);
        $riceProductionByDistricts->update($request->validated());

        return (new RiceProductionByDistrictsResource(RiceProductionByDistricts::findOrFail($id)))->response()->header('Message', 'Updated Successfully');
    }
}
