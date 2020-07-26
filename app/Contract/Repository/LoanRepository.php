<?php
namespace App\Contract\Repository;
interface LoanRepository {

    /**
     * Handle Create Loan for User
     * @author KennyHuy <kennytran1989@gmail.com>
     * @param array $data
     * @return array
     */
    public function create(array $data) : array;

    /**
     * Handle Update Loan for User
     * @author KennyHuy <kennytran1989@gmail.com>
     * @param int $id
     * @param string $status
     * @return mixed
     */
    public function update(int $id, string $status);

    /**
     * Handle Check status Loan by id
     * @author KennyHuy <kennytran1989@gmail.com>
     * @param int $id
     */
    public function getLoanById(int $id);

    /**
     * Handle Repay Loan by loan_id for user
     * @author KennyHuy <kennytran1989@gmail.com>
     * @param int $id
     * @param array $userInfo
     * @return mixed|void
     */
    public function repayById(int $id, array $userInfo);
}
