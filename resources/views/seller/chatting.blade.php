@extends('buyer/template')

@section('title','Kotak Pesan')
@section('content')
<?php
    $conversations = Chat::conversations()->setUser(Auth::user())->get();
    $count = 0;
    use App\User;
?>
<div class="container">
    <div class="messaging">
        <div class="inbox_msg">
            <div class="inbox_people">
                <div class="headind_srch">
                    <div class="recent_heading">
                        <h4>Recent</h4>
                    </div>
                    <div class="srch_bar">
                        <div class="stylish-input-group">
                            <input type="text" class="search-bar"  placeholder="Search" >
                            <span class="input-group-addon">
                                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="inbox_chat">
                    @forelse($conversations as $c)
                        <?php
                            $user = $c->users[1];
                            $count++;
                        ?>
                        <div class="chat_list">
                            <div class="chat_people">
                                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                <div class="chat_ib">
                                    <h5>{{($c->data)['title']}} | {{$user->nama}} <span class="chat_date">Dec 25</span></h5>
                                    <p>
                                        
                                    </p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h4 class="text-center"> Tidak ada chat </h4>
                    @endforelse
                </div>
            </div>
            <div class="mesgs">
                @if($count > 0)
                <div class="msg_history">
                    <div class="incoming_msg">
                        <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                        <div class="received_msg">
                            <div class="received_withd_msg">
                                <p>Test which is a new approach to have all solutions</p>
                                <span class="time_date"> 11:01 AM    |    June 9</span>
                            </div>
                        </div>
                    </div>
                    <div class="outgoing_msg">
                        <div class="sent_msg">
                            <p>Test which is a new approach to have all solutions</p>
                            <span class="time_date"> 11:01 AM    |    June 9</span>
                        </div>
                    </div>
                </div>
                <div class="type_msg">
                    <div class="input_msg_write">
                        <input type="text" class="write_msg" placeholder="Type a message" />
                        <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                    </div>
                </div>
                @else
                        <h3 class="text-center"> Tidak ada chat </h3>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection