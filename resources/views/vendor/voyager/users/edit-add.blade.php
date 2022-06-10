@extends('voyager::master')

@section('page_title', __('voyager::generic.' . (isset($dataTypeContent->id) ? 'edit' : 'add')) . ' ' .
    $dataType->getTranslatedAttribute('display_name_singular'))

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ __('voyager::generic.' . (isset($dataTypeContent->id) ? 'edit' : 'add')) . ' ' . $dataType->getTranslatedAttribute('display_name_singular') }}
    </h1>
@stop

@section('content')
    <div class="page-content container-fluid">
        <form class="form-edit-add" role="form"
            action="@if (!is_null($dataTypeContent->getKey())) {{ route('voyager.' . $dataType->slug . '.update', $dataTypeContent->getKey()) }}@else{{ route('voyager.' . $dataType->slug . '.store') }} @endif"
            method="POST" enctype="multipart/form-data" autocomplete="off">
            <!-- PUT Method if we are editing -->
            @if (isset($dataTypeContent->id))
                {{ method_field('PUT') }}
            @endif
            {{ csrf_field() }}

            <div class="row">
                <div class="col-md-8">
                    <div class="panel panel-bordered">
                        {{-- <div class="panel"> --}}
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="panel-body">
                            <div class="form-group">
                                <label for="Role_id">{{ __('Role_id') }}</label>
                                <input type="text" class="form-control" id="role_id" name="role_id"
                                    placeholder="{{ __('role_id') }}"
                                    value="{{ old('role_id', $dataTypeContent->role_id ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="user_type_id">{{ __('User_type_id') }}</label>
                                <input type="text" class="form-control" id="user_type_id" name="user_type_id"
                                    placeholder="{{ __('user_type_id') }}"
                                    value="{{ old('user_type_id', $dataTypeContent->user_type_id ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="first_name">{{ __('First_name') }}</label>
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                    placeholder="{{ __('first_name') }}"
                                    value="{{ old('first_name', $dataTypeContent->first_name ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="middle_name">{{ __('Middle_name') }}</label>
                                <input type="text" class="form-control" id="middle_name" name="middle_name"
                                    placeholder="{{ __('middle_name') }}"
                                    value="{{ old('middle_name', $dataTypeContent->middle_name ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="last_name">{{ __('Last_name') }}</label>
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                    placeholder="{{ __('last_name') }}"
                                    value="{{ old('last_name', $dataTypeContent->last_name ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="username">{{ __('Username') }}</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="{{ __('username') }}"
                                    value="{{ old('username', $dataTypeContent->username ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="email">{{ __('voyager::generic.email') }}</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="{{ __('voyager::generic.email') }}"
                                    value="{{ old('email', $dataTypeContent->email ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="address">{{ __('Address') }}</label>
                                <input type="address" class="form-control" id="address" name="address"
                                    placeholder="{{ __('address') }}"
                                    value="{{ old('address', $dataTypeContent->address ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="contact_number">{{ __('Contact Number') }}</label>
                                <input type="contact_number" class="form-control" id="contact_number"
                                    name="contact_number" placeholder="{{ __('contact_number') }}"
                                    value="{{ old('contact_number', $dataTypeContent->contact_number ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="alternate_contact_number">{{ __('Alternate Contact Number') }}</label>
                                <input type="alternate_contact_number" class="form-control" id="alternate_contact_number"
                                    name="alternate_contact_number" placeholder="{{ __('alternate contact') }}"
                                    value="{{ old('alternate_contact_number', $dataTypeContent->alternate_contact_number ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="registration_number">{{ __('Registration Number') }}</label>
                                <input type="registration_number" class="form-control" id="registration_number"
                                    name="registration_number" placeholder="{{ __('registration number') }}"
                                    value="{{ old('registration_number', $dataTypeContent->registration_number ?? '') }}">
                            </div>
                            <div class="form-group">
                                <label for="password">{{ __('voyager::generic.password') }}</label>
                                @if (isset($dataTypeContent->password))
                                    <br>
                                    <small>{{ __('voyager::profile.password_hint') }}</small>
                                @endif
                                <input type="password" class="form-control" id="password" name="password" value=""
                                    autocomplete="new-password">
                            </div>

                            @can('editRoles', $dataTypeContent)
                                <div class="form-group">
                                    <label for="default_role">{{ __('voyager::profile.role_default') }}</label>
                                    @php
                                        $dataTypeRows = $dataType->{isset($dataTypeContent->id) ? 'editRows' : 'addRows'};
                                        
                                        $row = $dataTypeRows->where('field', 'user_belongsto_role_relationship')->first();
                                        $options = $row->details;
                                    @endphp
                                    @include('voyager::formfields.relationship')
                                </div>
                                <div class="form-group">
                                    <label for="additional_roles">{{ __('voyager::profile.roles_additional') }}</label>
                                    @php
                                        $row = $dataTypeRows->where('field', 'user_belongstomany_role_relationship')->first();
                                        $options = $row->details;
                                    @endphp
                                    @include('voyager::formfields.relationship')
                                </div>
                            @endcan
                            @php
                                if (isset($dataTypeContent->locale)) {
                                    $selected_locale = $dataTypeContent->locale;
                                } else {
                                    $selected_locale = config('app.locale', 'en');
                                }
                                
                            @endphp
                            <div class="form-group">
                                <label for="locale">{{ __('voyager::generic.locale') }}</label>
                                <select class="form-control select2" id="locale" name="locale">
                                    @foreach (Voyager::getLocales() as $locale)
                                        <option value="{{ $locale }}"
                                            {{ $locale == $selected_locale ? 'selected' : '' }}>{{ $locale }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="panel panel panel-bordered panel-warning">
                        <div class="panel-body">
                            <div class="form-group">
                                @if (isset($dataTypeContent->avatar))
                                    <img src="{{ filter_var($dataTypeContent->avatar, FILTER_VALIDATE_URL) ? $dataTypeContent->avatar : Voyager::image($dataTypeContent->avatar) }}"
                                        style="width:200px; height:auto; clear:both; display:block; padding:2px; border:1px solid #ddd; margin-bottom:10px;" />
                                @endif
                                <input type="file" data-name="avatar" name="avatar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary pull-right save">
                {{ __('voyager::generic.save') }}
            </button>
        </form>
        <div style="display:none">
            <input type="hidden" id="upload_url" value="{{ route('voyager.upload') }}">
            <input type="hidden" id="upload_type_slug" value="{{ $dataType->slug }}">
        </div>
    </div>
@stop

@section('javascript')
    <script>
        $('document').ready(function() {
            $('.toggleswitch').bootstrapToggle();
        });
    </script>
@stop
