<div class="col-md-12 col-lg-12 col-xl-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title" style="margin-right: 22px; display: inline-block">تقارير المرضي</h4>
            <a class="heading-elements-toggle" style="float: left;cursor: pointer" id="reload_table">
                <i class='fa fa-refresh font-medium-3'></i>
            </a>
        </div>
        <div class="card-content collapse show">
            <div class="card-body">
                <div class="dt-ext table-responsive">

                    {!! $dataTable->table() !!}
                </div>
            </div>
        </div>
    </div>
</div>
