@extends('layouts.dashboard')

@section('content')
@if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif
    <div class="db-cent-3">
        <div class="db-cent-table db-com-table">
            <div class="db-title">
                <h3>Edit Profile</h3>
                <p>Update your profile details using this form.</p>
            </div>
            <div class="book-form inn-com-form db-form">

                {!! Form::open(array('url' => 'dashboard/profile/', 'class' => 'col s12', 'files' => true)) !!}
                {{ Form::hidden('_method', 'PUT') }}
                @csrf
                    <div class="row">
                        <div class="input-field col s6">
                            <input name="name" type="text"
                                   class="validate {{ $errors->has('name') ? ' invalid' : '' }}" value="{{ $user->name }}" required autofocus>
                            <label>Name</label>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <!-- <div class="input-field col s6">
                            <input name="nik" type="text"
                                   class="validate {{ $errors->has('nik') ? ' invalid' : '' }}" value="{{ $user->nik }}" required>
                            <label>NIK</label>
                            @if ($errors->has('nik'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('nik') }}</strong>
                                    </span>
                            @endif
                        </div> -->
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <select name="gender">
                                <option value="" disabled selected>Select Gender</option>
                                <option value="male" @if($user->gender == "male") selected="selected"@endif>Male
                                </option>
                                <option value="female" @if($user->gender == "female") selected="selected"@endif>Female
                                </option>
                                <option value="others" @if($user->gender == "others") selected="selected"@endif>Others
                                </option>
                            </select>
                            @if ($errors->has('gender'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="input-field col s6">
                            <input name="phone" type="text"
                                   class="validate {{ $errors->has('phone') ? ' invalid' : '' }}" value="{{ $user->phone }}">
                            <label>Phone</label>
                            @if ($errors->has('phone'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input name="email" type="email"
                                   class="validate {{ $errors->has('email') ? ' invalid' : '' }}" value="{{ $user->email }}" required>
                            <label>Email Address</label>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="submit" value="submit" class="form-btn"> </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
