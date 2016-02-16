@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                    <div class="panel panel-default">
                        <div class="panel-heading">Register</div>
                        <div class="panel-body">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password_confirmation">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">Dades de cobrament</div>
                        <div class="panel-body">
                            <div class="form-group" :class="{'has-error': forms.card.errors.has('number')}">
                                <label for="number" class="col-md-4 control-label">Card Number</label>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="number" data-stripe="number" v-model="forms.card.number">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="number" class="col-md-4 control-label">Security Code</label>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="cvc" data-stripe="cvc" v-model="forms.card.cvc">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Expiration</label>

                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="month" placeholder="MM" maxlength="2" data-stripe="exp-month" v-model="forms.card.month">
                                </div>

                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="year" placeholder="YYYY" maxlength="4" data-stripe="exp-year" v-model="forms.card.year">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="number" class="col-md-4 control-label">ZIP / Postal Code</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="zip" v-model="forms.card.zip">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i>Register
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection