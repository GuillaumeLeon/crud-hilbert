@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Account : {{ $account->number }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('accounts.update', $account) }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group row">
                                <label for="number"
                                       class="col-md-4 col-form-label text-md-right">Account number</label>

                                <div class="col-md-6">
                                    <input id="number" type="text"
                                           class="form-control @error('number') is-invalid @enderror" name="number"
                                           value="{{ old('number', $account->number) }}" required autocomplete="number"
                                           autofocus>

                                    @error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="type_id"
                                       class="col-md-4 col-form-label text-md-right">Account type</label>

                                <div class="col-md-6">
                                    <select class="form-control @error('type_id') is-invalid @enderror" name="type_id"
                                            id="type_id" required>
                                        <option value="">Choose a type</option>
                                        @foreach(\App\Models\AccountType::all() as $type)
                                            <option
                                                {{ (old('type_id') !== null && old('type_id') === $type->id) || $type->id === $account->type_id ? 'selected' : '' }} value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
