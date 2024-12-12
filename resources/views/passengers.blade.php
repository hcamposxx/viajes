@include('header')
@include('hero')
<div class="container py-6">
 
<div class="card px-2 my-2 columns is-mobile is-centered">
    <h1 class="my-2 columns is-mobile is-centered">Viaje {{$from}}->{{$to}} Fecha: {{$date}}</h1>
    <hr/>
</div>
<div class="card px-2 my-5">
@php
    $totalTrips= count($trip[0]-> passengers);
@endphp
</div>


    <article class="message column {{($totalTrips==0)?'is-warning':'is-success'}}">
        <div class="message-header">
            <p> {{$totalTrips}} Pasajeros para este viaje</p>
        </div>
        <div class="message-body columns is-mobile is-centered"> 
        <span class="content">
        @if($totalTrips==0)
        <div class="content">
            
            <h2>Aún no hay pasajeros</h2>
            <p>Publica un viaje o busca un asiento</p>
        </div>
        </div>
        @else
        <div class="content">
            @foreach ($trip as $item )
            @foreach ($item -> passengers as $info )
            <div class="card my-5"  >
                <div class="card-content">
                    <div class="media">
                    <div class="media-left">
                        <figure class="image is-48x48">
                        <img style="border-radius: 25px;"
                            src="{{ $info['passenger']->photo ? $info['passenger']->photo : asset('img/auto.png')}}" alt="Placeholder image"
                        />
                        </figure>
                    </div>
                    <div class="media-content columns">
                        <div class="column">
                        <p class="title is-4">{{ $info['passenger']->name }}</p>
                        <span>Calificación: {{ $info['passenger']->rating }}</span>
                        <p class="subtitle is-6">
                            <span class="icon has-text-success">
                                <i class="fa-solid fa-phone"></i>
                            </span>
                            {{ $info['phone'] }} 
                            <br>
                        </p>
                        <p class="subtitle is-6">
                            <span class="icon has-text-success">
                                <i class="fa-solid fa-chair"></i>
                            </span>
                            Asientos reservados: {{ $info['seats'] }} 
                            <br>
                        </p>


                        <div class="column">                
                            <p class="subtitle is-6">                          
                                <br>
                                <span class="icon has-text-success">
                                    <i class="fa-solid fa-location"></i>
                                </span>
                                {{ $from }} ->
                                <span class="icon has-text-success">
                                    <i class="fa-solid fa-location"></i>
                                </span>
                                {{ $to }}
                            </p>
                            <p class="subtitle is-6">                          
                                <br>
                                
                                @if ((!empty($info['passenger']->dni_front))&& !empty($info['passenger']->dni_back)&& $info['passenger']->verified==1 )
                                <span class="icon has-text-success">
                                    <i class="fa-solid fa-check"></i>
                                </span>
                                <strong style="color:blue">Usuario verificado </strong>
                                @else
                                <span class="icon has-text-success">
                                    <i class="fa-solid fa-warning" style="color:yellow"></i>
                                </span>
                                <strong style="color:red">Usuario no verificado </strong>

                                @endif
                            </p>
                            <p class="subtitle is-6">                          
                                <br>
                                <span class="icon has-text-success">
                                    <i class="fa-solid fa-comment"></i>
                                </span>
                                <strong>Comentarios del pasajero: </strong>{{ $info['comment'] }}
                            </p>
                            <p class="subtitle is-6">                          
                                <br>
                                <span class="icon has-text-success">
                                    <i class="fa-solid fa-info"></i>
                                </span>
                                <strong>Reserva #: </strong><span style="font-size:small">{{ strtoupper(md5($info['reservationId'] )) }}</span>
                            </p>      
                            
                        </div>
                    </div>
                    </div>

                                    

                    
                    <footer class="card-footer">


        
                    </footer>
                </div>
                </div>    
            @endforeach
            @endforeach
        </div>
        @endif
        </span> 
    </article>
</div>



      
@include('footer')
