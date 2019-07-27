@extends('layouts.front')
@section('title', 'プロフィール一覧')
@section('content')
    <div class="container">
        <h2>プロフィール一覧</h2>
        <hr color="#c0c0c0">
        <div class="row">
            <div class="profiles col-md-12 mt-3">
                @foreach($profiles as $profile)
                    <div class="profile">
                        <div class="row">
                            <div class="text col-md-4">
                                <div class="date">
                                    {{ $profile->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="name">
                                    名前 ： {{ str_limit($profile->name, 50) }}
                                </div>
                                <div class="gender">
                                    性別 ： {{ str_limit($profile->gender, 50) }}
                                </div>
                                <div class="hobby">
                                    趣味 ： {{ str_limit($profile->hobby, 100) }}
                                </div>
                            </div>
                            <div class="introduction col-md-8 my-auto">
                                {{ str_limit($profile->introduction, 500) }}
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
@endsection