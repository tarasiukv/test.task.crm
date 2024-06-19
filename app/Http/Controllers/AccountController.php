<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
use App\Http\Resources\AccountResource;
use App\Models\Account;
use Illuminate\Support\Facades\DB;
use PharIo\Version\Exception;
use Symfony\Component\HttpFoundation\Response;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $per_page = 21;

        $model = Account::with([
            'deals',
        ])->paginate($per_page);

        return AccountResource::collection($model);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AccountRequest $request)
    {
        $data = $request->validated();

        DB::beginTransaction();
        try {
            $account = Account::create([
                'name' => $data['name'],
                'website' => $data['website'],
                'phone' => $data['phone']
            ]);

            $account->save();

            DB::commit();

        } catch (Exception $e) {
            DB::rollBack();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        if (!$account) {
            return response()->json(['message' => 'There is no account'], 404);
        }
        $account->load([
            'deals',
        ]);
        return new AccountResource($account);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AccountRequest $request, Account $account)
    {
        $data = $request->validated();

        DB::beginTransaction();
        try {
            $account->update([
                'name' => $data['account'],
                'website' => $data['website'],
                'phone' => $data['phone']
            ]);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        $account->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
