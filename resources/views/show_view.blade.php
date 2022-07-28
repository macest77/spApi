@extends('layouts.app')

@section('title', '- Lista Hard\'n\'heavy')

@section('sidebar')
    @parent

    
@endsection

@section('content')

<style>
    .form-control{border-radius: 5px;}
    textarea {border-radius: 20px!important;}
</style>
<section id="mail_form" class="w-100">

<div id="contact-form" method="post" action="" role="form" class="w-50 m-auto">

    <div class="controls">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_email">Do kogo</label>
                    <input id="form_email" type="email" name="form_email" class="form-control" value="{{ $email['recipient_email'] }}" disabled>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_title">Tytuł</label>
                    <input id="form_title" type="title" name="form_title" class="form-control" value="{{ $email['title'] }}" disabled>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_message">Treść maila</label>
                    <textarea id="form_message" name="message" class="form-control" disabled>{{ $email['content'] }}</textarea>
                </div>
            </div>
        </div>
    </div>

</div>
</section>
@endsection
