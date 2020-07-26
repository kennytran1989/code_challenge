<?php
namespace App\Contract\Repository;
interface UserRepository {

    /**
     * Hanlde Login for User
     * @author KennyHuy <kennytran1989@gmail.com>
     * @param array $data
     * @return array
     */
    public function login(array $data) : array;
}
