@extends('layouts.pages.app')
@section('title', trans('tools.mensual_budget'))
@section('slogan', trans('tools.mensual_budget.description'))
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>{{trans('tools/mensual_budget.mensual_budget')}}</h1>
            <p class="no-print">For privacy reason, no data is or will be saved on this page. Upon refreshing the page all data will be lost. If you want to keep those data, you can print this page using <kbd>CTRL</kbd> + <kbd>P</kbd> or in your browser settings. All unnecessary text will disapear on the printed document.</p>
        </div>
    </div>
    <div class="col-6">
        <h4 class="text-success">Total income: <span id="totalIncome"></span></h4>
        <h4 class="text-danger">Total expenses: <span id="totalExpense"></span></h4>
        <h4 class="text-info">Total saved: <span id="totalSaved"></span></h4>
    </div>
    <div class="col-12">
        <table id="incomes" class="table table-success table-striped">
            <tr>
                <th>Incomes</th>
                <th>Amount</th>
                <th>Frequency</th>
                <th class="no-print text-center"><i class="fa fa-trash" aria-hidden="true"></i></th>
            </tr>
        </table>
    </div>
    <div class="col-md-12 no-print">
        <table class="table table-success table-striped">
            <tr>
                <th>Name</th>
                <th>Amount</th>
                <th>Frequency</th>
                <th class="no-print text-center"><i class="fa fa-plus" aria-hidden="true"></i></th>
            </tr>
            <tr>
                <td><input id="incomeName" type="text" class="form-control" placeholder="Name or description of the income" /></td>
                <td class="input-group"><input id="incomeAmount" type="text" class="form-control" placeholder="0.00" /><span class="input-group-text">$</span></td>
                <td>
                    <select id="incomeFrequency" class="form-select">
                        <option selected>Monthly</option>
                        <option disabled>Bi-monthly</option>
                        <option disabled>Weekly</option>
                        <option disabled>Daily</option>
                    </select>
                </td>
                <td class="text-center"><button id="addIncome" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button></td>
            </tr>
        </table>
    </div>
    <div class="col-12">
        <table id="expenses" class="table table-danger table-striped">
            <tr>
                <th>Expenses</th>
                <th>Amount</th>
                <th>Frequency</th>
                <th>Pay before</th>
                <th class="no-print text-center"><i class="fa fa-trash" aria-hidden="true"></i></th>
            </tr>
        </table>
    </div>
    <div class="col-md-12 no-print">
        <table class="table table-danger table-striped">
            <tr>
                <th>Name</th>
                <th>Amount</th>
                <th>Frequency</th>
                <th>Pay before</th>
                <th class="no-print text-center"><i class="fa fa-plus" aria-hidden="true"></i></th>
            </tr>
            <tr>
                <td><input id="expenseName" type="text" class="form-control" placeholder="Name or description of the expense" /></td>
                <td class="input-group"><input id="expenseAmount" type="text" class="form-control" placeholder="0.00" /><span class="input-group-text">$</span></td>
                <td>
                    <select id="expenseFrequency" class="form-select">
                        <option selected>Monthly</option>
                        <option disabled>Bi-monthly</option>
                        <option disabled>Weekly</option>
                        <option disabled>Daily</option>
                    </select>
                </td>
                <td><input id="expensePayBefore" type="text" class="form-control" placeholder="0" /></td>
                <td class="text-center"><button id="addExpense" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button></td>
            </tr>
        </table>
    </div>

</div>
<script type="text/javascript">
    $( document ).ready(function() {
        refreshData();
    });

    $('#addIncome').on('click', function() {
        var html = 
            '<tr>'+
                '<td>'+ $('#incomeName').val() +'</td>'+
                '<td class="income-amount" value="'+ ($('#incomeAmount').val()).replace(',', '.') +'">'+ ($('#incomeAmount').val()).replace(',', '.') +' $</td>'+
                '<td>'+ $('#incomeFrequency').val() +'</td>'+
                '<td class="no-print text-center"><button class="btn btn-danger remove"><i class="fa fa-trash" aria-hidden="true"></i></button></td>'+
            '</tr>';
        var incomeTable = $('#incomes').html();
        $('#incomes').html(incomeTable + html);
        refreshData();
    });

    $('#addExpense').on('click', function() {
        var html = 
            '<tr>'+
                '<td>'+ $('#expenseName').val() +'</td>'+
                '<td class="expense-amount" value="'+ ($('#expenseAmount').val()).replace(',', '.') +'">'+ ($('#expenseAmount').val()).replace(',', '.') +' $</td>'+
                '<td>'+ $('#expenseFrequency').val() +'</td>'+
                '<td>'+ $('#expensePayBefore').val() +'</td>'+
                '<td class="no-print text-center"><button class="btn btn-danger remove"><i class="fa fa-trash" aria-hidden="true"></i></button></td>'+
            '</tr>';
        var expenseTable = $('#expenses').html();
        $('#expenses').html(expenseTable + html);
        refreshData();
    });

    function refreshData() {
        var totalIncome = 0;
        var totalExpense = 0;
        $('.remove').on('click', function () {
            var row = $(this).parent().parent();
            row.remove();
            refreshData();
        });

        $('.income-amount').each(function() {
            var income = $(this)
            totalIncome += Number(income.attr('value'));
        })

        $('.expense-amount').each(function() {
            var expense = $(this)
            totalExpense += Number(expense.attr('value'));
        })

        $('#totalIncome').html(totalIncome.toFixed(2) + ' $')
        $('#totalExpense').html(totalExpense.toFixed(2) + ' $')
        $('#totalSaved').html(Number(totalIncome.toFixed(2) - totalExpense) + ' $')
        
    }

        
</script>

@endsection