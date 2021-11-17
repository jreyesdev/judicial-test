@if (session('alert'))
    @php
        switch (session('alert')[0]) {
            case 'success':
                $alert = 'green';
                break;
            case 'warning':
                $alert = 'yellow';
                break;            
            default:
                $alert = 'red';
                break;
        }
    @endphp
    <div class="bg-{{$alert}}-300 rounded p-3 text-{{$alert}}-800">
        {{ session('alert')[1]}}
    </div>
@endif