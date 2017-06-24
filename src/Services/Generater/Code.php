<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Digila\Suite\Services\Generater;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class Code
{
    protected $latestCodes = [];
    
    /**
     * コードの作成
     * 
     * @return string BIGINT
     */
    public static function generate(array $config)
    {
        $code = null;
        for ($i=0; $i<30; $i++) {
            $code = null;
            foreach ($config as $key => $num) {
                switch ($key) {
                    case 'az':
                        $code .= collect(range('a', 'z'))->random($num)->all();
                        break;
                    case 'AZ':
                        $code .= collect(range('A', 'Z'))->random($num)->all();
                        break;
                    case 'num':
                        $code .= collect(range('0', '9'))->random($num)->all();
                        break;
                    default:
                        break;
                }
            }
            if (!in_array($code, $this->latestCodes)) {
                break;
            }
        }
        $this->latestCodes[] = $code;
        return $code;
    }
    
    
}