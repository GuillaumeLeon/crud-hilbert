@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between"><h3>Transactions list</h3><a
                            href="{{ route('transactions.create') }}" class="btn btn-primary">Create a new
                            transaction</a></div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->title }}</td>
                                    <td>{{ number_format($transaction->amount, 2, '.', ',') }}</td>
                                    <td>{{ $transaction->date->format('d/m/Y') }}</td>
                                    <td>{{ $transaction->status->name }}</td>
                                    <td>
                                        <a href="{{ route('transactions.edit', $transaction) }}"
                                           class="btn btn-primary">Edit</a>
                                        <form action="{{ route('transactions.destroy', $transaction) }}" method="POST"
                                              class="m-0 p-0 d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
