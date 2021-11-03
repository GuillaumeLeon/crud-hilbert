@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between"><h3>Accounts lists</h3><a
                            href="{{ route('accounts.create') }}" class="btn btn-primary">Create a new account</a></div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Account number</th>
                                <th scope="col">Account type</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($accounts as $account)
                                <tr>
                                    <td>{{ $account->number }}</td>
                                    <td>{{ $account->type->name }}</td>
                                    <td>
                                        <a href="{{ route('accounts.edit', $account) }}"
                                           class="btn btn-primary">Edit</a>
                                        <form action="{{ route('accounts.destroy', $account) }}" method="POST" class="m-0 p-0 d-inline">
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
