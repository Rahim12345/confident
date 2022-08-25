@extends('back.layout.master')

@section('title') Statistika @endsection

@section('css')

@endsection

@section('content')
    <div class="content m-3">
        <div class="row row-deck row-cards" bis_skin_checked="1">
            <div class="col-md-6" bis_skin_checked="1">
                <div class="card" bis_skin_checked="1">
                    <div class="card-body" bis_skin_checked="1">
                        <div class="d-flex align-items-center" bis_skin_checked="1">
                            <div class="subheader" bis_skin_checked="1" _msthash="3929003" _msttexthash="121056" style="text-align: left;">Kassa</div>
                        </div>
                        <div class="h1 mb-3" bis_skin_checked="1" _msthash="3387241" _msttexthash="14846" style="text-align: left;">Ümumi - {{ $totalUmumi }} AZN</div>
                        <div class="h1 mb-3" bis_skin_checked="1" _msthash="3387241" _msttexthash="14846" style="text-align: left;">Bu ay - {{ $totalAy }} AZN</div>
                        <div class="h1 mb-3" bis_skin_checked="1" _msthash="3387241" _msttexthash="14846" style="text-align: left;">Bu gün - {{ $totalBugun }} AZN</div>
                    </div>
                </div>

            </div>

            <div class="col-md-6">
                <div class="card" style="height: calc(24rem + 10px)">
                    <div class="card-body card-body-scrollable card-body-scrollable-shadow">
                        <div class="divide-y-4">
                            @foreach($son_musteriler as $son_musteri)
                                <div onclick="window.location.href='{!! route($son_musteri->client_status.'.edit',$son_musteri->client_id) !!}'" style="cursor: pointer">
                                    <div class="row">
                                        <div class="col-auto">
                                            <span class="avatar">{{ substr($son_musteri->client_name,0,2) }}</span>
                                        </div>
                                        <div class="col">
                                            <div class="text-truncate">
                                                <strong>{{ $son_musteri->client_name }}</strong> müştərisi qeydiyyatdan keçdi
                                            </div>
                                            <div class="text-muted"><strong>{{ $son_musteri->updated_at }}</strong></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card" style="height: calc(24rem + 10px)">
                    <div class="card-body card-body-scrollable card-body-scrollable-shadow">
                        <div class="divide-y-4">
                            @foreach($bugunkiMusteriAdgunuleri as $bugunkiMusteriAdgunu)
                            <div onclick="window.location.href='{!! route('hekim.edit',$bugunkiMusteriAdgunu->id) !!}'" style="cursor: pointer">
                                <div class="row">
                                    <div class="col-auto">
                                        <span class="avatar">{{ substr($bugunkiMusteriAdgunu->name,0,2) }}</span>
                                    </div>
                                    <div class="col">
                                        <div class="text-truncate">
                                            <strong>{{ $bugunkiMusteriAdgunu->name }}</strong> müştərisinin doğum günüdür
                                        </div>
                                        <div class="text-muted"><strong>{{ $bugunkiMusteriAdgunu->dogum_gunu }}</strong></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card" style="height: calc(24rem + 10px)">
                    <div class="card-body card-body-scrollable card-body-scrollable-shadow">
                        <div class="divide-y-4">
                            @foreach($bugunkiPersonalAdgunuleri as $bugunkiPersonalAdgunu)
                                <div onclick="window.location.href='{!! route('hekim.edit',$bugunkiPersonalAdgunu->id) !!}'" style="cursor: pointer">
                                    <div class="row">
                                        <div class="col-auto">
                                            <span class="avatar">{{ substr($bugunkiPersonalAdgunu->name,0,2) }}</span>
                                        </div>
                                        <div class="col">
                                            <div class="text-truncate">
                                                <strong>{{ $bugunkiPersonalAdgunu->name }}</strong> personalının doğum günüdür
                                            </div>
                                            <div class="text-muted"><strong>{{ $bugunkiPersonalAdgunu->dogum_gunu }}</strong></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card" style="height: calc(24rem + 10px)">
                    <div class="card-body card-body-scrollable card-body-scrollable-shadow">
                        <div class="divide-y-4">
                            @foreach($isciler as $isci)
                                <div onclick="window.location.href='{!! route('back.personala.verdiyim.pullar',$isci->id) !!}'" style="cursor: pointer">
                                    <div class="row">
                                        <div class="col-auto">
                                            <span class="avatar">{{ substr($isci->name,0,2) }}</span>
                                        </div>
                                        <div class="col">
                                            <div class="text-truncate">
                                                <strong>{{ $isci->name }}</strong> personalına xərclənən pul - {{ $isci->apul ? $isci->apul : 0 }} AZN
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card" style="height: calc(24rem + 10px)">
                    <div class="card-body card-body-scrollable card-body-scrollable-shadow">
                        <div class="divide-y-4">
                            @foreach($iscininQazandirdigiPullar as $iscininQazandirdigiPul)
                                <div onclick="window.location.href='{!! route('hekim.edit',$iscininQazandirdigiPul->user_id) !!}'" style="cursor: pointer">
                                    <div class="row">
                                        <div class="col-auto">
                                            <span class="avatar">{{ substr($iscininQazandirdigiPul->ad,0,2) }}</span>
                                        </div>
                                        <div class="col">
                                            <div class="text-truncate">
                                                <strong>{{ $iscininQazandirdigiPul->ad }}</strong> personalı ümumilikdə - {{ $iscininQazandirdigiPul->CemiSatis ? $iscininQazandirdigiPul->CemiSatis : 0 }} AZN-lik
                                                <br> məhsul satıb
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection

@section('js')

@endsection
