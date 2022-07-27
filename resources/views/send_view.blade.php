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
<section id="mail_form" class="w-100">

<form id="contact-form" method="post" action="" role="form" class="w-50 m-auto">
    <p>Wyślij wiadomość e-mail</p>
    @csrf
    <div class="messages alert alert-danger" id="errors">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            {{ $error }}<br />
        @endforeach
    @else
        @if($messages)
        <script>
            var element = document.getElementById("errors");
            element.classList.remove("alert-danger");
            element.classList.add("alert-success");
        </script>
            @foreach ($messages as $message)
        {{ $message }}<br />
            @endforeach
        @else
        <script>
            document.getElementById("errors").style.display = "none";
        </script>
        @endif
    @endif
    </div>

    <div class="controls">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_email">Do kogo</label>
                    <input id="form_email" type="email" name="form_email" class="form-control" placeholder="email" required="required" data-error="Valid email is required." pattern="\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}\b">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_title">Tytuł</label>
                    <input id="form_title" type="title" name="form_title" class="form-control" placeholder="Tytuł maila" required="required" data-error="E-mail title is required.">
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
