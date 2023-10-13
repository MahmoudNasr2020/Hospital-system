<div class="col-md-12 col-lg-12 col-xl-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title" style="margin-right: 22px; display: inline-block"> التقاير الخاصة بالمريض{{ request()->route('name') != '' ? ' ('. str_replace('_',' ',request()->route('name')) .')' :'' }}</h4>
            <a class="heading-elements-toggle" style="float: left;cursor: pointer" id="reload_table">
                <i class='fa fa-refresh font-medium-3'></i>
            </a>
        </div>
        <div class="card-content collapse show">
            <div class="card-body">
               <div class="row">
                   <div class="col-6">
                       <button type="button" class="btn btn-icon btn-outline-primary mr-1 mb-1" id="add_new_item" >
                           <a href="{{ route('hospital.report.create',['id'=>request()->route('id'),'name'=>request()->route('name')]) }}" target="_blank">
                               <i class="fa fa-plus"></i>
                               اضافة
                           </a>
                       </button>
                   </div>
                   <div class="col-6">
                       <button type="button" class="btn btn-icon btn-outline-danger mr-1 mb-1" id="multi_delete"
                               data-route="{{ route('hospital.report.multi_delete') }}" style="float: left;display: none">
                           <i class="fa fa-trash"></i>
                           حذف المحدد
                       </button>
                   </div>
               </div>
                <div class="dt-ext table-responsive">

                    {!! $dataTable->table() !!}
                </div>
            </div>
        </div>
    </div>
</div>
