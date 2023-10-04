<?php

namespace App\Services\Points\CRSHelpers\CoreHumanCapital;

use App\Services\Points\CRSHelpers\SumPointsHelper;
use App\Services\Points\CRSHelpers\PreparePointsHelper;
use Arr;

class CanadianHelper extends SumPointsHelper implements PreparePointsHelper
{
    const FSW_SCORE_KEYS = [
        'fsw_human_capital_canadian_work_experience_crs',
    ];

    public static function prepareData(array $data, array $fswScoreLog, bool $married): array
    {
        return [
            'title' => 'Canadian Work Experience',
            'currentPoint' => self::getCurrentPoints($fswScoreLog, self::FSW_SCORE_KEYS, $married),
            'maxPoint' => $married ? Arr::get($data, 'max_points.married') : Arr::get($data, 'max_points.single'),
            'subsections' => [
                [
                'items' => self::prepareJobOfferItems(Arr::get($data, 'factors', []), $married),
                ],
            ],
        ];
    }

    private static function prepareJobOfferItems(array $factors, bool $married): array
    {
        $prepareData = [
            ['label' => 'Years of Canadian Work', 'points' => 'Points'],
        ];

        foreach ($factors as $key => $factor) {
            $prepareData[$key + 1][0] = $factor['label'];
            $prepareData[$key + 1][1] = $married ?
                Arr::get($factor, 'points.married', 0) :
                Arr::get($factor, 'points.single', 0) ;
        }
        return $prepareData;
    }
}
