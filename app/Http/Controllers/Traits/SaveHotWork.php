<?php
/**
 * Created by PhpStorm.
 * User: SALOVEBY JOKE
 * Date: 26-Sep-18
 * Time: 15:15
 */

namespace App\Http\Controllers\Traits;


use App\Models\HotWork;

trait SaveHotWork
{
    public function getHotWork($order_id)
    {
        return HotWork::where('order_id' , $order_id)->first();
    }    
    
    /**
     * @param $data
     * @param null $order_id
     * @return mixed
     */
    public function createHotWork($data, $order_id = null): void
    {
        if (!empty($order_id)) {
            $data['order_id'] = $order_id;
        }

        HotWork::create($data)->id;
    }
}
