<?php

namespace App\Services;

use App\Material;
use App\Models\Warehouse;

class MaterialServices
{
    public function calculateRemainingMaterials($pantsCount, $shirtCount)
    {
        $pantsFabricNeeded = Warehouse::PANT_FABRIC_ONE * $pantsCount;
        $shirtFabricNeeded = Warehouse::SHIRT_FABRIC_ONE * $shirtCount;
        $threadNeeded = Warehouse::THREAD_ONE * ($pantsCount + $shirtCount);
        $zipperNeeded = $pantsCount;
        $buttonNeeded = Warehouse::SHIRT_BUTTON_ONE * $shirtCount;
        $remainingMaterials = Warehouse::selectRaw('material_name, SUM(remain) as remain_total')
            ->whereIn('material_name', ['ткань-1', 'ткань-2', 'нить', 'пуговица', 'замок'])
            ->groupBy('material_name')
            ->get();
        $response = [];
        foreach ($remainingMaterials as $material) {
            switch ($material->material_name) {
                case 'ткань-1':
                    $response['ткань-1'] = intval($material->remain_total);
                    break;
                case 'ткань-2':
                    $response['ткань-2'] = $material->remain_total - ($pantsFabricNeeded + $shirtFabricNeeded);
                    break;
                case 'нить':
                    $response['нить'] = $material->remain_total - $threadNeeded;
                    break;
                case 'пуговица':
                    $response['пуговица'] = $material->remain_total - $buttonNeeded;
                    break;
                case 'замок':
                    $response['замок'] = $material->remain_total - $zipperNeeded;
                    break;
            }
        }

        return $response;

    }
}
