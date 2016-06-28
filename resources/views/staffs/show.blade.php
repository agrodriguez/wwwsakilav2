@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5 col-md-offset-0">
                <h2>Customer <p class="lead">customer information</p></h2>
                <form class="form-horizontal col-sm-offset-0">
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="CompanyName">Company Name</label>
                            <input type="text" class="form-control" id="CompanyName" placeholder="Company Name" value="{{ $order->customer->CompanyName }}" readonly="readonlly">
                        </div>
                        <div class="col-sm-4">
                            <label for="ContactName">Contact Name</label>
                            <input type="text" class="form-control" id="ContactName" placeholder="Contact Name" value="{{ $order->customer->ContactName }}" readonly="readonly">    
                        </div>
                        <div class="col-sm-4">
                            <label for="ContactTitle">Contact Title</label>
                            <input type="text" class="form-control" id="ContactTitle" placeholder="Contact Title" value="{{ $order->customer->ContactTitle }}" readonly="readonly">    
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="Address">Address</label>
                            <input type="text" class="form-control" id="Address" placeholder="Address" value="{{ $order->customer->Address }}" readonly="readonly">    
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="City">City</label>
                            <input type="text" class="form-control" id="City" placeholder="City" value="{{ $order->customer->City }}" readonly="readonly">    
                        </div>
                        <div class="col-sm-3">
                            <label for="Region">Region</label>
                            <input type="text" class="form-control" id="Region" placeholder="Region" value="{{ $order->customer->Region }}" readonly="readonly">    
                        </div>
                        <div class="col-sm-2">
                            <label for="PostalCode">PostalCode</label>
                            <input type="text" class="form-control" id="PostalCode" placeholder="PostalCode" value="{{ $order->customer->PostalCode }}" readonly="readonly">    
                        </div>
                        <div class="col-sm-3">
                            <label for="Country">Country</label>
                            <input type="text" class="form-control" id="Country" placeholder="Country" value="{{ $order->customer->Country }}" readonly="readonly">    
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="Phone">Phone</label>
                            <input type="text" class="form-control" id="Phone" placeholder="Phone" value="{{ $order->customer->Phone }}" readonly="readonly">    
                        </div>
                        <div class="col-sm-4">
                            <label for="Fax">Fax</label>
                            <input type="text" class="form-control" id="Fax" placeholder="Fax" value="{{ $order->customer->Fax }}" readonly="readonly">    
                        </div>
                    </div>
                    
{{--                <div class="form-group">
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-info pull-right">Submit</button>
                        </div>
                    </div> --}}
                </form>
            
        </div>
        <div class="col-md-7 col-md-offset-0">
            <h2>Order<p class="lead">order information</p></h2>
                <form class="form-horizontal col-sm-offset-0">
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="OrderID">Order ID</label>
                            <input type="text" class="form-control" id="OrderID" placeholder="Company Name" value="{{ $order->OrderID }}" readonly="readonlly">{{-- <div class="help">The name of the company</div> --}}
                        </div>
                        <div class="col-sm-3">
                            <label for="OrderDate">Order Date</label>
                            <input type="text" class="form-control" id="OrderDate" placeholder="Company Name" value="{{ $order->OrderDate->format('d-M-Y') }}" readonly="readonlly">{{-- <div class="help">The name of the company</div> --}}
                        </div>
                        <div class="col-sm-3">
                            <label for="RequiredDate">Required Date</label>
                            <input type="text" class="form-control" id="RequiredDate" placeholder="Contact Name" value="{{ $order->RequiredDate->format('d-M-Y') }}" readonly="readonly">    
                        </div>
                        <div class="col-sm-3">
                            <label for="ShippedDate">Shipped Date</label>
                            <input type="text" class="form-control" id="ShippedDate" placeholder="Contact Title" value="{{ $order->ShippedDate->format('d-M-Y') }}" readonly="readonly">    
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="Freight">Freight</label>
                            <input type="text" class="form-control" id="Freight" placeholder="Freight" value="$ {{ number_format($order->Freight, 2) }}" readonly="readonly">    
                        </div>
                        <div class="col-sm-4">
                            <label for="ShipName">Ship Name</label>
                            <input type="text" class="form-control" id="ShipName" placeholder="ShipName" value="{{ $order->ShipName }}" readonly="readonly">    
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="Address">Address</label>
                            <input type="text" class="form-control" id="Address" placeholder="Address" value="{{ $order->ShipAddress }}" readonly="readonly">    
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="City">City</label>
                            <input type="text" class="form-control" id="City" placeholder="City" value="{{ $order->ShipCity }}" readonly="readonly">    
                        </div>
                        <div class="col-sm-3">
                            <label for="Region">Region</label>
                            <input type="text" class="form-control" id="Region" placeholder="Region" value="{{ $order->ShipRegion }}" readonly="readonly">    
                        </div>
                        <div class="col-sm-2">
                            <label for="PostalCode">Postal Code</label>
                            <input type="text" class="form-control" id="PostalCode" placeholder="PostalCode" value="{{ $order->ShipPostalCode }}" readonly="readonly">    
                        </div>
                        <div class="col-sm-3">
                            <label for="Country">Country</label>
                            <input type="text" class="form-control" id="Country" placeholder="Country" value="{{ $order->ShipCountry }}" readonly="readonly">    
                        </div>
                    </div>
                    
                    
{{--                <div class="form-group">
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-info pull-right">Submit</button>
                        </div>
                    </div> --}}
                </form>
            
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            {{-- <div class="panel panel-default">
                <table class="table table-hover">
                    <caption>Customer</caption>                    
                    <thead>
                        <tr>
                            <th class="text-center">Company Name</th>
                            <th class="text-center">Contact Name</th>
                            <th class="text-center">Contact Title</th>
                            <th class="text-center">Address</th>
                            <th class="text-center">City</th>
                            <th class="text-center">Region</th>
                            <th class="text-center">Postal Code</th>
                            <th class="text-center">Country</th>
                            <th class="text-center">Phone</th>
                            <th class="text-center">Fax</th>
                        </tr>
                    </thead>
                    <tfoot></tfoot>
                    <tbody> 
                            <tr>                                    
                                <td>{{ $order->customer->CompanyName }}</td>
                                <td>{{ $order->customer->ContactName }}</td>
                                <td>{{ $order->customer->ContactTitle }}</td>
                                <td>{{ $order->customer->Address }}</td>
                                <td>{{ $order->customer->City }}</td>
                                <td>{{ $order->customer->Region }}</td>
                                <td>{{ $order->customer->PostalCode }}</td>
                                <td>{{ $order->customer->Country }}</td>
                                <td>{{ $order->customer->Phone }}</td>
                                <td>{{ $order->customer->Fax }}</td>
                            </tr>   
                    </tbody>
                </table>
            </div>
            <div class="panel panel-default">
                <table class="table table-hover">
                    <caption>Order</caption>                    
                    <thead>
                        <tr>
                            <th class="text-center">Order ID</th>
                            <th class="text-center">Order Date</th>
                            <th class="text-center">Required Date</th>
                            <th class="text-center">Shipped Date</th>
                            <th class="text-center">Ship Via</th>
                            <th class="text-center">Freight</th>
                            <th class="text-center">Ship Name</th>
                            <th class="text-center">Address</th>
                            <th class="text-center">City</th>
                            <th class="text-center">Region</th>
                            <th class="text-center">Postal Code</th>
                            <th class="text-center">Country</th>
                        </tr>
                    </thead>
                    <tfoot></tfoot>
                    <tbody> 
                            <tr>                                    
                                <td>{{ $order->OrderID }}</td>
                                <td>{{ $order->OrderDate->format('d-M-Y') }}</td>
                                <td>{{ $order->RequiredDate->format('d-M-Y') }}</td>
                                <td>
                                    @if (isset($order->ShippedDate))
                                    {{ $order->ShippedDate->format('d-M-Y') }}
                                    @endif
                                </td>
                                <td>{{ $order->ShipVia }}</td>
                                <td class="text-right">$ {{ number_format($order->Freight, 2) }}</td>
                                <td>{{ $order->ShipName }}</td>
                                <td>{{ $order->ShipAddress }}</td>
                                <td>{{ $order->ShipCity }}</td>
                                <td>{{ $order->ShipRegion }}</td>
                                <td>{{ $order->ShipPostalCode }}</td>
                                <td>{{ $order->ShipCountry }}</td>
                            </tr>   
                    </tbody>
                </table>
            </div> --}}
            <div class="panel panel-default">
                <table class="table table-hover table-bordered">
                    <caption>Details</caption>                    
                    <thead class="active">
                        <tr>
                            <th class="text-center">N°</th>
                            <th class="text-center">Product</th>
                            <th class="text-center">Unit Price</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Discount</th>
                            <th class="text-center">Total</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr class="active">
                            <td colspan="5"><b>Total</b></td>                            
                            <td class="text-right"><b>$ {{ number_format($order->Total,2) }}</b></td>
                        </tr>
                    </tfoot>
                    <tbody> 
                        {{--*/ $i = 0 /*--}}
                        @foreach ($order->details as $detail)
                            {{--*/ $i++ /*--}}
                            <tr>
                                <td class="text-right">{{ $i }}</td>                                  
                                <td>{{ $detail->product->ProductName }}</td>
                                <td class="text-right">$ {{ number_format($detail->UnitPrice, 2) }}</td>
                                <td class="text-right">{{ $detail->Quantity }}</td>
                                <td class="text-right">{{ number_format($detail->Discount*100, 1) }} %</td>
                                <td class="text-right">$ {{ number_format($detail->Total, 2) }}</td>                                
                            </tr>   
                        @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop