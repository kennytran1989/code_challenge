<?php
namespace App\Repository\Mysql;

use App\Contract\Repository\LoanRepository;
use App\Models\Loan;
use App\Models\RePayment;
use App\Repository\Mysql\BaseRepository;
class EqLoanRepository extends BaseRepository implements LoanRepository
{
    /**
     * Handle Login for User
     * @author KennyHuy <kennytran1989@gmail.com>
     * @param array $data
     * @return array
     */
    public function create(array $data): array
    {
        $data = [
            'user_id'       => $data['userInfo']['id'],
            'amount'        => $data['amount'],
            'loan_term'     => $data['loan_term'],
            'loan_status'   => 'waiting'
        ];
        $result = Loan::create($data)->toArray();
        return $this->dataReturn($result, 'Create Loan Success');

    }

    /**
     * Handle Update Loan for User
     * @author KennyHuy <kennytran1989@gmail.com>
     * @param int $id
     * @param string $status
     * @return mixed
     */
    public function update(int $id, string $status)
    {
        $data = Loan::find($id);
        if($data === null ){
            return $this->dataReturn($data, 'Not Found');
        }
        $data->status_loan = $status;
        $result = $data->save();
        return $this->dataReturn($result, 'Update Success');
    }

    /**
     * Handle Get Loan by id
     * @author KennyHuy <kennytran1989@gmail.com>
     * @param int $id
     * @return array
     */
    public function getLoanById(int $id)
    {
        $data = Loan::find($id);
        if($data === null ){
            return $this->dataReturn($data, 'Not Found');
        }
        return $this->dataReturn($data->toArray(), "Get loan's detail Success");
    }

    /**
     * Handle Repay Loan by loan_id for user
     * @author KennyHuy <kennytran1989@gmail.com>
     * @param int $id
     * @param array $userInfo
     * @return mixed|void
     */
    public function repayById(int $id, array $userInfo)
    {
        $data = RePayment::groupBy('loan_id')->selectRaw('SUM(amount) as total_amount_repay')
                            ->first();
        $loan_amount = Loan::select('amount')->where('id', $id)->first()->toArray();
        if($data != null){
            $data = $data->toArray();
            if($data['total_amount_repay'] == $loan_amount['amount']){
                return $this->dataReturn(null, 'You finished repay for loan');
            }
        }

        $repay = [
            'loan_id'   => $id,
            'amount'    => $loan_amount['amount'] /10,
            'status'    => true
        ];
        $result = RePayment::create($repay);
        return $this->dataReturn($result, 'You pay for loan');
    }
}
