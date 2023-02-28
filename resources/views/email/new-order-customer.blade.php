
<p style="text-trasform: capitalize;">Ciao {{$order->name}},</p>
<p>Grazie per aver ordinato su Deliveboo! Presto riceverai il tuo ordine da <span style="text-trasform: capitalize;">{{$order->restaurant->name}}</span></p>

<h4 style="margin-top: 30px;">Riepilogo ordine:</h4>
<ul>
    @foreach ($order->products as $product)
        <li>{{$product->quantity}}{{$product->name}}</li>
    @endforeach
</ul>
<h5>Totale: &euro;{{number_format($order->amount, 2, ',', ' ')}}</h5>

<h5 style="margin-top: 30px;">Indirizzo di consegna inserito</h5>
<p>{{$order->address}}</p>

@if ($order->note)
    <h5 style="margin-top: 20px;">Note lasciate per il ristorante</h5>
    <p>{{$order->note}}</p>
@endif


<h5 style="margin-top: 20px;">Per qualsiasi necessità puoi contattare il ristorante:</h5>
<p>{{$order->restaurant->telephone}}</p>

<div class="logo" style="text-align: center; margin-top: 30px;">
    <img style="width: 100px;" src="{{ Vite::asset('resources/img/logo.png') }}" alt="Logo">
</div>

