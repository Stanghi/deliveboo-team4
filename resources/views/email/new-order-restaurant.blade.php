
<h2>Hai ricevuto un nuovo ordine</h2>
<p>L'ordine deve essere consegnato presso {{$order->address}}</p>
@if ($order->note)
    <p>Note dal cliente: {{$order->note}}</p>
@endif



