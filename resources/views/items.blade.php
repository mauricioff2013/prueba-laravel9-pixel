<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="csrf-token2" content="{{ csrf_token() }}">


<div class="col-md-6">

<form action="/submit" method="post">
  @csrf
 Ingrese el nuevo quehacer <input type="text" name="name" required>
  <input class="btn btn-success" type="submit" value="Agregar" >
</form>

<div class="list-group">
  <label>Queahceres:</label>
   @foreach ($data as $key )
    <div class="form-check">
   
    <input class="form-check-input" type="checkbox" value= $key['state'] id={{ $key['ID'] }} {{ $key['state'] ? 'checked' : '' }}>
    <label class="form-check-label" style="list-style-type: none;">
       <li>{{$key['name']}}</li>
    </label>
  </div>
  @endforeach
</div>

<div>
<button class="btn btn-secondary" name="selected">Eliminar quehaceres finalizados</button>
<button class="btn btn-secondary" name="all">Eliminar todo</button>

</div>

</div>

<script>
  const checkboxes = document.querySelectorAll('.form-check-input');
  checkboxes.forEach(checkbox => {
    checkbox.addEventListener('change', function() {
    
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '/editItem', true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
        xhr.onreadystatechange = function() {
          if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
          
          } else if (xhr.readyState === XMLHttpRequest.DONE) {
          
          }
        };
        xhr.send(JSON.stringify({
          id: checkbox.id,
          state: checkbox.checked
        }));
      
    });
  });



var botonesDelete = document.getElementsByClassName("btn btn-secondary");

for (var i = 0; i < botonesDelete.length; i++) {
  botonesDelete[i].addEventListener("click", function() {
    var nombreBoton = this.name;
    var xhr = new XMLHttpRequest();

    xhr.open("post", "/delete", true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token2"]').content);
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
         setTimeout( function() { window.location.href = "http://127.0.0.1:8000/item"; }, 1 );
       }
    };
    xhr.send(JSON.stringify({
            name: nombreBoton
            
          }));
  });
}



</script>