@extends('admin_layout.master')

@section('title')
   Gestion de la FAQ
@endsection

@section('content')
    <!-- start content -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="content-header-left">
                <h1>View FAQs</h1>
            </div>
            <div class="content-header-right">
                <a href="faq-add.php" class="btn btn-primary btn-sm">Add FAQ</a>
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
                                <th width="30">#</th>
                                <th width="100">Title</th>
                                <th width="80">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <td>1</td>
                                <td>How to find an item?</td>
                                <td>										
                                    <a href="faq-edit.php?id=1" class="btn btn-primary btn-xs">Edit</a>
                                    <a href="#" class="btn btn-danger btn-xs" data-href="faq-delete.php?id=1" data-toggle="modal" data-target="#confirm-delete">Delete</a>  
                                </td>
                                </tr>
                                <tr>
                                <td>2</td>
                                <td>What is your return policy?</td>
                                <td>										
                                    <a href="faq-edit.php?id=2" class="btn btn-primary btn-xs">Edit</a>
                                    <a href="#" class="btn btn-danger btn-xs" data-href="faq-delete.php?id=2" data-toggle="modal" data-target="#confirm-delete">Delete</a>  
                                </td>
                                </tr>
                                <tr>
                                <td>3</td>
                                <td> I received a defective/damaged item, can I get a refund?</td>
                                <td>										
                                    <a href="faq-edit.php?id=3" class="btn btn-primary btn-xs">Edit</a>
                                    <a href="#" class="btn btn-danger btn-xs" data-href="faq-delete.php?id=3" data-toggle="modal" data-target="#confirm-delete">Delete</a>  
                                </td>
                                </tr>
                                <tr>
                                <td>4</td>
                                <td>When are ‘Returns’ not possible?</td>
                                <td>										
                                    <a href="faq-edit.php?id=4" class="btn btn-primary btn-xs">Edit</a>
                                    <a href="#" class="btn btn-danger btn-xs" data-href="faq-delete.php?id=4" data-toggle="modal" data-target="#confirm-delete">Delete</a>  
                                </td>
                                </tr>
                                <tr>
                                <td>5</td>
                                <td>What are the items that cannot be returned?</td>
                                <td>										
                                    <a href="faq-edit.php?id=5" class="btn btn-primary btn-xs">Edit</a>
                                    <a href="#" class="btn btn-danger btn-xs" data-href="faq-delete.php?id=5" data-toggle="modal" data-target="#confirm-delete">Delete</a>  
                                </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    </div>
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
                    <p>Are you sure want to delete this item?</p>
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