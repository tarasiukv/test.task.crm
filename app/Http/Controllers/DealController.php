<?php

namespace App\Http\Controllers;

use App\Http\Requests\DealRequest;
use App\Http\Resources\DealResource;
use App\Models\Deal;
use Illuminate\Support\Facades\DB;
use PharIo\Version\Exception;
use Symfony\Component\HttpFoundation\Response;

class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $per_page = 21;

        $model = Deal::with([
            'account',
        ])->paginate($per_page);

        return DealResource::collection($model);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DealRequest $request)
    {
        $data = $request->validated();

        DB::beginTransaction();
        try {
            $deal = Deal::create([
                'name' => $data['name'],
                'stage' => $data['stage'],
                'account_id' => $data['account_id']
            ]);
            $deal->save();

            DB::commit();

        } catch (Exception $e) {
            DB::rollBack();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Deal $deal)
    {
        if (!$deal) {
            return response()->json(['message' => 'There is no deal'], 404);
        }
        $deal->load([
            'account',
        ]);
        return new DealResource($deal);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DealRequest $request, Deal $deal)
    {
        $data = $request->validated();

        DB::beginTransaction();
        try {
            $deal->update([
                'name' => $data['deal'],
                'stage' => $data['stage'],
                'account_id' => $data['account_id']
            ]);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deal $deal)
    {
        $deal->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
