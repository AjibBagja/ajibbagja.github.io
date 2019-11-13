@extends('buyer/template')

@section('title','Kotak Pesan')
@section('content')
<?php
    $conversations = Chat::conversations()->setUser(Auth::user())->get();
    $conversation = Chat::conversations()->setUser(Auth::user())->getById($conv_id);
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
                            $user = $c->users[0];
                        ?>
                        <div class="chat_list {{($c->id == $conv_id)?'active_chat':''}}">
                            <div class="chat_people">
                                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                <div class="chat_ib">
                                    <h5>{{($c->data)['title']}} <span class="chat_date">{{Carbon::parse($c->updated_at)->diffForHumans()}}</span></h5>
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
                <div class="msg_history">
                @forelse($conversation->messages as $m)
                    <?php
                        $date = $m->created_at;
                    ?>
                    @if($m->sender == Auth::user())
                        <div class="outgoing_msg">
                            <div class="sent_msg">
                                <p>{{$m->body}}</p>
                                <span class="time_date">{{Carbon::parse($date)->translatedFormat('h.i a')}}    |    {{Carbon::parse($date)->translatedFormat('d M')}}</span>
                            </div>
                        </div>
                    @else
                        <div class="incoming_msg">
                            <div class="received_msg">
                                <div class="received_withd_msg">
                                    <p>{{$m->body}}</p>
                                <span class="time_date">{{Carbon::parse($date)->translatedFormat('h.i a')}}    |    {{Carbon::parse($date)->translatedFormat('d M')}}</span>
                                </div>
                            </div>
                        </div>
                    @endif
                @empty
                        <h3 class="text-center"> Tidak ada chat. Harap memulai percakapan </h3>
                @endforelse
                </div>
                <div class="type_msg">
                    <form action="{{url('sendchat')}}" method="POST">
                        {{csrf_field()}}
                        <input type="hidden" name="conv_id" value="{{$conv_id}}">
                        <div class="input_msg_write">
                            <input type="text" class="write_msg" name="msg" placeholder="Type a message" />
                            <button class="msg_send_btn" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection