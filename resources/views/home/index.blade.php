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
                <h1>Augree Wireless Broadband Bangladesh Ltd.</h1>
                <br>
                <p><center><strong>Personal Detail</strong></center></p>
            </div>
            <div class="modal-body">
                <p>Employee Id: <span id="phone"></span></p>
                <p>Employee Name: <span id="phone"></span></p>
                <p>Designation: <span id="phone"></span></p>
                <p>Department: <span id="phone"></span></p>
                <p>Category: <span id="phone"></span></p>
                <p>Grade: <span id="phone"></span></p>
                <p>Step: <span id="phone"></span></p>
                <p>Band: <span id="phone"></span></p>
                <p>Level: <span id="phone"></span></p>
                <p>Birth Date: <span id="phone"></span></p>
                <p>Father's Name: <span id="phone"></span></p>
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
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <!--                <h4 class="modal-title">Augree Wireless Broadband Bangladesh Ltd.</h4>-->
            </div>
            <div class="modal-body">
                @if(count($employeeIncomes)>0)
                <h4 class="text-center">Augree Wireless Broadband Bangladesh Ltd.</h4>
                <p class="text-center">Payslip</p>
                <p class="text-center">Date</p>
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
                <table class="table table-bordered">
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
                            <td class="text-center"> <strong> Net Income </strong> </td>
                            <td> {{ $netMonthlyIncome }} </td>
                        </tr>

                    </tbody>

                </table>
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
                <h4 class="modal-title">Modal Header 2</h4>
            </div>
            <div class="modal-body">
                <p>Some text in the modal.</p>
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
                <h4 class="modal-title">Modal Header 3</h4>
            </div>
            <div class="modal-body">
                <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<!--button5-->
<!--<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal5">Tax Computation for the month of April</button>-->
<br>

<!-- Modal -->
<div class="modal fade5" id="myModal5" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header 4</h4>
            </div>
            <div class="modal-body">
                <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
                    $('.modal,.modal-backdrop').addC lass('toPrint');
                    $('body').addClass('non-print');
                    });
// Remove classes
            $('.modal').on('hidden.bs.modal', function () {
                            $('.modal,.modal-backdrop').removeClass('toPrint');
                    $('body').removeClass('non-print');
                    });
            });
            })
            <!--End this part-->

            <!--Download PDF-->
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

