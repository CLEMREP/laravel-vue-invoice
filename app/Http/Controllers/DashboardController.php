<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\User;
use App\Repositories\ClientRepository;
use App\Repositories\EsitmateRepository;
use App\Repositories\InvoiceRepository;
use Illuminate\Support\Facades\Auth;
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
        /** @var User $connectedUser */
        $connectedUser = Auth::user();

        return Inertia::render(
            'myDashboard',
            [
                'userCount' => $this->clientRepository->countClients($connectedUser),
                'invoiceCount' => $this->invoiceRepository->countInvoices($connectedUser),
                'estimateCount' => $this->estimateRepository->countEstimates($connectedUser),
                'sumInvoice' => $this->invoiceRepository->totalMountInvoice($connectedUser),
                'estimates' => $this->estimateRepository->listOfEstimates($connectedUser),
                'invoices' => $this->invoiceRepository->listOfInvoices($connectedUser),
            ]
        );
    }
}
