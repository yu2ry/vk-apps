<?php

namespace App\Http\Controllers\Web\VK\Fir;

use App\Factory\ApiRequestFactory;
use App\Http\Controllers\Api\VK\Fir\RatingController as ApiRatingController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Fir\Rating\IndexRequest;
use App\Support\ViewModels\Fir\FirViewModel;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;

/**
 * Class RatingController
 * @package App\Http\Controllers\Web\VK\Fir
 */
class RatingController extends Controller
{
    /**
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        $indexRequest = ApiRequestFactory::create(IndexRequest::class, $request->all());
        $validator = Validator::make($indexRequest->all(), $indexRequest->rules());
        if ($validator->fails()) {
            throw new \InvalidArgumentException($validator->errors()->first());
        }
        return App::make(ApiRatingController::class)->index($indexRequest);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
