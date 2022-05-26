<?php

namespace Modules\Finance\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Finance\Repositories\ChartOfAccountRepository;
use Modules\Finance\Services\ReportService;
use Modules\Finance\Services\InvoiceService;

class ReportController extends Controller
{
    /**
     * @var ReportService
     */
    private $reportService,$invoiceService;
    /**
     * @var Request
     */
    private $request;


    public function __construct(
        ReportService $reportService,InvoiceService $invoiceService,
        Request $request
    )
    {
        $this->reportService = $reportService;
        $this->invoiceService = $invoiceService;
        $this->request = $request;
    }

    public function profit()
    {
        $data = $this->reportService->profit($this->request->all());

        if ($this->request->ajax()) {
            return view('finance::report.profit.data', compact('data'));
        }
        return view('finance::report.profit.index', compact('data'));
    }
    public function paymentdue()
    {
        $data = $this->invoiceService->getDueStatusByDate($this->request->all());
        if ($this->request->ajax()) {
            return view('finance::report.paymentdue.data', compact('data'));
        }
        return view('finance::report.paymentdue.index', compact('data'));   
    }
    public function transaction()
    {
        $data = $this->reportService->transaction($this->request->all());

        if ($this->request->ajax()) {
            return view('finance::report.transaction.data')->with($data);
        }

        return view('finance::report.transaction.index')->with($data);
    }

    public function statement()
    {
        $data = $this->reportService->statement($this->request->all());
        if ($this->request->ajax()) {
            return view('finance::report.statement.data')->with($data);
        }

        return view('finance::report.statement.index')->with($data);
    }

    public function bankStatement($id)
    {
        $data = $this->reportService->bankReport($id);

        return view('finance::report.bank.index')->with($data);
    }
}
