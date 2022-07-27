@extends('layouts.app')

@section('title', '- Lista Hard\'n\'heavy')

@section('sidebar')
    @parent

    
@endsection

@section('content')

<style>
    .form-control{border-width: 3px; border-color: #6cb2eb; border-radius: 5px;}
    textarea {border-radius: 20px!important;}
</style>
<section id="mail_form">
<p>Wyślij wiadomość e-mail</p>
<form id="contact-form" method="post" action="" role="form">

    <div class="messages"></div>

    <div class="controls">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_email">Do kogo</label>
                    <input id="form_email" type="email" name="email" class="form-control" placeholder="email" required="required" data-error="Valid email is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_title">Tytuł</label>
                    <input id="form_title" type="title" name="title" class="form-control" placeholder="Tytuł maila" required="required" data-error="E-mail title is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_message">Treść maila</label>
                    <textarea id="form_message" name="message" class="form-control" placeholder="Treść maila" rows="4" required="required" data-error="Please, leave us a message."></textarea>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 float-end">
                <input type="submit" class="btn btn-primary btn-send float-right" value="Wyślij">
            </div>
        </div>
    </div>

</form>
</section>
@endsection
