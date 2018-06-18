@extends('layouts.layout')
@section('title','Home')

@section('content')

<br>

<form method="post" action="{{url("/home")}}">
    <div class="col-md-4" >
        <label>Income Year:</label>
        <select class="input" name="income_year">
            <option value="2018-2019">2018-2019</option>
            <option value="2019-2020">2019-2020</option>
            <option value="2020-2021">2020-2021</option>
        </select>
    </div>

    <div class="col-md-4" >
        <label >Month:</label>
        <select name="month">
            <!--<option value=""></option>-->
            <option value="January">January</option>
            <option value="February">February</option>
            <option value="March">March</option>
            <option value="April">April</option>
            <option value="May">May</option>
            <option value="June">June</option>
            <option value="July">July</option>
            <option value="August">August</option>
            <option value="September">September</option>
            <option value="October">October</option>
            <option value="November">November</option>
            <option value="December">December</option>
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
<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal2">Payslip with bank transfer details with for the month of April</button>
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
                <h4 class="text-center">Augree Wireless Broadband Bangladesh Ltd.</h4>
                <p class="text-center">Payslip</p>
                <p class="text-center">Date</p>
                <table class="table">
                    <tr>
                        <td> Employee Code: </td>
                        <td> Employee Name: </td>
                    </tr>
                    <tr>
                        <td> Designation: </td>
                        <td> Joining Date: </td>
                    </tr>
                    <tr>
                        <td> Sub Department: </td>
                        <td> TIN: </td>
                    </tr>
                </table>
                <hr />
                Component wise breakdown:


                <table class="table table-bordered">
                    <thead style="background-color:lightgray">
                        <tr>
                            <th colspan="2">Earnings</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employeeIncomes as $employeeIncome)
                        <tr>
                            <td> {{$employeeIncome->salary_id}} </td>
                            <td> {{$employeeIncome->amount}} </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!--button3-->
<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal3">Investment Notification Letter for the income year in 2017-2018</button>
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
<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal4">Tax Computation for the income year in 2017-2018</button>
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
<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal5">Tax Computation for the month of April</button>
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
                                        type: "pdf",
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

