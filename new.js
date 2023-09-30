function ingresar(){

    let usuario=document.getElementById("usuario").value;
    
    var xhttp=new XMLHttpRequest();
    xhttp.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200){
            document.getElementById("ingreso").innerHTML= this.responseText;
            document.getElementById("usuario").value = "";
            document.getElementById("prestamo").innerHTML = "";
            mostrarBalances();
        }
    };
    xhttp.open("POST","ingresar.php",true);
    xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhttp.send("usuario="+usuario);
}

function prestamo(){

    let emisor = document.getElementById("emisor").value;
    let receptor = document.getElementById("receptor").value;
    let cantidad = document.getElementById("cantidad").value;


    var xhttp=new XMLHttpRequest();
    xhttp.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200){
            document.getElementById("prestamo").innerHTML = this.responseText;
            document.getElementById("emisor").value = "";
            document.getElementById("receptor").value = "";
            document.getElementById("cantidad").value = "";
            document.getElementById("ingreso").innerHTML = "";
            mostrarBalances();
        }
    };
    xhttp.open("POST","prestamo.php",true);
    xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhttp.send("emisor="+emisor+"&receptor="+receptor+"&cantidad="+cantidad);
}

function mostrarBalances(){
    var xhttp=new XMLHttpRequest();
    xhttp.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200){
            document.getElementById("balances").innerHTML= this.responseText;
        }
    };
    xhttp.open("POST","balances.php",true);
    xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhttp.send();
}

function restaurar(){
    var xhttp=new XMLHttpRequest();
    xhttp.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200){
            document.getElementById("balances").innerHTML= this.responseText;
            document.getElementById("prestamo").innerHTML = "";
            document.getElementById("ingreso").innerHTML = "";
        }
    };
    xhttp.open("POST","restaurar.php",true);
    xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhttp.send();
}

mostrarBalances();


