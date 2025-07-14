@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-6">
            <h1>پروفایل {{ $user->name }}</h1>
        </div>
        <div class="col-md-6 text-end">
            <span class="badge fs-5" style="background-color: {{ $user->tier->color_code }}">
                سطح: {{ $user->tier->name }}
            </span>
            <span class="badge bg-secondary fs-5 ms-2">
                امتیاز: {{ $user->loyalty_points }}
            </span>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>افزودن امتیاز</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('customer-club.add-points', $user->id) }}">
                        @csrf
                        <div class="mb-3">
                            <label for="activity_type_id" class="form-label">نوع فعالیت</label>
                            <select class="form-select" id="activity_type_id" name="activity_type_id" required>
                                @foreach($activityTypes as $activity)
                                <option value="{{ $activity->id }}">{{ $activity->name }} ({{ $activity->points }} امتیاز)</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="amount" class="form-label">مقدار امتیاز (اختیاری)</label>
                            <input type="number" class="form-control" id="amount" name="amount">
                            <div class="form-text">در صورت خالی گذاشتن، امتیاز پیش‌فرض فعالیت اعمال می‌شود</div>
                        </div>
                        <div class="mb-3">
                            <label for="notes" class="form-label">توضیحات</label>
                            <textarea class="form-control" id="notes" name="notes" rows="2"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">ثبت امتیاز</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>تاریخچه امتیازات</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($user->points as $point)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <strong>{{ $point->activityType->name }}</strong>
                                <div class="text-muted small">{{ $point->created_at->format('Y-m-d H:i') }}</div>
                                @if($point->notes)
                                <div class="mt-1">{{ $point->notes }}</div>
                                @endif
                            </div>
                            <span class="badge bg-primary rounded-pill">{{ $point->amount }} امتیاز</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
