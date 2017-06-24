<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Digila\Suite\Services\Generater;

use Illuminate\Support\Facades\DB;

class Snowflake
{
    /**
     * 64bitのユニークIDの作成
     * 
     * @return string BIGINT
     */
    public static function generate()
    {
        if (PHP_INT_SIZE == 4) {
            return self::generate32();
        }
        
        return self::generate64();
    }
    
    /**
     * 64bitのユニークIDの作成
     * 
     * @return string BIGINT
     */
    public static function generate64()
    {
        $epoch = config('digilasuite.generater.snowflake.epoch');
        
        // 41bit -- 現在時刻のタイムスタンプ
        $time = floor(microtime(true) * 1000);
        $time -= $epoch;

        $base = decbin(pow(2, 40) - 1 + $time);

        // 10bit -- サーバーID
        $serverid = decbin(pow(2, 9) - 1 + self::getServerId());
        
        // 12bit -- ランダムパート
        $random = mt_rand(1, pow(2, 11) - 1);
        $random = decbin(pow(2, 11) - 1 + $random);
        
        $base = $base . $serverid . $random;
        
        return (string) bindec($base);
    }
    
    /**
     * 32bitのユニークIDの作成
     * 
     * @return string BIGINT
     */
    public static function generate32()
    {
        $epoch = config('digilasuite.generater.snowflake.epoch');
        
        // 41bit -- 現在時刻のタイムスタンプ
        $time = floor(microtime(true) * 1000);
        $time -= $epoch;
        
        // 3桁 -- サーバーID
        $serverid = self::getServerId();
        
        // 4桁 -- ランダムパート
        $random = mt_rand(1, pow(2, 11) - 1);
        
        //$base = $base . $serverid . $random;
        $id = $time . sprintf('%03d', $serverid) . sprintf('%04d', $random);
        
        return (string) $id;
    }
    
    /**
     * MyDQLデータベースのサーバーIDを取得
     * 
     * @return int
     */
    private static function getServerId()
    {
        $result = DB::select('SELECT @@server_id as server_id LIMIT 1');
        return $result[0]->server_id;
    }
    
    /**
     * IDからタイムスタンプを取得
     * 
     * @param type $particle
     * @return timestump
     */
    public function timeFromId($id)
    {
        if (PHP_INT_SIZE == 4) {
            return self::timeFromId32($id);
        }
        
        return self::timeFromId64($id);
    }
    
    /**
     * IDからタイムスタンプを取得
     * 
     * @param type $particle
     * @return timestump
     */
    public function timeFromId64($id)
    {
        $epoch = config('digilasuite.generater.snowflake.epoch');
        return (string) bindec(substr(decbin($id),0,41)) - pow(2,40) + 1 + $epoch;
    }
    
    /**
     * IDからタイムスタンプを取得
     * 
     * @param type $particle
     * @return timestump
     */
    public function timeFromId32($id)
    {
        $epoch = config('digilasuite.generater.snowflake.epoch');
        $epoch = strtotime("-365 day") * 1000;
 
        return (string) $epoch;
    }
    
}