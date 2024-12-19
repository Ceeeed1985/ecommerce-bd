@extends('admin_layout.master')

@section('title')
   Frais de livraison
@endsection

@section('content')
    <!-- start content -->
    <div class="content-wrapper">
    <section class="content-header">
        <div class="content-header-left">
            <h1>Ajouter des frais de livraison</h1>
        </div>
    </section>


    @if (Session::has("status"))
        <section class="content" style="min-height:auto;margin-bottom: -30px;">
            <div class="row">
                <div class="col-md-12">
                    <div class="callout callout-success">
                    <p>{{Session::get("status")}}</p>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal" action="{{route('admin.createShippingCost')}}" method="post">
                    @csrf
                <div class="box box-info">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Choisissez un pays <span>*</span></label>
                            <a href="{{route('admin.addCountryPage')}}">Ajouter un pays</a>
                            <div class="col-sm-4">
                            <select name="country_id" class="form-control select2">
                                <option value="">Sélectionnez un pays</option>
                                @foreach ($countries as $country)
                                    <option value="{{$country->country_name}}">{{$country->country_name}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Frais en euros <span>*</span></label>
                            <div class="col-sm-4">
                            <input type="number" step="0.01" class="form-control" name="amount" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label"></label>
                            <div class="col-sm-6">
                            <button type="submit" class="btn btn-success pull-left" name="form1">Enregistrer</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </section>
    <section class="content-header">
        <div class="content-header-left">
            <h1>Tous les frais de livraison</h1>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                <div class="box-body table-responsive">
                    <table id="example1" class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                            <th>#</th>
                            <th>Pays</th>
                            <th>Frais en euros</th>
                            <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($shippingCosts as $shippingCost)
                                <tr>
                                    <td>{{$shippingCost->id}}</td>
                                    <td>{{$shippingCost->country_id}}</td>
                                    <td>{{$shippingCost->amount}}</td>
                                    <td style="display:flex">
                                        <a href="{{route('admin.editShippingCostPage', [$shippingCost->id])}}" class="btn btn-primary btn-xs">Modifier</a>
                                        <form action="{{route('admin.deleteShippingCost', [$shippingCost->id])}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-xs" type="submit" style="margin-left:5px">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
                <h4 style="background: #dd4b39;color:#fff;padding:10px 20px;">Pour tous les autres pays ne se trouvant pas dans la liste, ils font partie du "Reste du monde"!</h4>
    </section>
    <section class="content-header">
        <div class="content-header-left">
            <h1>Frais de livraison - Reste du monde</h1>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal" action="{{$shippingCostRest ? route('admin.editShippingCostRest', [$shippingCostRest->id]) : route('admin.createShippingCostRest')}}" method="post">
                    @csrf
                    @if ($shippingCostRest)
                        @method('PUT')     
                    @endif
                    <div class="box box-info">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Frais en euros <span>*</span></label>
                                <div class="col-sm-4">
                                    <input type="number" step="0.01"  class="form-control" name="amount" value="{{$shippingCostRest ? $shippingCostRest->amount : ""}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label"></label>
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-success pull-left" name="form2">{{$shippingCostRest ? "Mettre à jour" : "Enregistrer"}}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
                </div>
                <div class="modal-body">
                    Are you sure want to delete this item?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger btn-ok">Delete</a>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- end content -->
@endsection