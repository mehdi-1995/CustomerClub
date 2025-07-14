@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">باشگاه مشتریان</h1>

    <div class="card mb-4">
        <div class="card-header">
            <h5>لیست کاربران</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>نام</th>
                        <th>ایمیل</th>
                        <th>سطح</th>
                        <th>امتیاز</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <span class="badge" style="background-color: {{ $user->tier->color_code }}">
                                {{ $user->tier->name }}
                            </span>
                        </td>
                        <td>{{ $user->loyalty_points }}</td>
                        <td>
                            <a href="{{ route('customer-club.users.show', $user->id) }}" class="btn btn-sm btn-primary">
                                جزئیات
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection
