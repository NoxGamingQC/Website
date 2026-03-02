@extends('layouts.app')

@section('title', 'Mensual Budget')
@section('content')

<div class="container my-5">
    <h2 class="mb-4">{{ trans('tools.mensual_budget') }}</h2>

    {{-- Résumé du mois --}}
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-header">{{ trans('tools.total_income') }}</div>
                <div class="card-body">
                    <h3 id="totalIncome">$0.00</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-header">{{ trans('tools.total_expense') }}</div>
                <div class="card-body">
                    <h3 id="totalExpense">$0.00</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-header">{{ trans('tools.balance') }}</div>
                <div class="card-body">
                    <h3 id="balance">$0.00</h3>
                </div>
            </div>
        </div>
    </div>

    {{-- Table du budget --}}
    <div class="card mb-4">
        <div class="card-header">{{ trans('tools.budget_entries') }}</div>
        <div class="card-body">
            <table class="table table-striped" id="budgetTable">
                <thead>
                    <tr>
                        <th>{{ trans('tools.date') }}</th>
                        <th>{{ trans('tools.description') }}</th>
                        <th>{{ trans('tools.type') }}</th>
                        <th>{{ trans('tools.amount') }}</th>
                        <th>{{ trans('tools.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Les entrées seront ajoutées dynamiquement --}}
                </tbody>
            </table>
        </div>
    </div>

    {{-- Formulaire ajout / édition --}}
    <div class="card">
        <div class="card-header">{{ trans('tools.add_entry') }}</div>
        <div class="card-body">
            <form id="budgetForm">
                <div class="row g-3">
                    <div class="col-md-3">
                        <input type="date" class="form-control" id="entryDate" required>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="entryDescription" placeholder="{{ trans('tools.description') }}" required>
                    </div>
                    <div class="col-md-2">
                        <select class="form-select" id="entryType" required>
                            <option value="income">{{ trans('tools.income') }}</option>
                            <option value="expense">{{ trans('tools.expense') }}</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <input type="number" class="form-control" id="entryAmount" step="0.01" placeholder="$0.00" required>
                    </div>
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-success">{{ trans('tools.add') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Script pour gérer le budget côté client --}}
<script>
$(document).ready(function() {
    let budgetEntries = [];

    function updateTable() {
        const tbody = $('#budgetTable tbody');
        tbody.empty();

        let totalIncome = 0;
        let totalExpense = 0;

        budgetEntries.forEach((entry, index) => {
            const amount = parseFloat(entry.amount);
            if(entry.type === 'income') totalIncome += amount;
            if(entry.type === 'expense') totalExpense += amount;

            tbody.append(`
                <tr>
                    <td>${entry.date}</td>
                    <td>${entry.description}</td>
                    <td>${entry.type}</td>
                    <td>$${amount.toFixed(2)}</td>
                    <td>
                        <button class="btn btn-sm btn-danger" onclick="deleteEntry(${index})">{{ trans('tools.delete') }}</button>
                    </td>
                </tr>
            `);
        });

        $('#totalIncome').text(`$${totalIncome.toFixed(2)}`);
        $('#totalExpense').text(`$${totalExpense.toFixed(2)}`);
        $('#balance').text(`$${(totalIncome - totalExpense).toFixed(2)}`);
    }

    $('#budgetForm').on('submit', function(e) {
        e.preventDefault();
        const entry = {
            date: $('#entryDate').val(),
            description: $('#entryDescription').val(),
            type: $('#entryType').val(),
            amount: parseFloat($('#entryAmount').val())
        };
        budgetEntries.push(entry);
        updateTable();

        // Reset form
        this.reset();
    });

    window.deleteEntry = function(index) {
        budgetEntries.splice(index, 1);
        updateTable();
    }
});
</script>

@endsection