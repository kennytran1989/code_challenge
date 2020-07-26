<?php

namespace App\Http\Controllers;

use App\Contract\Repository\LoanRepository;
use App\Http\Requests\LoanRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    protected $loanRepository;
    public function __construct()
    {
        parent::__construct();
        $this->loanRepository = app(LoanRepository::class);
    }

    /**
     * Function Handle Create Loan
     * @author KennyHuy <kennytran1989@gmail.com>
     * @param LoanRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(LoanRequest $request)
    {

        $data = $this->loanRepository->create($request->all());
        return response()->json($data, $this->status_code[200]);
    }

    /**
     * Function Handle Update Loan
     * @author KennyHuy <kennytran1989@gmail.com>
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $data = $this->loanRepository->update($id, $request->input('status_loan'));
        return response()->json($data, $this->status_code[200]);
    }

    /**
     * Function Handle Check status Loan by id
     * @author KennyHuy <kennytran1989@gmail.com>
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getLoanById($id)
    {
        $data = $this->loanRepository->getLoanById($id);
        return response()->json($data, $this->status_code[200]);
    }

    /**
     * Function Handle Repay Loan by loan_id for user
     * @author KennyHuy <kennytran1989@gmail.com>
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function repay(Request $request, $id)
    {
        $data = $this->loanRepository->repayById($id, $request->get('userInfo'));
        return response()->json($data, $this->status_code[200]);
    }
}
