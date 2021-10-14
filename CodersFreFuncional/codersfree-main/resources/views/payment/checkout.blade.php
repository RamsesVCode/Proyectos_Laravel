<x-app-layout>
  {{-- <script src="https://www.paypal.com/sdk/js?client-id=test"></script> --}}
  <script src= "https://www.paypal.com/sdk/js?client-id={{$header}}"></script>

  <script>
    paypal.Buttons({
      createOrder: function(data, actions) {
        // This function sets up the details of the transaction, including the amount and line item details.
        return actions.order.create({
          purchase_units: [{
            amount: {
              value: {{$course->price->value}},
              currency_code: "USD",
            }
          }]
        });
      },
      onApprove: function(data, actions) {
        // This function captures the funds from the transaction.
        return actions.order.capture().then(function(details) {
          // This function shows a transaction success message to your buyer.
          /* console.log(details.payer);
          alert('Transaction completed by ' + details.payer.name.given_name); */
          /* var id = {{$course->id}};
          window.location.href = "/payment/approved/"+id; */
          
          /* console.log('Capture result', details, JSON.stringify(details, null, 2));
          console.log('Payer: ', JSON.stringify(payer, null, 2)); */
          
          var transaction = details.purchase_units[0].payments.captures[0];    
          var payer = details.payer;
          var courseId= {{$course->id}};
          window.location.href = "/payment/approved/"+{{$course->id}}+"/"+JSON.stringify(transaction, null, 2);
          /* var req = new XMLHttpRequest();          
          var token = document.querySelector('meta[name="csrf-token"]').content;
          req.open("POST", "/payment/otherapproved", true);
          req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          req.setRequestHeader("x-csrf-token", token);
          req.setRequestHeader("Accept", "application/json");
          req.send(JSON.stringify(details));
          return details; */
        })
      },
      onCancel: function (data) {
          window.location.href = "/payment/failed/"+{{$course->id}}+"/"+JSON.stringify(data);
        return data;
        },
        /* ,
        onError: function (err) {
          // For example, redirect to a specific error page
          window.location.href = "/payment/failed";
        } */
    }).render('#paypal-button-container');
    //This function displays Smart Payment Buttons on your web page.
  </script>

  @if(session('failed'))
    <div class="card max-w-4xl mx-auto mt-8 text-center">
      <div class="card-body  bg-red-100 w-full">
        <div class="alert alert-danger bg-red-600 text-white"  role="alert">
          <strong><i class="far fa-frown"></i> Lo lamentamos!</strong> {{ session('failed') }}
        </div>
      </div>
    </div>
  @endif
  
  <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 py-12">
    <h1 class="text-gray-500 text-3xl font-bold">Detalle del pedido</h1>

    <div class="card text-gray-600">
      <div class="card-body">

        <article class="flex items-center">
          <img class="h-12 w-12 object-cover" src="{{Storage::url($course->image->url)}}" alt="">

          <a href="{{route('courses.show',$course)}}" class="text-lg ml-2 hover:bg-gray-100" >{{$course->title}}</a>

          <p class="text-xl font-bold ml-auto">u$s {{$course->price->value}}</p>
        </article>

        {{-- <div class="flex justify-end mt-2 mb-4">
          <a class="btn btn-primary" href="{{ route( 'payment.pay', $course) }}">Comprar este curso</a>
        </div> --}}
        
        
        <hr class="mt-4">
        <p class="text-sm mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, quasi, placeat maiores nostrum cumque velit molestiae, exercitationem veritatis vitae beatae ad rem? Repellendus impedit minima animi at soluta sapiente maiores?
          <a class="text-red-500 font-bold" href="">Terminos y Condiciones</a>
        </p>
        <div class="card flex justify-end mt-8">
          <div class="card-body ">
            
            {{-- {{$token = csrf_field()}} --}}
            <div id="paypal-button-container"></div>

          </div>
        </div>

      </div>
    </div>
  </div>

  

</x-app-layout>
