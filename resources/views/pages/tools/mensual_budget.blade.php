@extends('layouts.app')
@section('title', trans('tools.mensual_budget'))
@section('slogan', trans('tools.mensual_budget.description'))
@section('content')

<div class="container-fluid">
    <div class="row my-3">
        <div class="col-6">
            <h1>{{trans('tools/mensual_budget.mensual_budget')}}</h1>
        </div>
        <div class="col-6 no-print">
            <div class="input-group">
                <div class="input-group">
                    <span class="input-group-text">Pay frequency</span>
                    <select id="payFrequency" class="form-select" aria-label="Category">
                        <option value="1">Monthly</option>
                        <option value="2">Bi-weekly</option>
                        <option value="4">Weekly</option>
                    </select>
                    <button id="count" class="btn btn-primary disabled" disabled>Save</button>
                </div>
            </div>
        </div>
        <div class="col-12">
            <hr />
        </div>
    </div>
    <div class="col-12">
        <h4 class="text-success">Revenus total: <span id="totalIncome"></span></h4>
        <h4 class="text-danger">Dépenses total: <span id="totalExpense"></span></h4>
        <h4 class="text-info">Épargne total: <span id="totalSaved"></span></h4>
    </div>
    <div class="row">
        <div class="col-6 my-3">
            <div class="card text-bg-success" style="border: 1px solid #000">
                <div class="card-header" style="border-bottom: 1px solid #000">
                    <h5>Revenus</h5>
                </div>
                <div class="row g-0">
                    <div class="col-md-12">
                        <div id="incomes" class="card-body">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 my-3">
            <div class="card text-bg-danger"  style="border: 1px solid #000">
                <div class="card-header" style="border-bottom: 1px solid #000">
                    <h5>Dépenses</h5>
                </div>
                <div class="row g-0">
                    <div class="col-md-12">
                        <div id="expenses" class="card-body">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 no-print">
        <div class="card">
            <div class="card-header">
                <span>Add data (Monthly)</span>
            </div>
            <div class="row g-0">
                <div class="col-md-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="input-group">
                                    <span class="input-group-text">Name</span>
                                    <input type="text" class="form-control" id="name" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="input-group">
                                    <span class="input-group-text">Amount</span>
                                    <input type="text" inputmode="numeric" class="form-control" id="amount" value="">
                                    <span class="input-group-text">$</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="input-group">
                                    <div class="input-group">
                                        <span class="input-group-text">Category</span>
                                        <select id="category" class="form-select" aria-label="Category">
                                            <option value="0">Dépense</option>
                                            <option value="1">Revenus</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <button id="addData" class="btn btn-success">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#addData').on('click', function() {
        if(Number($('#amount').val())) {
            if ($('#category').val() == 0) {
                var html = $('#expenses').html();
                var htmlElement = $('#expenses');
            } else {
                var html = $('#incomes').html();
                var htmlElement = $('#incomes');
            }
            html += '<div class="row">'+
                        '<div class="col-6">'+
                            $('#name').val() +
                        '</div>'+
                        '<div class="col-6 ' + ($('#category').val() == 0 ? 'expenses-item' : 'incomes-item') + '" value="' + Number($('#amount').val()) + '">'+
                            Number($('#amount').val()).toFixed(2)+
                        '$</div>'+
                    '</div>'
            htmlElement.html(html);
            $('#name').val('');
            $('#amount').val('');
            countTotal();
        }
    });

    $('#payFrequency').on('change', function() {
        countTotal();
    })

    function countTotal() {
        var totalIncome = Number(0);
        var totalExpense = Number(0);
        $('.incomes-item').each(function(key, item) {
            totalIncome += Number($(item).attr('value'));
        });
        $('#totalIncome').html(Number(totalIncome).toFixed(2) + '$ (' + (Number(totalIncome).toFixed(2) / $('#payFrequency').val()) + '$)');

        $('.expenses-item').each(function(key, item) {
            totalExpense += Number($(item).attr('value'));
        });
        $('#totalExpense').html(Number(totalExpense).toFixed(2) + '$ (' + (Number(totalExpense) / $('#payFrequency').val()).toFixed(2) + '$)');
        $('#totalSaved').html((Number(totalIncome) - Number(totalExpense)).toFixed(2) + '$ (' + ((Number(totalIncome) - Number(totalExpense)) / $('#payFrequency').val()).toFixed(2) + '$)');
    }
</script>
@endsection