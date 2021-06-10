<style>
body {
  background: #ccc;
  padding: 30px;
}

.container {
  width: 21cm;
  min-height: 29.7cm;
}

.invoice {
  background: #fff;
  width: 100%;
  padding: 50px;
}

.logo {
  width: 2.5cm;
}

.document-type {
  text-align: right;
  color: #444;
}

.conditions {
  font-size: 0.7em;
  color: #666;
}

.bottom-page {
  font-size: 0.7em;
}
</style>

<div class="container">
  <div class="invoice">
    <div class="row">
      <div class="col-7">
        <img src="{{asset('img/parrilla.jpg')}}" class="logo">
      </div>
      <div class="col-5">
        <h1 class="document-type display-4">FACTURA</h1>
      
        <p class="text-right"><strong>{{$ventas->id}}</strong></p>
     
      </div>
    </div>
    <div class="row">
      <div class="col-7">
        <p>
          <strong>Direccion</strong><br>
          cr 777 
        </p>
      </div>
      <div class="col-5">
        <br><br><br>
        <p>
          <strong>Total de la venta</strong><br>
          total<em>{{$ventas->total}}</em>
          
        </p>
      </div>
    </div>
    <br>
    <br>
    <h6>Fecha y hora ({{$ventas->created_at}})</h6>
    <br>

    <table class="table table-striped">
      <thead>
        <tr>
        <th>Nombre</th>
        <th>Cantidad</th>
         <th>Precio</th>
         <th>descripcion</th>
        <th>Subtotal</th>
        </tr>
      </thead>
      <tbody>
        <tr>
        @foreach($productos as $detalle)
                        <tr>
                            <td>{{$detalle->Nombre}}</td>
                            <td>{{$detalle->cantidad}}</td>
                            <td>{{$detalle->precio}}</td>
                            <td>{{$detalle->descripcion}}</td>
                            <td>{{$detalle->precio * $detalle->cantidad}}</td>
                        </tr>
                    @endforeach
        </tr>
       
      </tbody>
    </table>
    
    <p class="conditions">
      En votre aimable règlement
      <br>
      Et avec nos remerciements.
      <br><br>
      Conditions de paiement : paiement à réception de facture, à 15 jours.
      <br>
      Aucun escompte consenti pour règlement anticipé.
      <br>
      Règlement par virement bancaire.
      <br><br>
      En cas de retard de paiement, indemnité forfaitaire pour frais de recouvrement : 40 euros (art. L.4413 et L.4416 code du commerce).
    </p>
    
    <br>
    <br>
    <br>
    <br>
    
    <p class="bottom-page text-right">
      90TECH SAS - N° SIRET 80897753200015 RCS METZ<br>
      6B, Rue aux Saussaies des Dames - 57950 MONTIGNY-LES-METZ 03 55 80 42 62 - www.90tech.fr<br>
      Code APE 6201Z - N° TVA Intracom. FR 77 808977532<br>
      IBAN FR76 1470 7034 0031 4211 7882 825 - SWIFT CCBPFRPPMTZ
    </p>
  </div>
</div>
<a href="{{route('descargarPDFventas', $ventas ->id)}}">Descargar PDF</a>