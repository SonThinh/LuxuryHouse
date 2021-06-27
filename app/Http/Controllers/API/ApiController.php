<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Traits\HasTransformer;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    use HasTransformer;

    protected $per_page;

    const LIMIT_PER_PAGE = 100;

    const DEFAULT_PER_PAGE = 20;

    public function __construct(Request $request)
    {
        $this->per_page = $request->has('per_page') ? $this->getPerPage($request->get('per_page')) : ApiController::DEFAULT_PER_PAGE;
    }

    private function getPerPage($per_page): int
    {
        return $per_page > ApiController::LIMIT_PER_PAGE ? ApiController::LIMIT_PER_PAGE : $per_page;
    }
}
