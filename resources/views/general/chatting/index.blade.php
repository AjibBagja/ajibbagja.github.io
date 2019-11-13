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
                            $user = $c->users[0];
                            $count++;
                        ?>
                        <div class="chat_list">
                            <a href="{{url('chat/'.$c->id)}}">
                                <div class="chat_people">
                                    <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                    <div class="chat_ib">
                                        <h5>{{($c->data)['title']}} <span class="chat_date">{{Carbon::parse($c->updated_at)->diffForHumans()}}</span></h5>
                                        <p>
                                            
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <h4 class="text-center"> Tidak ada chat </h4>
                    @endforelse
                </div>
            </div>
            <div class="mesgs">
                @if($count > 0)
                    <h3 class="text-center"> Harap pilih percakapan terlebih dahulu </h3>
                @else
                    <h3 class="text-center"> Tidak ada percakapan </h3>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection