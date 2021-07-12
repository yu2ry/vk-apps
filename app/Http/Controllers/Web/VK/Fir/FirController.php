<?php

namespace App\Http\Controllers\Web\VK\Fir;

use App\Factory\ApiRequestFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Fir\IndexRequest;
use App\Support\ViewModels\Fir\FirViewModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\VK\Fir\FirController as ApiFirController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

/**
 * Class FirController
 * @package App\Http\Controllers\Web\VK\Fir
 */
class FirController extends Controller
{

    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $indexRequest = ApiRequestFactory::create(IndexRequest::class, $request->all());
        $validator = Validator::make($indexRequest->all(), $indexRequest->rules());
        if ($validator->fails()) {
            throw new \InvalidArgumentException($validator->errors()->first());
        }
        $resource = App::make(ApiFirController::class)->index($indexRequest);
        return view('VK/Fir/master', [
            'viewModel' => FirViewModel::init()->fromResource($resource)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        app(ApiFirController::class)
            ->store();
    }
}
