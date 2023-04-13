<?php

namespace App\Repositories;

use App\Models\Invoice;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class InvoiceRepository
{
    public function __construct(private Invoice $model)
    {
    }

    public function listOfInvoices(User $user) : LengthAwarePaginator
    {
        return $this->model->newQuery()
            ->with(['client'])
            ->where('editor_id', $user->getKey())
            ->paginate(5);
    }

    public function createInvoice(Request $request) : Invoice
    {
        return $this->model->create(
            [
                    'invoiceId' => $request->get('invoiceId'),
                    'invoiceTitle' => $request->get('invoiceTitle'),
                    'createDate' => $request->get('invoiceDate'),
                    'executeDate' => $request->get('invoiceExecuteDate'),
                    'discount' => $request->get('discountRate'),
                    'subTotal' => $request->get('sousTotal'),
                    'total' => $request->get('total'),
                    'payment_penality_days' => $request->get('paymentPenalityDays'),
                    'payment_penality_rate' => $request->get('paymentPenalityRate'),
                    'notes' => str_replace('\n', '<br />', $request->get('notes')) ?? '',
                    'status' => 0,
                    'client_id' => $request->get('client'),
                    'editor_id' => $request->get('editor'),
            ]
        );
    }

    public function updateInvoice(Request $request, Invoice $invoice) : bool|null
    {
        return $invoice->update(
            [
                'invoiceId' => $request->get('invoiceId'),
                'invoiceTitle' => $request->get('invoiceTitle'),
                'createDate' => $request->get('invoiceDate'),
                'executeDate' => $request->get('invoiceExecuteDate'),
                'discount' => $request->get('discountRate'),
                'subTotal' => $request->get('sousTotal'),
                'total' => $request->get('total'),
                'payment_penality_days' => $request->get('paymentPenalityDays'),
                'payment_penality_rate' => $request->get('paymentPenalityRate'),
                'notes' => str_replace('\n', '<br />', $request->get('notes')) ?? '',
                'client_id' => $request->get('client'),
                'editor_id' => $request->get('editor'),
            ]
        );
    }

    public function deleteInvoice(Invoice $invoice) : bool|null
    {
        return $invoice->delete();
    }

    public function countInvoices(User $user) : int
    {
        return $this->model
            ->newQuery()
            ->where('editor_id', $user->getKey())
            ->count();
    }

    public function totalMountInvoice(User $user) : string
    {
        $invoiceTotal = $this->model
            ->newQuery()
            ->where('editor_id', $user->getKey())
            ->get('total')
            ->all();
        $sumTotal = 0;

        foreach ($invoiceTotal as $total) {
            $sumTotal += floatval(str_replace([' ', '€', ','], ['', '', '.'], $total['total']));
        }
        return number_format($sumTotal, 2, ',', ' ');
    }
}
