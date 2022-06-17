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

    public function listOfInvoices() : LengthAwarePaginator
    {
        return $this->model->newQuery()->paginate(6);
    }

    public function createInvoice(Request $request) : Invoice
    {
        return $this->model->create(
            [
                    'invoiceId' => $request->get('invoiceId'),
                    'createDate' => $request->get('invoiceDate'),
                    'dueDate' => $request->get('invoiceDueDate'),
                    'discount' => $request->get('discountRate'),
                    'subTotal' => $request->get('sousTotal'),
                    'total' => $request->get('total'),
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
                'createDate' => $request->get('invoiceDate'),
                'dueDate' => $request->get('invoiceDueDate'),
                'discount' => $request->get('discountRate'),
                'subTotal' => $request->get('sousTotal'),
                'total' => $request->get('total'),
                'client_id' => $request->get('client'),
                'editor_id' => $request->get('editor'),
            ]
        );
    }

    public function deleteInvoice(Invoice $invoice) : bool|null
    {
        return $invoice->delete();
    }

    public function countInvoices() : int
    {
        return $this->model->newQuery()->count();
    }
}
