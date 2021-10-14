<section class="course-section spad">
    <div class="container">
        <div class="section-title mb-4 mt-0 pt-0">
            <h2>{{ __("Las ordenes que has realizado") }}</h2>
        </div>
        <div>
            <table class="table table-stripped text-center">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Cupon Aplicado</th>
                        <th>Pago Total</th>
                        <th>Estado</th>
                        <th>Fecha de Orden</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->coupon ?? "Ninguno"}}</td>
                            <td>{{$order->total_amount}} $</td>
                            <td>{{$order->status}}</td>
                            <td>{{$order->created_at}}</td>
                            <td>
                                <a href="#" class="site-btn" onclick="alert('No disponible')">{{ __("Ver detalles") }}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <a href="{{route('student.orders.download_report')}}" class="btn btn-dark btn-lg mb-3 p-2">{{ __("Descargar reporte") }}</a>
                </tfoot>
            </table>
        </div>
    </div>
</section>