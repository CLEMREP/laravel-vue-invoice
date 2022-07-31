<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Repositories\ClientRepository;
use App\Repositories\InvoiceRepository;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function __construct(
        private ClientRepository $clientRepository,
        private InvoiceRepository $invoiceRepository,
    ) {
    }

    public function index() : Response
    {
        $userCount = $this->clientRepository->countUsers();
        $invoiceCount = $this->invoiceRepository->countInvoices();
        return Inertia::render(
            'myDashboard',
            [
                'userCount' => $userCount,
                'invoiceCount' => $invoiceCount,
                'sumInvoice' => $this->invoiceRepository->totalMountInvoice(),
            ]
        );
    }
}
