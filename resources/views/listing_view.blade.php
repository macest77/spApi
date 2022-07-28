@extends('layouts.app')

@section('title', '- Lista Hard\'n\'heavy')

@section('sidebar')
    @parent

    
@endsection

@section('content')
<section id="mails_list" class="w-100">
    <script>
        function redirAdd(href)
        {
            window.location.href = "/"+href;
        }
        function deleteRecord(id)
        {
            if (confirm('Czy chcesz usunąć rekord?')) {
                window.location.href = "/delete/"+id;
            }
        }
    </script>
    <div class="w-50 m-auto">
        <p>Lista wiadomości:</p>
        <table>
            <tr>
                <th>Do kogo</th>
                <th>Tytuł maila</th>
                <th><button class="btn btn-primary" onclick="redirAdd('send')">Dodaj</button></th>
            </tr>
            @foreach($mailings as $m)
            <tr>
                <td>{{ $m['recipient_email'] }}</td>
                <td>{{ $m['title'] }}</td>
                <td>
                    @php( $m_id = $m['id'] )
                    <button class="btn btn-secondary" onclick='redirAdd("show/{{ $m_id }}")'>show</button>
                    <button class="btn btn-danger" onclick='deleteRecord("{{ $m_id }}")'>delete</button>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</section>
@endsection
