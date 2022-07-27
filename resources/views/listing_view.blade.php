@extends('layouts.app')

@section('title', '- Lista Hard\'n\'heavy')

@section('sidebar')
    @parent

    
@endsection

@section('content')
    <script>
        function redirAdd()
        {
            window.location.href = "/send";
        }
    </script>
    <p>Lista wiadomości:</p>
    <table>
        <tr>
            <th>Do kogo</th>
            <th>Tytuł maila</th>
            <th><button onclick="redirAdd()">Dodaj</button></th>
        </tr>
        @foreach($mailings as $m)
        <tr>
            <td>{{ $m['recipient_email'] }}</td>
            <td>{{ $m['title'] }}</td>
            <td>
                <button>show</button>
                <button>delete</button>
            </td>
        </tr>
        @endforeach
    </table>

@endsection
