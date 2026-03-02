@extends('layouts.app')

@section('title', 'Mensual Budget')
@section('content')

<div class="container my-5">
    <h2 class="mb-4">{{ trans('tools.mensual_budget') }}</h2>

    {{-- Select Pay Frequency --}}
    <div class="row mb-3">
        <div class="col-md-3">
            <select class="form-select" id="payFrequency">
                <option value="1" selected>Mensuel</option>
                <option value="2">Bi-Hebdo</option>
                <option value="4">Hebdo</option>
            </select>
        </div>
    </div>

    {{-- Carte Montant par paie --}}
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card text-center text-white">
                <div class="card-header">{{ trans('tools.amount_per_pay') }}</div>
                <div class="card-body">
                    <h3 id="amountPerPay">$0.00</h3>
                </div>
            </div>
        </div>
    </div>

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
                        <th>{{ trans('tools.frequency') }}</th>
                        <th>{{ trans('tools.amount') }}</th>
                        <th>{{ trans('tools.actions') }}</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>

    {{-- Formulaire ajout / édition --}}
    <div class="card">
        <div class="card-header">{{ trans('tools.add_entry') }}</div>
        <div class="card-body">
            <form id="budgetForm">
                <div class="row g-3">
                    <div class="col-md-2"><input type="date" class="form-control" id="entryDate" required></div>
                    <div class="col-md-3"><input type="text" class="form-control" id="entryDescription" placeholder="{{ trans('tools.description') }}" required></div>
                    <div class="col-md-2">
                        <select class="form-select" id="entryType" required>
                            <option value="income">{{ trans('tools.income') }}</option>
                            <option value="expense" selected>{{ trans('tools.expense') }}</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="form-select" id="entryFrequency" required>
                            <option value="weekly">{{ trans('tools.weekly') }}</option>
                            <option value="biweekly">{{ trans('tools.biweekly') }}</option>
                            <option value="monthly">{{ trans('tools.monthly') }}</option>
                        </select>
                    </div>
                    <div class="col-md-2"><input type="number" class="form-control" id="entryAmount" step="0.01" placeholder="$0.00" required></div>
                    <div class="col-md-1"><button type="submit" class="btn btn-success">{{ trans('tools.add') }}</button></div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    let budgetEntries = [];

    const translations = {
        type: { income: '{{ trans("tools.income") }}', expense: '{{ trans("tools.expense") }}' },
        frequency: { weekly: '{{ trans("tools.weekly") }}', biweekly: '{{ trans("tools.biweekly") }}', monthly: '{{ trans("tools.monthly") }}' },
        delete: '{{ trans("tools.delete") }}'
    };

    function getFrequencyOccurrences(freq) {
        switch(freq) {
            case 'weekly': return 4;
            case 'biweekly': return 2;
            case 'monthly': return 1;
            default: return 1;
        }
    }

    function updateTable() {
        const tbody = $('#budgetTable tbody');
        tbody.empty();

        let totalIncome = 0, totalExpense = 0;
        let totalMonthlyNet = 0;

        let payFrequency = parseInt($('#payFrequency').val()) || 1;

        budgetEntries.forEach((entry, index) => {
            const amount = parseFloat(entry.amount);
            const occurrences = getFrequencyOccurrences(entry.frequency);
            const monthlyAmount = amount * occurrences;

            if(entry.type === 'income') {
                totalIncome += monthlyAmount;
                totalMonthlyNet += monthlyAmount;
            }
            if(entry.type === 'expense') {
                totalExpense += monthlyAmount;
                totalMonthlyNet -= monthlyAmount;
            }

            tbody.append(`
                <tr>
                    <td>${entry.date}</td>
                    <td>${entry.description}</td>
                    <td>${translations.type[entry.type]}</td>
                    <td>${translations.frequency[entry.frequency]}</td>
                    <td>$${amount.toFixed(2)}</td>
                    <td><button class="btn btn-sm btn-danger" onclick="deleteEntry(${index})">${translations.delete}</button></td>
                </tr>
            `);
        });

        $('#totalIncome').text(`$${totalIncome.toFixed(2)}`);
        $('#totalExpense').text(`$${totalExpense.toFixed(2)}`);
        $('#balance').text(`$${totalMonthlyNet.toFixed(2)}`);

        // Calculate amount per pay using total expenses only, always positive
        const amountPerPay = payFrequency > 0 ? Math.abs(totalExpense) / payFrequency : Math.abs(totalExpense);
        $('#amountPerPay').text(`$${amountPerPay.toFixed(2)}`);
    }

    $('#budgetForm').on('submit', function(e) {
        e.preventDefault();
        const entry = {
            date: $('#entryDate').val(),
            description: $('#entryDescription').val(),
            type: $('#entryType').val(),
            frequency: $('#entryFrequency').val(),
            amount: $('#entryAmount').val()
        };
        budgetEntries.push(entry);
        updateTable();
        this.reset();
    });

    window.deleteEntry = function(index) {
        budgetEntries.splice(index, 1);
        updateTable();
    }

    $('#payFrequency').on('change', updateTable);
});
</script>

@endsection