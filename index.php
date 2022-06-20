<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
    <title>Integración Culqui</title>
</head>
<body>


 <div class="col-12">
 
 <div class="card">
  <div class="card-header">
    Integracion
  </div>
  <div class="card-body">
 
      <div class="row">
            
   <div class="col-8">
   <label for="">Producto</label>
<input type="text" name="form-control" class="form-control" id="txt_producto">

   </div>
   <div class="col-2">
   <label for="">Precio</label>
<input type="text" name="form-control" class="form-control" id="txt_precio">

   </div>
    <div class="col-2">
    <label for="">&nbsp;</label><br>
    <button id="buyButton" class="btn btn-success">Comprar</button>
    </div>

      </div>


  </div>
</div>
 
 </div>
 <script src="https://checkout.culqi.com/js/v3"></script>
 <script>

var producto = '';
var precio = '';



  $('#buyButton').on('click', function(e) {

   producto = $('#txt_producto').val();
   precio = $('#txt_precio').val()*100;

    Culqi.publicKey = 'sk_test_02073ad2cd63368c';

Culqi.settings({
  title: 'CODE PE',
  currency: 'PEN',
  description: producto,
  amount: precio
});


    // Abre el formulario con la configuración en Culqi.settings
    Culqi.open();
    e.preventDefault();
});

function culqi() {
  if (Culqi.token) { // ¡Objeto Token creado exitosamente!
      var token = Culqi.token.id;
      var email = 'carlosmorih33@gmail.com';

     // alert('Se ha creado un token:' + token);
      //En esta linea de codigo debemos enviar el "Culqi.token.id"
      //hacia tu servidor con Ajax
   $.ajax({
           url:'procesarPago.php',
           type:'POST',
           data:{
               precio:precio,
               producto:producto,
               token:token,
               email:email
           },success:function(e){
alert(e);

           }


   });

  } else { // ¡Hubo algún problema!
      // Mostramos JSON de objeto error en consola
      console.log(Culqi.error);
      alert(Culqi.error.user_message);
  }
};

</script>
</body>
</html>