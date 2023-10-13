<div class="col-md-12 col-lg-12 col-xl-12">
    <div class="loader" style="display: none">
    </div>
</div>

<div class="col-md-12 col-lg-12 col-xl-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title" style="display: inline-block;">الرسائل</h4>
        </div>
        <div class="card-content collapse show">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="container">
                            <div class="row clearfix">
                                <div class="col-lg-12">
                                    <div class="card chat-app">
                                        <div class="chat">
                                            <div class="chat-header clearfix" style="margin-left: 166px;">
                                                <div class="row">
                                                    <div class="col-lg-6 chat-desc" data-receiver_id="">
                                                        <div class="chat-about" style="margin-right: 10px;">
                                                            <h6 class="m-b-0">Aiden Chavez</h6>
                                                            <small>Last seen: 2 hours ago</small>
                                                        </div>
                                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                                            <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chat-history" style="height: 300px;overflow-y: scroll;">
                                                <ul class="m-b-0 chat-content">
                                                    <li class="clearfix">
                                                        <div class="message-data text-right">
                                                            <span class="message-data-time">10:10 AM, Today</span>
                                                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
                                                        </div>
                                                        <div class="message other-message float-right"> Hi Aiden, how are you? How is the project coming along? </div>
                                                    </li>
                                                    <li class="clearfix">
                                                        <div class="message-data">
                                                            <span class="message-data-time">10:12 AM, Today</span>
                                                        </div>
                                                        <div class="message my-message">Are we meeting today?</div>
                                                    </li>
                                                    <li class="clearfix">
                                                        <div class="message-data">
                                                            <span class="message-data-time">10:15 AM, Today</span>
                                                        </div>
                                                        <div class="message my-message">Project has been already finished and I have results to show you.</div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <form id="chat-message">
                                                <div class="chat-message clearfix">
                                                    <div class="input-group mb-0">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" style="height: 100%;cursor: pointer">
                                                               <button type="submit" class="btn btn-primary" id="btn-send"> <i class="fa fa-paper-plane" ></i> </button>
                                                            </span>
                                                        </div>
                                                        <textarea type="text" name="message" id="message" class="form-control" placeholder="الرسالة المراد ارسالها..."></textarea>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>

                                        <div id="plist" class="people-list">
                                            <ul class="list-unstyled chat-list mt-2 mb-0" style="float:right;">
                                                @php
                                                    $user_type = ['admin'=>'مسوؤل','doctor'=>'دكتور','accountant'=>'محاسب','laborer'=>'عامل',
                                                                    'nurse'=>'ممرضة','receptionist'=>'موظف استقبال'];
                                                @endphp
                                                @foreach($users as $k=>$user)
                                                    {{ $user_type[$k] }}
                                                    @foreach($user as $item)
                                                        <li class="clearfix chat-person" data-receiver_id="{{ $item->id }}" data-route="{{ route('hospital.message.search') }}" style="margin-left: 11px;">
                                                            <div class="about">
                                                                <div class="name">{{ $item->name }}</div>
                                                                <div class="status"> <i class="fa fa-circle offline"></i> left 7 mins ago </div>
                                                            </div>
                                                            <img src="{{ asset('Hospital/Images/'.$item->photo) }}" alt="avatar" style="height: 45px;float:right !important;">
                                                        </li>
                                                    @endforeach
                                                    <hr>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
