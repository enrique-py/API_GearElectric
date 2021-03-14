document.addEventListener("DOMContentLoaded", function() 
{
    document.getElementById("formulario").addEventListener('submit', validarFormulario); 
});
  
function validarFormulario(evento) 
{
    evento.preventDefault();
    var nombre = document.getElementById("nombre").value;
    if(nombre.length> 0 ) 
    {
        if(!nombre.match(/^[a-zA-Z]+/))
        {
            alert('Por favor, escriba un nombre valido');
            return false;
        }
    }
    else
    {
        alert('Escriba su nombre');
        return false;
    }

    opciones = document.getElementsByName("tipo_documento");
    var seleccionado = false;
    for(var i=0; i<opciones.length; i++)
    {
        if(opciones[i].checked) 
        {
            seleccionado = true;
            break;
        }
    }  
    if(!seleccionado) 
    {
        alert('Por favor, seleccione una opción');
        return false;
    }

    var documento = document.getElementById('documento').value;
    if(documento.length >0 ) 
    {
        if(documento.length <10 )
        {
            alert('Por favor, escriba un documento valido');
            return;
        }
    }
    else
    {
        alert('Escriba su documento');
        return false;
    }

    var telefono = document.getElementById('tele').value;
    if(telefono.length>0) 
    {
        var patronTel=/^\d{10}$/;
        if(!(patronTel.test(telefono)) )
        {
            alert('Por favor, escriba un numero de telefono valido');
            return false;
        }
    }
    else
    {
        alert('Escriba su numero telefono');
        return false;        
    }

    var correo = document.getElementById('mail').value;
    
    if(correo.length > 0) 
    {
        var patronEmail=/^[^@\s]+@[^@\.\s]+(\.[^@\.\s]+)+$/; 
        if ( !(patronEmail.test(correo)))
        {
            alert("No es un correo electrónico válido");
            return false;
        } 

    }
    else
    {
        alert('Escriba su correo');
        return false;                
    }
    
    const data = new FormData(formulario);
    fetch('http://localhost/ApiGearElectric/back-end/index.php', {
    method: 'POST',
    body: data
    })

    alert("Formulario Completo, Gracias.");  
    this.submit();  
}

var inputs = document.getElementsByClassName('input');
for (var i=0; i<inputs.length;i++)
{
    inputs[i].addEventListener('keyup', function() 
    {    
        if(this.value.length>=1){
            this.nextElementSibling.classList.add('fijar');
        }else{
            this.nextElementSibling.classList.remove('fijar');
        }
    });

}

