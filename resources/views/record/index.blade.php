@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class='row'>
        <div class="col-md-12 main" id="record">
            <h3 class='page-header'><i class="fa fa-users"></i> Superheroes Database </h3>
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    @include('record.parts.panel.panel')
                    @include('record.parts.editHeroModal.modal')
                    @include('record.parts.listSuperpowersModal.modal')
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="/resources/js/app.record.js"></script>
@endsection
