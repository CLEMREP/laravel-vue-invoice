<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Repositories\ClientRepository;
use App\Repositories\EsitmateRepository;
use App\Repositories\InvoiceRepository;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function __construct(
        private ClientRepository $clientRepository,
        private InvoiceRepository $invoiceRepository,
        private EsitmateRepository $estimateRepository,
    ) {
    }

    public function index() : Response
    {
        return Inertia::render(
            'myDashboard',
            [
                'userCount' => $this->clientRepository->countUsers(),
                'invoiceCount' => $this->invoiceRepository->countInvoices(),
                'estimateCount' => $this->estimateRepository->countEstimates(),
                'sumInvoice' => $this->invoiceRepository->totalMountInvoice(),
                'estimates' => $this->estimateRepository->listOfEstimates(),
                'invoices' => $this->invoiceRepository->listOfInvoices(),
            ]
        );
    }
}
