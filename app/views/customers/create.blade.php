@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('includes.alert')
            <section class="panel">
                <header class="panel-heading">
                    {{ $title }}
                    <span class="pull-right">

                            <a class="btn btn-success btn-sm" href="{{ URL::route('customer.index') }}"><span class="fa fa-chevron-left"></span> Customers</a>

					</span>
                </header>
                <br>
                <div class="panel-body">
                    {{ Form::open(array('route' => 'customer.create', 'class' => 'form-horizontal')) }}



                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('name', 'Customer Name*', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-8">
                                {{ Form::text('name', '', array('class' => 'form-control')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('email', 'Customer Email*', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-8">
                                {{ Form::email('email', '', array('class' => 'form-control')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('title', 'Title', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-8">
                                {{ Form::text('title', '', array('class' => 'form-control')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('address_line_1', 'Address-1*', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-8">
                                {{ Form::text('address_line_1', '', array('class' => 'form-control')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('city', 'City*', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-8">
                                {{ Form::text('city', '', array('class' => 'form-control')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('zip', 'Zip*', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-8">
                                {{ Form::text('zip', '', array('class' => 'form-control')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('telephone', 'Telephone*', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-8">
                                {{ Form::text('telephone', '', array('class' => 'form-control')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('website', 'Website', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-8">
                                {{ Form::text('website', '', array('class' => 'form-control')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('fee_percentage', 'Fee Percentage*', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-8">
                                {{ Form::text('fee_percentage', 50, array('class' => 'form-control')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('sales_id', 'Sales ID', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-8">
                                {{ Form::text('sales_id', '', array('class' => 'form-control')) }}
                            </div>
                        </div>
                    </div>








                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('company_name', 'Company Name', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-8">
                                {{ Form::text('company_name', '', array('class' => 'form-control')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('password', 'Customer Password*', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-8">
                                {{ Form::password('password', array('class' => 'form-control')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('attn_name', 'Attn Name', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-8">
                                {{ Form::text('attn_name', '', array('class' => 'form-control')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('address_line_2', 'Address-2', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-8">
                                {{ Form::text('address_line_2', '', array('class' => 'form-control')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('state', 'State*', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-8">
                                {{ Form::text('state', '', array('class' => 'form-control')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('country', 'Country*', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-8">
                                {{ Form::text('country', '', array('class' => 'form-control')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('fax', 'Fax', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-8">
                                {{ Form::text('fax', '', array('class' => 'form-control')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('affiliate_id', 'Affiliate ID', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-8">
                                {{ Form::text('affiliate_id', '', array('class' => 'form-control')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('fee_flat', 'Fee Flat', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-8">
                                {{ Form::text('fee_flat', '', array('class' => 'form-control')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('sales_percentage', 'Sales Percentage', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-8">
                                {{ Form::text('sales_percentage', '', array('class' => 'form-control')) }}
                            </div>
                        </div>
                    </div>



                    <div class="form-group">
                        <div class="col-lg-offset-5 col-lg-6">
                            <br><br>
                            {{ Form::submit('Create Customer', array('class' => 'btn btn-primary')) }}
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </section>
        </div>
    </div>
@stop