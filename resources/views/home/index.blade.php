@extends('layouts.layout')
@section('title','Home')

@section('content')

<br>

<form method="post" action="{{url("/home")}}">
    <div class="col-md-4" >
        <label>Income Year:</label>
        <select class="input" name="income_year">
            <option value="2018-2019" {{ $incomeYear == '2018-2019' ? 'selected="selected"' : ''}}>2018-2019</option>
            <option value="2019-2020" {{ $incomeYear == '2019-2020' ? 'selected="selected"' : ''}}>2019-2020</option>
            <option value="2020-2021" {{ $incomeYear == '2020-2021' ? 'selected="selected"' : ''}}>2020-2021</option>
        </select>
    </div>

    <div class="col-md-4" >
        <label >Month:</label>
        <select name="month" >
            <option value="January" {{ $month == 'January' ? 'selected="selected"' : ''}}>January</option>
            <option value="February" {{ $month == 'February' ? 'selected="selected"' : ''}}>February</option>
            <option value="March" {{ $month == 'March' ? 'selected="selected"' : ''}}>March</option>
            <option value="April" {{ $month == 'April' ? 'selected="selected"' : ''}}>April</option>
            <option value="May" {{ $month == 'May' ? 'selected="selected"' : ''}}>May</option>
            <option value="June" {{ $month == 'June' ? 'selected="selected"' : ''}}>June</option>
            <option value="July" {{ $month == 'July' ? 'selected="selected"' : ''}}>July</option>
            <option value="August" {{ $month == 'August' ? 'selected="selected"' : ''}}>August</option>
            <option value="September" {{ $month == 'September' ? 'selected="selected"' : ''}}>September</option>
            <option value="October" {{ $month == 'October' ? 'selected="selected"' : ''}}>October</option>
            <option value="November" {{ $month == 'November' ? 'selected="selected"' : ''}}>November</option>
            <option value="December" {{ $month == 'December' ? 'selected="selected"' : ''}}>December</option>
        </select>
    </div>

    {{ csrf_field() }} 

    <div class="col-md-4" >
        <input class="btn btn-success btn-sm" type="submit" name="search" value="Search Payroll Info" />
    </div>
</form>
<br /><br />


<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal1">Employee Details</button>
<br>

<!-- Modal -->
<div class="modal fade1" id="myModal1" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button id="pdf-button" type="button" class="btn btn-default" onclick="downloadPDF()">Save as PDF</button>
                <button type="button" class="btn btn-default print" onClick="window.print(); return false">Print</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            <div class="modal-header">
                <h4>Augree Wireless Broadband Bangladesh Ltd.</h4>                
            </div>
            <div class="modal-body">

                <p><center><strong>Personal Detail</strong></center></p>
                <table class="table" >
                    <tr>
                        <td>Employee Id</td> <td> : {{ $employeeInfo->employee_id }}</td>                        
                    </tr>
                    <tr>
                        <td>Employee Name</td> <td> : {{ $employeeInfo->details->first_name }} {{ $employeeInfo->details->last_name }}</td>                        
                    </tr>
                    <tr>
                        <td>Designation</td> <td> : {{ $employeeInfo->details->designation }}</td>                        
                    </tr>
                    <tr>
                        <td>Department</td> <td> : {{ $employeeInfo->details->department->name }}</td>                        
                    </tr>
                    <tr>
                        <td>Sub Department</td> <td> : {{ $employeeInfo->details->subDepartment->name }}</td>                        
                    </tr>
                    <tr>
                        <td>Category</td> <td> : {{ $employeeInfo->details->category }}</td>                        
                    </tr>
                    <tr>
                        <td>Grade</td> <td> : {{ $employeeInfo->details->grade }} </td>                        
                    </tr>
                    <tr>
                        <td>Step</td> <td> : {{ $employeeInfo->details->step }}  </td>                        
                    </tr>
                    <tr>
                        <td>Band</td> <td> : {{ $employeeInfo->details->band }}  </td>                        
                    </tr>
                    <tr>
                        <td>Level</td> <td> : {{ $employeeInfo->details->level }}   </td>                        
                    </tr>
                    <tr>
                        <td>Date of Birth</td> <td> : {{ $employeeInfo->details->date_of_birth }}   </td>                        
                    </tr>
                </table>
            </div>
            <div class="modal-footer">

            </div>
        </div>

    </div>
</div>
<!--button2-->
<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal2">Payslip with bank transfer details with for the month of {{ $month }}</button>
<br>

<!-- Modal -->
<div class="modal fade2" id="myModal2" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button id="pdf-button" type="button" class="btn btn-default" onclick="downloadPDF()">Save as PDF</button>
                <button type="button" class="btn btn-default print" onClick="window.print(); return false">Print</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            <div class="modal-body">
                @if(count($employeeIncomes)>0)
                <h4 class="text-center">Augree Wireless Broadband Bangladesh Ltd.</h4>
                <p class="text-center">Payslip, {{ $month }}</p>
                <p class="text-center">Date : {{ substr($payroll->created_at,0,-8) }}</p>
                <table class="table">

                    <tr>
                        <td> <label> Employee Name: </label> {{ $employeeInfo->details->first_name }} {{ $employeeInfo->details->last_name }}</td>
                        <td> <label> Employee Code: </label> {{ $employeeInfo->employee_id }}</td>                        
                    </tr>
                    <tr>
                        <td> <label> Designation: </label> {{ $employeeInfo->details->designation }} </td>
                        <td> <label> Joining Date: </label> {{ $employeeInfo->details->date_of_join }} </td>
                    </tr>
                    <tr>
                        <td> <label> Sub Department: </label> {{ $employeeInfo->details->subDepartment->name }} </td>
                        <td> <label> TIN: </label> {{ $employeeInfo->details->tin }} </td>
                    </tr>

                </table>
                <hr />
                <h5>
                    Component wise breakdown: 
                </h5>
                <table class="table table-bordered table-condensed">
                    <thead style="background-color:lightgray">
                        <tr>
                            <th > Earnings </th>
                            <th > BDT </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($employeeIncomes as $employeeIncome)
                        <tr>
                            <td> {{$employeeIncome->salary->name}} </td>
                            <td> {{$employeeIncome->amount}} </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td class="text-right"> <strong> Net Income </strong> </td>
                            <td> {{ $netMonthlyIncome }} </td>
                        </tr>

                    </tbody>

                </table>
                <table class="table table-bordered table-condensed">
                    <thead style="background-color:lightgray">
                        <tr>
                            <th > Deductions </th>
                            <th > BDT </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($employeeMonthlyDeductions as $employeeDeduction)
                        <tr>
                            <td> {{$employeeDeduction->deductionInfo->name}} </td>
                            <td class="text-center"> {{$employeeDeduction->amount}} </td>
                        </tr>
                        @endforeach
                        @if($employeeMonthlyTax->amount > 0)
                        <tr>
                            <td> Monthly Income Tax </td>
                            <td class="text-center"> {{$employeeMonthlyTax->amount}} </td>
                        </tr>
                        @endif
                        <tr>
                            <td class="text-right" > <strong> Net Deduction </strong> </td>
                            <td class="text-center" > {{ $netMonthlyDeduction + $employeeMonthlyTax->amount }} </td>
                        </tr>

                    </tbody>

                </table>

                <strong>Net Payable: </strong> {{ $netMonthlyIncome - ($netMonthlyDeduction + $employeeMonthlyTax->amount) }} BDT

                <br /><br />

                <p class="text-center">
                    [Software generated Payslip - Signature is not required]
                </p>

                @else
                <p> Payroll is not found </p>
                @endif

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!--button3-->
<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal3">Investment Notification Letter for the income year in {{ $incomeYear }}</button>
<br>

<!-- Modal -->
<div class="modal fade3" id="myModal3" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Investment Notification Letter</h4>
            </div>
            <div class="modal-body">
                @if($employeeInvestment != NULL)
                <p class="text-justify">
                    {{ $employeeInfo->details->first_name }} {{ $employeeInfo->details->last_name }}
                    <br />
                    {{ $employeeInfo->details->designation}} - {{ $employeeInfo->details->subDepartment->name}}
                    <br />
                    Augere Wireless Broadband Bangladesh Ltd.
                    <br /><br />

                    Subject: Investment in approved securities for the purpose of income tax rebate for the income year: {{ $incomeYear }} 
                    <br /><br />
                    Dear  {{ $employeeInfo->details->first_name }} {{ $employeeInfo->details->last_name }},
                    <br /><br />
                    You are aware that every employee is required to invest in approved securities/instruments each year for income tax rebate .
                    As per your present salary and benefits, you are required to invest at least an amount of Tk
                    {{ $employeeInvestment->amount }} during the {{ $incomeYear }}  but not later than 30th June {{ substr($incomeYear,5)}} to get maximum tax rebate.
                    Since you are a member of Govt. recognized PF Trust, contribution to PF Trust Tk. {{ $totalContribution }} (both contribution till June {{ substr($incomeYear,5)}})
                    can be shown as eligible investment to claim tax rebate. So you may plan to invest remaining balance
                    Tk. <strong> {{ $employeeInvestment->amount - $totalContribution }} </strong>
                    ( TK. {{ $employeeInvestment->amount }} - TK. {{ $totalContribution }} )
                    for further investment to eligible investment mode as guided in the following para.
                    <br /><br />
                    Please, note that your estimated tax burden has been calculated considering maximum tax rebate assuming that you will invest the required amount in approved securities/instruments during the income year {{ $incomeYear }}.
                    If you do not or partially invest , you will get no rebate or partial rebate, as the case may be, and accordingly your tax burden/tax deduction will be increased. For your convenience we provide below list of eligible 
                    investments for availing the Tax Rebate:
                    <br /><br />
                </p>
                <table class="table table-bordered">
                    <tr><td> I) Life insurance premium paid by an individual </td></tr>
                    <tr><td> II) Contribution to Benevolent Fund and Group Insurance Scheme </td></tr>
                    <tr><td> III) Contribution to Govt. recognized provident fund and other funds </td></tr>
                    <tr><td> IV) Investment in stocks and Shares of listed companies </td></tr>
                    <tr><td> V) Investment in Debentures or Debenture -Stocks </td></tr>
                    <tr><td> VI) Investment in Unit Certificate ,Govt. securities (Shanchay Patra) etc. </td></tr>
                    <tr><td> VII) Govt. approved Deposit Pension Scheme(DPS) not exceeding Taka 60,000 </td></tr>
                    <tr><td> VIII) Donation to a charitable Hospital </td></tr>
                    <tr><td> IX) Donation to organization for the welfare of the retarded people </td></tr>
                    <tr><td> X) Donation to Zakat Fund </td></tr>
                    <tr><td> XI) Donation to Ahsania Cancer Hospital </td></tr>
                    <tr><td> XII) Donation to Govt. Approved Educational Institution </td></tr>
                    <tr><td> XIII) Any sum invested in the purchase of one computer or one laptop by an Individual 
                            assess subject to maximum Taka 100,000 for laptop and Taka 50,000 for desktop.
                        </td></tr>
                </table>
                <br />
                <p class="text-justify">
                    Thanking you. <br />
                    Authorized Payroll Service Provider of <br />
                    Augere Wireless Broadband Bangladesh Ltd. 
                </p>
                <br />
                <p class="text-center">[Software generated letter-Signature is not required]</p>
                @else
                No Investment Letter
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<!--button4-->
<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal4">Tax Computation for the income year in {{ $incomeYear }}</button>
<br>

<!-- Modal -->
<div class="modal fade4" id="myModal4" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center">Income Tax Computation</h4>                
            </div>
            <div class="modal-body">
                @if(count($employeeYearlyTaxes) > 0)
                <p class="text-center">Income Year : {{$incomeYear}}</p>
                <table class="table">
                    <tr>
                        <td> <label> Employee Name: </label> {{ $employeeInfo->details->first_name }} {{ $employeeInfo->details->last_name }}</td>
                        <td> <label> Employee Code: </label> {{ $employeeInfo->employee_id }}</td>                        
                    </tr>
                    <tr>
                        <td> <label> Designation: </label> {{ $employeeInfo->details->designation }} </td>
                        <td> <label> Joining Date: </label> {{ $employeeInfo->details->date_of_join }} </td>
                    </tr>
                    <tr>
                        <td> <label> Sub Department: </label> {{ $employeeInfo->details->subDepartment->name }} </td>
                        <td> <label> TIN: </label> {{ $employeeInfo->details->tin }} </td>
                    </tr>
                </table>
                <p>
                    Salary Wise Tax Breakdown
                </p>
                <table class="table table-striped table-bordered table-condensed">
                    <tr>
                        <th class="text-center" >Salary Component</th>
                        <th class="text-center">Salary Income BDT</th>
                        <th class="text-center">Allowable Exemption BDT</th>
                        <th class="text-center">Add. for noncash Benifit</th>
                        <th class="text-center">Taxable Income BDT</th>
                    </tr>
                    @foreach($employeeYearlyTaxes as $employeeYearlyTax)
                    <tr>
                        <td class="text-center"> {{$employeeYearlyTax->salary->name}} </td>
                        <td class="text-center"> {{$employeeYearlyTax->salary_amount}} </td>
                        <td class="text-center"> {{$employeeYearlyTax->tax_exempted_amount}} </td>
                        <td class="text-center"> 0 </td>
                        <td class="text-center"> {{$employeeYearlyTax->taxable_amount}} </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-center"><strong>Net Income</strong></td>
                        <td class="text-center"><strong>{{ $netTaxableIncome }}</strong></td>
                    </tr>
                </table>
                <p>
                    <strong class="text-left"> Total Taxable Income BDT : {{ $netTaxableIncome }}  </strong>  
                </p>
                <p>
                    Calculation of Tax Liability :
                </p>
                <table class="table table-bordered table-striped table-condensed">
                    <tr>
                        <th class="text-center"> Tax Slab </th>
                        <th class="text-center"> Taxable Income </th>
                        <th class="text-center"> Calculated Tax BDT </th>
                    </tr>
                    @foreach($employeeYearlyTaxData as $employeeYearlyTax)
                    <tr>
                        <td class="text-center"> TK. {{ $employeeYearlyTax['amount'] }} @ {{ $employeeYearlyTax['tax_rate'] }}% </td>
                        <td class="text-center"> {{ $employeeYearlyTax['taxable_income'] }} </td>
                        <td class="text-center"> {{ $employeeYearlyTax['calculated_tax'] }} </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td class="text-center"> <strong>  Total </strong> </td>
                        <td class="text-center"> <strong> {{ $netTaxableIncome }} </strong></td>
                        <td class="text-center"> <strong> {{ $employeeYearlyTotalTax->income_tax_amount }} </strong> </td>
                    </tr>
                </table>
                <strong>Calculation of Tax Credit on Allowable Investment:</strong>
                <div class="col-md-12">
                    <div class="col-md-10">
                        <p> 
                            (a) Investment allowance limit is 25% of taxable income subject 
                            to maximum of BDT 15000000
                        </p>
                    </div>
                    <div class="col-md-2">
                        <p> 
                            {{$employeeInvestment->amount}}
                        </p>
                    </div>
                    <div class="col-md-10">
                        <p>
                            (b)  Actual Investment
                        </p>
                    </div>
                    <div class="col-md-2">
                        <p> 
                            {{$employeeInvestment->amount}}
                        </p>
                    </div>
                    <div class="col-md-10">
                        <p>
                            (c) Calculate tax credit on actual investment
                        </p>
                    </div>
                    <div class="col-md-2">
                        <p> 
                            ({{$employeeYearlyTotalTax->income_tax_rebate}})
                        </p>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-10">
                        <strong>Net Tax Payable:</strong>
                    </div>
                    <div class="col-md-2">
                        <strong> {{$employeeYearlyTotalTax->final_tax_amount}} </strong>
                    </div>
                </div>
                <br /><br /><br /><br />
                <br /><br /><br /><br />
                @else
                <p> No Income Tax Computation Data was found. </p>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"> Close </button>
            </div>
        </div>
    </div>
</div>

<!--Javascript Code -->
<script>
        <!--Print-->
        (function ($) {
                            $(document).ready(function () {
// Add Print Classes for Modal
                    $('.modal').on('shown.bs.modal', function () {
                    $('.modal,.m odal-backdrop').addC lass('toPrint');
                    $('body').addClass('non-print');
            });
            // Remove classes                     $('.modal').on('hidden.bs.modal', function () {
                            $('.modal,.modal-backdrop').removeClass('toPrint');
                    $('body').removeClass('non-print');
            });
            });
            })
            < !--End this part-- >
            < !--Download PDF-- >
            var downloadPDF = function() {
                            DocRaptor.createAndDownloadDoc("YOUR_API_KEY_HERE", {
                            test: true, // test documents are free, but watermarked
                                    type:"pdf",
                                    document_content: document.querySelector('html').innerHTML, // use this page's HTML
// document_content: "<h1>Hello world!</h1>",               // or supply HTML directly
// document_url: "http://example.com/your-page",            // or use a URL
// javascript: true,                                        // enable JavaScript processing
// prince_options: {
//   media: "screen",                                       // use screen styles instead of print styles
// }
})
}
	     
</script>

@endsection

