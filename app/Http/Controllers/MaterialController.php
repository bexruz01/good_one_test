<?php

namespace App\Http\Controllers;

use App\Services\MaterialServices;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function remainingMaterials(Request $request, MaterialServices $materialService)
    {
        $pantsCount = $request->pantsCount ?? 20; //  20 ta bryuk
        $shirtCount =  $request->shirtCount ?? 30; // 30 ta rubashka

        $remainingMaterials = $materialService->calculateRemainingMaterials($pantsCount, $shirtCount);

        return response()->json($remainingMaterials);
    }
}
