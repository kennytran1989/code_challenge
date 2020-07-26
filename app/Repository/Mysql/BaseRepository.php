<?php
namespace App\Repository\Mysql;
class BaseRepository {
    public function dataReturn($data, $mess){

        return [
            'status'    => true,
            'message'   => $mess,
            'data'      => $data,
        ];
    }
}
