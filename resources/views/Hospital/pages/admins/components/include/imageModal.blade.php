<div class="modal fade text-left" id="model_item_image" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel160" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <img src="{{ isset($edit) ?
                        $data->photo == 'default.png'
                         ? asset('Hospital/images/'.$data->user_type.'s/'.$data->photo)
                         : asset('Hospital/images/'.$data->photo)
                    : '#' }}" id="image_modal" height="100%" width="100%">
            </div>
        </div>
    </div>
</div>
