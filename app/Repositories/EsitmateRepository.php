<?php

namespace App\Repositories;

use App\Models\Estimate;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class EsitmateRepository
{
    public function __construct(private Estimate $model)
    {
    }

    public function listOfEstimates() : LengthAwarePaginator
    {
        return $this->model->newQuery()->paginate(6);
    }

    public function createEstimate(Request $request) : Estimate
    {
        return $this->model->create(
            [
                'estimateId' => $request->get('estimateId'),
                'createDate' => $request->get('estimateDate'),
                'dueDate' => $request->get('estimateDueDate'),
                'discount' => $request->get('discountRate'),
                'subTotal' => $request->get('sousTotal'),
                'total' => $request->get('total'),
                'status' => 0,
                'notes' => str_replace('\n', '<br />', $request->get('notes')) ?? '',
                'payment_penality_days' => $request->get('paymentPenalityDays'),
                'payment_penality_rate' => $request->get('paymentPenalityRate'),
                'client_id' => $request->get('client'),
                'editor_id' => $request->get('editor'),
            ]
        );
    }


    public function deleteEstimate(Estimate $invoice) : bool|null
    {
        return $invoice->delete();
    }

    public function countEstimates() : int
    {
        return $this->model->newQuery()->count();
    }

    public function totalMountEstimates() : string
    {
        $invoiceTotal = $this->model->newQuery()->get('total')->all();
        $sumTotal = 0;
        foreach ($invoiceTotal as $total) {
            $sumTotal += floatval(str_replace([' ', '€', ','], ['', '', '.'], $total['total']));
        }
        return number_format($sumTotal, 2, ',', ' ');
    }
}
