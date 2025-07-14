@extends('layouts.app')

@section('title', 'داشبورد باشگاه مشتریان')

@section('content')
    <style>
        .content-box {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .tier-badge {
            background-color: {{ $tier->color_code }};
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
        }
    </style>

    <div class="dashboard-sections">
        <!-- بخش امتیاز و اعتبار -->
        <section id="section1" class="content-box">
            <h2>امتیاز و اعتبار مشترک</h2>
            <p>امتیاز فعلی شما: <strong>{{ $user->loyalty_points }}</strong></p>
            <p>اعتبار فعلی شما: <strong>{{ number_format($user->credit) }} تومان</strong></p>
        </section>

        <!-- بخش سطح مشتری -->
        <section id="section2" class="content-box">
            <h2>سطح و لول مشتری</h2>
            <p>سطح فعلی: <span class="tier-badge">{{ $tier->name }}</span></p>
            <p>امتیاز مورد نیاز برای سطح بعدی:
                <strong>
                    @if($tier->nextTier)
                        {{ $tier->nextTier->min_points - $user->loyalty_points }}
                    @else
                        شما بالاترین سطح را دارید
                    @endif
                </strong>
            </p>
        </section>

        <!-- بخش کسب امتیاز -->
        <section id="section3" class="content-box">
            <h2>کسب امتیاز</h2>
            <div class="row">
                @foreach($activities as $activity)
                <div class="col-md-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $activity->name }}</h5>
                            <p class="card-text">{{ $activity->description }}</p>
                            <p class="text-success">+{{ $activity->points }} امتیاز</p>
                            <form action="{{ route('customer-club.points.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="activity_type_id" value="{{ $activity->id }}">
                                <button type="submit" class="btn btn-primary">ثبت فعالیت</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>

        <!-- بخش تاریخچه امتیازات -->
        <section id="section4" class="content-box">
            <h2>تاریخچه امتیازات</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>تاریخ</th>
                            <th>فعالیت</th>
                            <th>امتیاز</th>
                            <th>وضعیت</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pointsHistory as $point)
                        <tr>
                            <td>{{ $point->created_at->format('Y/m/d H:i') }}</td>
                            <td>{{ $point->activityType->name }}</td>
                            <td>{{ $point->amount }}</td>
                            <td>{{ $point->is_used ? 'استفاده شده' : 'فعال' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $pointsHistory->links() }}
            </div>
        </section>
    </div>
@endsection
