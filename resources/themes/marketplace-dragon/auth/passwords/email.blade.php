@extends('layouts.public')

@section('content')
    @include('partials.page_header',['title'=>trans('corals-marketplace-dragon::labels.auth.reset_password')])
    <div class="section-wrap">
        <div class="section demo" style="display: flex">
            <div class="form-popup">
                <div class="form-popup-content">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h4 class="popup-title">@lang('corals-marketplace-dragon::labels.auth.reset_password')</h4>
                    <hr class="line-separator">
                    <form method="post" action="{{route('password.email')}}" id="login-form">
                        {{csrf_field()}}
                        <div class="form-group">
                            @if(session('confirmation_user_id'))
                                <a href="{{ route('auth.resend_confirmation') }}">@lang('User::labels.confirmation.resend_email')</a>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="username" class="rl-label">@lang('User::attributes.user.email')</label>
                            <input type="text" id="email" name="email"
                                   placeholder="@lang('User::attributes.user.email')" value="{{ old('email') }}"
                                   autofocus>
                            @if ($errors->has('email'))
                                <div class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </div>
                            @endif
                        </div>
                        <button class="button mid dark"
                                type="submit">@lang('corals-marketplace-dragon::labels.auth.send_password_reset')</button>
                    </form>
                    <hr class="line-separator double">
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

@endsection